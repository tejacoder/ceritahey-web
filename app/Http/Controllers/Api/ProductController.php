<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $products = Product::orderBy('sort_order')->get();
        return response()->json([
            'data' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'            => ['required', 'string', 'max:255'],
            'description'     => ['nullable', 'string'],
            'book_count'      => ['required', 'integer', 'min:1'],
            'price'           => ['required', 'integer', 'min:0'],
            'image_alt'       => ['nullable', 'string', 'max:255'],
            'image_title'     => ['nullable', 'string', 'max:255'],
            'is_active'       => ['nullable'],
            'is_featured'     => ['nullable'],
            'sort_order'      => ['nullable', 'integer'],
            'download_url'    => ['nullable', 'url', 'max:500'],
            'cover_image'     => ['nullable', 'image', 'max:2048'],
            'cover_image_url' => ['nullable', 'url'],
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_active'] = $request->has('is_active') ? filter_var($request->input('is_active'), FILTER_VALIDATE_BOOLEAN) : true;
        $validated['is_featured'] = $request->has('is_featured') ? filter_var($request->input('is_featured'), FILTER_VALIDATE_BOOLEAN) : false;
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        $coverPath = $this->handleCoverImage($request);
        if ($coverPath) {
            $validated['cover_image_path'] = $coverPath;
        }

        unset($validated['cover_image']);
        unset($validated['cover_image_url']);

        $product = Product::create($validated);

        return response()->json([
            'message' => 'Product created successfully.',
            'data' => $product
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): JsonResponse
    {
        return response()->json([
            'data' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product): JsonResponse
    {
        $validated = $request->validate([
            'name'            => ['sometimes', 'required', 'string', 'max:255'],
            'description'     => ['nullable', 'string'],
            'book_count'      => ['sometimes', 'required', 'integer', 'min:1'],
            'price'           => ['sometimes', 'required', 'integer', 'min:0'],
            'image_alt'       => ['nullable', 'string', 'max:255'],
            'image_title'     => ['nullable', 'string', 'max:255'],
            'is_active'       => ['nullable'],
            'is_featured'     => ['nullable'],
            'sort_order'      => ['nullable', 'integer'],
            'download_url'    => ['nullable', 'url', 'max:500'],
            'cover_image'     => ['nullable', 'image', 'max:2048'],
            'cover_image_url' => ['nullable', 'url'],
        ]);

        if (isset($validated['name'])) {
            $validated['slug'] = Str::slug($validated['name']);
        }
        if ($request->has('is_active')) {
            $validated['is_active'] = filter_var($request->input('is_active'), FILTER_VALIDATE_BOOLEAN);
        }
        if ($request->has('is_featured')) {
            $validated['is_featured'] = filter_var($request->input('is_featured'), FILTER_VALIDATE_BOOLEAN);
        }

        $coverPath = $this->handleCoverImage($request, $product->cover_image_path);
        if ($coverPath) {
            $validated['cover_image_path'] = $coverPath;
        }

        unset($validated['cover_image']);
        unset($validated['cover_image_url']);

        $product->update($validated);

        return response()->json([
            'message' => 'Product updated successfully.',
            'data' => $product
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): JsonResponse
    {
        $product->delete();
        return response()->json([
            'message' => 'Product deleted successfully.'
        ], 200);
    }

    /**
     * Process cover image from request (file upload or downloading from URL).
     */
    protected function handleCoverImage(Request $request, ?string $currentPath = null): ?string
    {
        if ($request->hasFile('cover_image')) {
            if ($currentPath && Storage::disk('public')->exists('products/' . $currentPath)) {
                Storage::disk('public')->delete('products/' . $currentPath);
            }
            $file = $request->file('cover_image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('products', $filename, 'public');
            return $filename;
        }

        if ($request->filled('cover_image_url')) {
            try {
                $imageUrl = $request->input('cover_image_url');
                $options = [
                    'http' => [
                        'method' => 'GET',
                        'header' => 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
                    ]
                ];
                $context = stream_context_create($options);
                $imageContents = file_get_contents($imageUrl, false, $context);
                
                if ($imageContents) {
                    if ($currentPath && Storage::disk('public')->exists('products/' . $currentPath)) {
                        Storage::disk('public')->delete('products/' . $currentPath);
                    }
                    $path = parse_url($imageUrl, PHP_URL_PATH);
                    $extension = pathinfo($path, PATHINFO_EXTENSION) ?: 'jpg';
                    $extension = preg_replace('/\?.*/', '', $extension); // strip query string
                    
                    if (!in_array(strtolower($extension), ['jpg', 'jpeg', 'png', 'webp'])) {
                        $extension = 'jpg';
                    }
                    $filename = time() . '_downloaded.' . $extension;
                    Storage::disk('public')->put('products/' . $filename, $imageContents);
                    return $filename;
                }
            } catch (\Exception $e) {
                // Fail silently or log error
            }
        }

        return $currentPath;
    }
}
