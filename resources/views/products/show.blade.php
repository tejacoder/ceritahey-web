@extends('layouts.app')
@section('title', $product->name . ' — CeritaHey')

@section('content')
<div class="section-container py-8 md:py-12 animate-in">
  <a href="{{ route('home') }}" class="text-sm font-semibold text-amber-600 hover:text-amber-700 transition-colors mb-6 inline-flex items-center gap-1.5">
    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
      <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
    </svg>
    Kembali ke Beranda
  </a>

  <div class="card p-6 md:p-8 bg-white mt-2">
    <div class="grid md:grid-cols-2 gap-8 lg:gap-12 items-start">
      
      {{-- Kolom Kiri: Cover Image --}}
      <div class="flex items-center justify-center bg-stone-50 rounded-2xl p-6 border border-stone-100 shadow-inner">
        @if($product->cover_image_url)
          <img src="{{ $product->cover_image_url }}" alt="{{ $product->image_alt ?? $product->name }}" class="w-full max-w-sm h-auto object-cover rounded-2xl border shadow-lg transition-transform hover:scale-[1.01] duration-300">
        @else
          <div class="w-full max-w-sm h-80 rounded-2xl bg-stone-100 flex flex-col items-center justify-center text-stone-400 border">
            <svg class="w-16 h-16 text-stone-300 mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
            <span class="text-sm">Tidak ada cover foto</span>
          </div>
        @endif
      </div>

      {{-- Kolom Kanan: Detail & Order Info --}}
      <div class="space-y-6">
        <div>
          <span class="badge badge-warning mb-3">{{ $product->book_count }} Buku Cerita</span>
          <h1 class="font-heading text-3xl lg:text-4xl font-bold text-stone-900 leading-tight">{{ $product->name }}</h1>
        </div>

        <div class="p-4 rounded-xl bg-amber-50/50 border border-amber-100">
          <p class="text-xs text-stone-500 uppercase tracking-widest font-bold">Harga Paket</p>
          <div class="flex items-baseline gap-2 mt-1">
            <span class="font-heading text-4xl font-black text-stone-900">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
            <span class="text-xs text-stone-500 font-semibold">(Hanya Rp{{ number_format(round($product->price/$product->book_count), 0, ',', '.') }}/buku)</span>
          </div>
        </div>

        <div class="space-y-2">
          <h2 class="text-sm font-bold text-stone-800 uppercase tracking-wider">Deskripsi</h2>
          <div class="text-stone-600 text-sm leading-relaxed wysiwyg-content">
            {!! $product->description ?? 'Tidak ada deskripsi untuk paket ini.' !!}
          </div>
        </div>

        {{-- Fitur / Keunggulan Paket --}}
        <div class="border-t border-stone-100 pt-5 space-y-3">
          <h3 class="text-xs font-bold text-stone-400 uppercase tracking-wider">Spesifikasi & Layanan</h3>
          <div class="grid sm:grid-cols-2 gap-3 text-xs text-stone-600">
            <div class="flex items-center gap-2">
              <span class="text-emerald-500 font-bold"><i class="fa-solid fa-circle-check"></i></span>
              <span>Format Digital (PDF Full Color)</span>
            </div>
            <div class="flex items-center gap-2">
              <span class="text-emerald-500 font-bold"><i class="fa-solid fa-circle-check"></i></span>
              <span>Akses Download Selamanya</span>
            </div>
            <div class="flex items-center gap-2">
              <span class="text-emerald-500 font-bold"><i class="fa-solid fa-circle-check"></i></span>
              <span>Bisa Dibuka di HP, Tablet, Laptop</span>
            </div>
            <div class="flex items-center gap-2">
              <span class="text-emerald-500 font-bold"><i class="fa-solid fa-circle-check"></i></span>
              <span>Pembayaran Instan & Aman</span>
            </div>
          </div>
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-stone-100">
          <a href="{{ route('cart.add', [$product, 'redirect' => 'cart']) }}" class="btn-primary w-full justify-center text-center">
            <i class="fa-solid fa-rocket mr-1"></i> Beli Sekarang
          </a>
          <a href="{{ route('cart.add', $product) }}" class="btn-outline w-full justify-center text-center">
            <i class="fa-solid fa-cart-plus mr-1"></i> Tambah ke Keranjang
          </a>
        </div>
      </div>

    </div>
  </div>
</div>

<style>
  .wysiwyg-content p { margin-bottom: 0.75rem; }
  .wysiwyg-content p:last-child { margin-bottom: 0; }
  .wysiwyg-content ul { list-style-type: disc; margin-left: 1.25rem; margin-bottom: 0.75rem; }
  .wysiwyg-content ol { list-style-type: decimal; margin-left: 1.25rem; margin-bottom: 0.75rem; }
  .wysiwyg-content li { margin-bottom: 0.25rem; }
  .wysiwyg-content strong { font-weight: 700; color: #1c1917; }
  .wysiwyg-content em { font-style: italic; }
  .wysiwyg-content u { text-decoration: underline; }
</style>
@endsection
