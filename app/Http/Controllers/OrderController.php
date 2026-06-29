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
            'product_id' => ['required', 'exists:products,id'],
            'customer_name'  => ['required', 'string', 'max:100'],
            'customer_email' => ['required', 'email', 'max:100'],
            'customer_phone' => ['nullable', 'string', 'max:20'],
            'notes' => ['nullable', 'string', 'max:500'],
        ]);

        $product = Product::findOrFail($validated['product_id']);

        $order = Order::create([
            'user_id'        => Auth::id(),
            'invoice'        => 'INV/' . date('Ymd') . '/' . strtoupper(substr(uniqid(), -6)),
            'total_amount'   => $product->price,
            'status'         => 'pending',
            'customer_name'  => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone' => $validated['customer_phone'],
            'notes'          => $validated['notes'],
        ]);

        // order item
        $order->items()->create([
            'product_id'   => $product->id,
            'product_name' => $product->name,
            'book_count'   => $product->book_count,
            'price'        => $product->price,
            'subtotal'     => $product->price,
        ]);

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

    public function download(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(404);
        }

        if ($order->status !== 'paid') {
            return redirect()->route('order.show', $order)->with('error', 'Pesanan belum dibayar.');
        }

        // Cari item pertama & ambil product's download_url
        $product = $order->items->first()?->product;

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
