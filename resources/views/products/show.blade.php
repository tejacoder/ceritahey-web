@extends('layouts.app')
@section('title', $product->name . ' — CeritaHey')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">
  <a href="{{ route('home') }}" class="text-sm font-semibold text-amber-600 hover:underline mb-4 inline-block">← Kembali</a>
  <div class="card p-8">
    <div class="text-center mb-6">
      @if($product->cover_image_url)
        <div class="mb-4 flex items-center justify-center">
          <img src="{{ $product->cover_image_url }}" alt="{{ $product->image_alt ?? $product->name }}" class="w-36 h-36 object-cover rounded-2xl border shadow-sm">
        </div>
      @else
        <div class="w-16 h-16 mx-auto rounded-2xl bg-amber-100 flex items-center justify-center mb-4 text-amber-600">
          <svg class="w-9 h-9" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
        </div>
      @endif
      <h1 class="text-3xl font-black">{{ $product->name }}</h1>
      <p class="text-stone-500">{{ $product->book_count }} buku cerita</p>
    </div>
    <p class="text-stone-600 text-center mb-6">{{ $product->description }}</p>
    <div class="text-center">
      <p class="text-4xl font-black text-stone-900">Rp{{ number_format($product->price, 0, ',', '.') }}</p>
      <p class="text-sm text-stone-400">Rp{{ number_format(round($product->price/$product->book_count), 0, ',', '.') }}/buku</p>
    </div>
    <div class="text-center mt-6">
      @auth
        <a href="{{ route('order.create', $product->slug) }}" class="btn-primary">Beli Sekarang</a>
      @else
        <a href="{{ route('login') }}" class="btn-primary">Masuk & Beli</a>
      @endauth
    </div>
  </div>
</div>
@endsection
