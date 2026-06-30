<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index(): View
    {
        $products = Product::orderBy('sort_order')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create(): View
    {
        return view('admin.products.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'book_count'  => ['required', 'integer', 'min:1'],
            'price'       => ['required', 'integer', 'min:0'],
            'cover_image' => ['nullable', 'image', 'max:2048'],
            'image_alt'   => ['nullable', 'string', 'max:255'],
            'image_title' => ['nullable', 'string', 'max:255'],
            'is_active'   => ['nullable'],
            'is_featured' => ['nullable'],
            'sort_order'  => ['nullable', 'integer'],
            'download_url'=> ['nullable', 'url', 'max:500'],
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('products', $filename, 'public');
            $validated['cover_image_path'] = $filename;
        }

        if (array_key_exists('cover_image', $validated)) {
            unset($validated['cover_image']);
        }

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product): View
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'name'        => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'book_count'  => ['required', 'integer', 'min:1'],
            'price'       => ['required', 'integer', 'min:0'],
            'cover_image' => ['nullable', 'image', 'max:2048'],
            'image_alt'   => ['nullable', 'string', 'max:255'],
            'image_title' => ['nullable', 'string', 'max:255'],
            'is_active'   => ['nullable'],
            'is_featured' => ['nullable'],
            'sort_order'  => ['nullable', 'integer'],
            'download_url'=> ['nullable', 'url', 'max:500'],
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        if ($request->hasFile('cover_image')) {
            if ($product->cover_image_path) {
                $oldPath = storage_path('app/public/products/' . $product->cover_image_path);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
            $file = $request->file('cover_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('products', $filename, 'public');
            $validated['cover_image_path'] = $filename;
        }

        if (array_key_exists('cover_image', $validated)) {
            unset($validated['cover_image']);
        }

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diupdate.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        if ($product->cover_image_path) {
            $path = storage_path('app/public/products/' . $product->cover_image_path);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
