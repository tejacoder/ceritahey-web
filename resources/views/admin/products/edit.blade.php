@extends('layouts.app')
@section('title', 'Edit Produk — CeritaHey')

@section('content')
<div class="section-container py-8 md:py-12">
  @include('admin.nav')
  
  {{-- Header --}}
  <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
    <h1 class="font-heading text-2xl md:text-3xl font-bold text-stone-900">Edit Produk</h1>
    <a href="{{ route('admin.products.index') }}" class="btn-outline text-sm px-5 py-2.5 inline-flex items-center gap-2">
      <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
      Kembali ke Daftar
    </a>
  </div>
  
  @if($errors->any())
    <div class="mb-6 p-4 rounded-2xl bg-red-50 border border-red-200 text-red-700 text-sm">
      <p class="font-bold mb-2">Gagal simpan. Perbaiki:</p>
      <ul class="list-disc list-inside space-y-1">
        @foreach($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="grid lg:grid-cols-3 gap-6">
    <div class="card p-6">
      <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
        @csrf
        <div class="space-y-4">
          <div>
            <label class="label">Cover Foto</label>
            @if($product->cover_image_url)
              <div class="mb-2">
                <img src="{{ $product->cover_image_url }}" alt="{{ $product->image_alt ?? $product->name }}" class="w-32 h-32 object-cover rounded-xl border">
              </div>
            @endif
            <input type="file" name="cover_image" class="input-field" accept="image/*">
            <p class="text-xs text-stone-500 mt-1">Maks 2MB. JPG/PNG/WebP. Upload baru akan timpa yang lama.</p>
          </div>
          <div>
            <label class="label">Alt Text (aksesibilitas)</label>
            <input type="text" name="image_alt" class="input-field" value="{{ old('image_alt', $product->image_alt) }}">
          </div>
          <div>
            <label class="label">Title Text (tooltip)</label>
            <input type="text" name="image_title" class="input-field" value="{{ old('image_title', $product->image_title) }}">
          </div>
          <div>
            <label class="label">Nama Produk</label>
            <input type="text" name="name" class="input-field" value="{{ old('name', $product->name) }}" required>
          </div>
          <div>
            <label class="label">Deskripsi</label>
            <textarea name="description" class="input-field" rows="3">{{ old('description', $product->description) }}</textarea>
          </div>
          <div>
            <label class="label">Jumlah Buku</label>
            <input type="number" name="book_count" class="input-field" value="{{ old('book_count', $product->book_count) }}" required min="1">
          </div>
          <div>
            <label class="label">Harga (Rp)</label>
            <input type="number" name="price" class="input-field" value="{{ old('price', $product->price) }}" required min="0">
          </div>
          <div class="flex gap-6">
            <label class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_active" value="1" @if($product->is_active) checked @endif class="accent-amber-500"> Aktif</label>
            <label class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_featured" value="1" @if($product->is_featured) checked @endif class="accent-amber-500"> Unggulan</label>
          </div>
          <div>
            <label class="label">Urutan</label>
            <input type="number" name="sort_order" class="input-field" value="{{ old('sort_order', $product->sort_order) }}">
          </div>
          <div>
            <label class="label">URL Download</label>
            <input type="url" name="download_url" class="input-field" value="{{ old('download_url', $product->download_url) }}" placeholder="https://drive.google.com/...">
          </div>
        </div>
        <button type="submit" class="btn-primary w-full justify-center mt-6">Simpan</button>
      </form>
    </div>
  </div>
</div>
@endsection