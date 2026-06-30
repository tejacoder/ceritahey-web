@extends('layouts.app')
@section('title', 'Kelola Produk — CeritaHey')

@section('content')
<div class="section-container py-8 md:py-12">
  @include('admin.nav')
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-black">📦 Kelola Produk</h1>
    <a href="{{ route('admin.products.create') }}" class="btn-primary text-sm">+ Tambah Produk</a>
  </div>

  <div class="card overflow-hidden">
    <table class="w-full text-sm">
      <thead class="bg-stone-50 text-left">
        <tr>
          <th class="p-3 font-semibold">Cover</th>
          <th class="p-3 font-semibold">Nama</th>
          <th class="p-3 font-semibold">Buku</th>
          <th class="p-3 font-semibold">Harga</th>
          <th class="p-3 font-semibold">Aktif</th>
          <th class="p-3 font-semibold">Urutan</th>
          <th class="p-3 font-semibold"></th>
        </tr>
      </thead>
      <tbody class="divide-y divide-stone-100">
        @foreach($products as $p)
          <tr>
            <td class="p-3">
              @if($p->cover_image_url)
                <img src="{{ $p->cover_image_url }}" alt="{{ $p->image_alt ?? $p->name }}" class="w-12 h-12 object-cover rounded-lg border">
              @else
                <div class="w-12 h-12 rounded-lg bg-stone-100 flex items-center justify-center text-stone-400 text-xs">No Cover</div>
              @endif
            </td>
            <td class="p-3 font-semibold">{{ $p->name }}</td>
            <td class="p-3">{{ $p->book_count }}</td>
            <td class="p-3">Rp{{ number_format($p->price, 0, ',', '.') }}</td>
            <td class="p-3">{{ $p->is_active ? '✅' : '❌' }}</td>
            <td class="p-3 text-stone-400">{{ $p->sort_order }}</td>
            <td class="p-3 text-right">
              <a href="{{ route('admin.products.edit', $p) }}" class="text-amber-600 hover:underline text-sm font-semibold">Edit</a>
              <form method="POST" action="{{ route('admin.products.destroy', $p) }}" class="inline" onsubmit="return confirm('Hapus produk ini?')">
                @csrf @method('DELETE')
                <button class="text-red-500 hover:underline text-sm font-semibold ml-3">Hapus</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection