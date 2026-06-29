@extends('layouts.app')
@section('title', 'Pesan ' . $product->name . ' — CeritaHey')

@section('content')
<div class="max-w-lg mx-auto px-4 py-12">
  <h1 class="text-2xl font-black text-center mb-2">Pesan {{ $product->name }}</h1>
  <p class="text-center text-stone-500 text-sm mb-8">Rp{{ number_format($product->price, 0, ',', '.') }} · {{ $product->book_count }} buku</p>

  <div class="card p-6">
    <form method="POST" action="{{ route('order.store') }}">
      @csrf
      <input type="hidden" name="product_id" value="{{ $product->id }}">
      <div class="space-y-4">
        <div>
          <label class="label">Nama Lengkap</label>
          <input type="text" name="customer_name" class="input-field" value="{{ old('customer_name', Auth::user()->name) }}" required>
          @error('customer_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="label">Email</label>
          <input type="email" name="customer_email" class="input-field" value="{{ old('customer_email', Auth::user()->email) }}" required>
          @error('customer_email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="label">No. HP</label>
          <input type="text" name="customer_phone" class="input-field" value="{{ old('customer_phone', Auth::user()->phone) }}">
        </div>
        <div>
          <label class="label">Catatan (opsional)</label>
          <textarea name="notes" class="input-field" rows="3">{{ old('notes') }}</textarea>
        </div>
      </div>
      <div class="mt-6 space-y-3">
        <button type="submit" class="btn-primary w-full justify-center">Lanjut ke Pembayaran</button>
        <a href="{{ route('home') }}" class="btn-outline w-full justify-center block text-center">Batal</a>
      </div>
    </form>
  </div>
</div>
@endsection
