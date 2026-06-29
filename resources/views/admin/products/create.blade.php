@extends('layouts.app')
@section('title', 'Tambah Produk — CeritaHey')

@section('content')
<div class="section-container py-8 md:py-12">
  @include('admin.nav')
  <h1 class="text-2xl font-black mb-6">Tambah Produk</h1>
  <div class="card p-6" style="max-width: 42rem;">
    <form method="POST" action="{{ route('admin.products.store') }}">
      @csrf
      <div class="space-y-4">
        <div>
          <label class="label">Nama Produk</label>
          <input type="text" name="name" class="input-field" value="{{ old('name') }}" required>
        </div>
        <div>
          <label class="label">Deskripsi</label>
          <textarea name="description" class="input-field" rows="3">{{ old('description') }}</textarea>
        </div>
        <div>
          <label class="label">Jumlah Buku</label>
          <input type="number" name="book_count" class="input-field" value="{{ old('book_count', 1) }}" required min="1">
        </div>
        <div>
          <label class="label">Harga (Rp)</label>
          <input type="number" name="price" class="input-field" value="{{ old('price') }}" required min="0">
        </div>
        <div class="flex gap-6">
          <label class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_active" checked class="accent-amber-500"> Aktif</label>
          <label class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_featured" class="accent-amber-500"> Unggulan</label>
        </div>
        <div>
          <label class="label">Urutan</label>
          <input type="number" name="sort_order" class="input-field" value="{{ old('sort_order', 0) }}">
        </div>
        <div>
          <label class="label">URL Download (Google Drive / Link Eksternal)</label>
          <input type="url" name="download_url" class="input-field" value="{{ old('download_url') }}" placeholder="https://drive.google.com/...">
        </div>
      </div>
      <button type="submit" class="btn-primary w-full justify-center mt-6">Simpan</button>
    </form>
  </div>
</div>
@endsection
