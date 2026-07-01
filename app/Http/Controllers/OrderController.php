<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function create(Product $product): View
    {
        return view('orders.create', compact('product'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_id' => ['nullable', 'exists:products,id'],
            'customer_name'  => ['required', 'string', 'max:100'],
            'customer_email' => ['required', 'email', 'max:100'],
            'customer_phone' => ['nullable', 'string', 'max:20'],
            'notes' => ['nullable', 'string', 'max:500'],
        ]);

        $products = collect();

        if (!empty($validated['product_id'])) {
            $products->push(Product::findOrFail($validated['product_id']));
        } else {
            $cartIds = session()->get('cart', []);
            if (empty($cartIds)) {
                return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong.');
            }
            $products = Product::whereIn('id', $cartIds)->active()->get();
            if ($products->isEmpty()) {
                return redirect()->route('cart.index')->with('error', 'Produk tidak ditemukan.');
            }
        }

        $totalAmount = $products->sum('price');

        $order = Order::create([
            'user_id'        => Auth::id(),
            'invoice'        => 'INV/' . date('Ymd') . '/' . strtoupper(substr(uniqid(), -6)),
            'total_amount'   => $totalAmount,
            'status'         => 'pending',
            'customer_name'  => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'],
            'notes'          => $validated['notes'],
        ]);

        foreach ($products as $product) {
            $order->items()->create([
                'product_id'   => $product->id,
                'product_name' => $product->name,
                'book_count'   => $product->book_count,
                'price'        => $product->price,
                'subtotal'     => $product->price,
            ]);
        }

        if (empty($validated['product_id'])) {
            session()->forget('cart');
        }

        return redirect()->route('payment.channels', $order);
    }

    public function myOrders(): View
    {
        $orders = Auth::user()->orders()->with('payment', 'items')->latest()->paginate(10);
        return view('orders.my', compact('orders'));
    }

    public function show(Order $order): View
    {
        if ($order->user_id !== Auth::id()) abort(404);
        $order->load('items', 'payment');
        return view('orders.show', compact('order'));
    }

    public function download(Order $order, Request $request)
    {
        if ($order->user_id !== Auth::id()) {
            abort(404);
        }

        if ($order->status !== 'paid') {
            return redirect()->route('order.show', $order)->with('error', 'Pesanan belum dibayar.');
        }

        $itemId = $request->query('item');
        $item = null;
        if ($itemId) {
            $item = $order->items()->where('id', $itemId)->first();
        }
        if (!$item) {
            $item = $order->items->first();
        }

        $product = $item?->product;

        if ($product && $product->download_url) {
            return redirect()->away($product->download_url);
        }

        // Fallback: file lokal dummy
        $filePath = storage_path('app/private/books/cerita_digital_anak.pdf');

        if (!file_exists($filePath)) {
            abort(404, 'File tidak ditemukan.');
        }

        $filename = 'Buku_CeritaHey_' . str_replace('/', '_', $order->invoice) . '.pdf';

        return response()->download($filePath, $filename);
    }
}
