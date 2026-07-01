<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $cartIds = session()->get('cart', []);
        $products = [];
        $total = 0;

        if (!empty($cartIds)) {
            $products = Product::whereIn('id', $cartIds)->active()->get();
            $total = $products->sum('price');
        }

        return view('cart.index', compact('products', 'total'));
    }

    public function add(Product $product, Request $request): RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (!in_array($product->id, $cart)) {
            $cart[] = $product->id;
            session()->put('cart', $cart);
        }

        if ($request->query('redirect') === 'cart') {
            return redirect()->route('cart.index');
        }

        return back()->with('success', 'Buku "' . $product->name . '" berhasil ditambahkan ke keranjang.');
    }

    public function remove(Product $product): RedirectResponse
    {
        $cart = session()->get('cart', []);

        if (($key = array_search($product->id, $cart)) !== false) {
            unset($cart[$key]);
            session()->put('cart', array_values($cart));
        }

        return redirect()->route('cart.index')->with('success', 'Buku "' . $product->name . '" dihapus dari keranjang.');
    }
}
