@extends('layouts.app')
@section('title', 'Keranjang Belanja — CeritaHey')

@section('content')
<div class="section-container py-8 md:py-12 animate-in">
  <h1 class="font-heading text-2xl md:text-3xl font-bold text-stone-900 mb-8">Keranjang Belanja <i class="fa-solid fa-cart-shopping text-stone-700"></i></h1>

  @if(empty($products) || count($products) === 0)
    <div class="card p-12 text-center max-w-lg mx-auto bg-white">
      <div class="w-16 h-16 bg-amber-50 text-amber-500 rounded-full flex items-center justify-center mx-auto mb-4">
        <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
        </svg>
      </div>
      <h2 class="font-heading text-xl font-bold text-stone-800 mb-2">Keranjang Anda Kosong</h2>
      <p class="text-stone-500 text-sm mb-6">Anda belum menambahkan paket buku cerita anak ke keranjang.</p>
      <a href="{{ route('home') }}" class="btn-primary px-6 py-2.5 inline-flex items-center gap-2">
        <i class="fa-solid fa-house"></i> Cari Buku Cerita
      </a>
    </div>
  @else
    <div class="grid lg:grid-cols-3 gap-8 items-start">
      {{-- Daftar Produk --}}
      <div class="lg:col-span-2 space-y-4">
        <div class="card p-6 bg-white">
          <h2 class="font-heading text-lg font-bold text-stone-900 mb-4 border-b pb-2">Daftar Item</h2>
          <div class="divide-y divide-stone-100">
            @foreach($products as $p)
              <div class="py-4 flex gap-4 items-center justify-between first:pt-0 last:pb-0">
                <div class="flex items-center gap-4">
                  @if($p->cover_image_url)
                    <img src="{{ $p->cover_image_url }}" alt="{{ $p->image_alt ?? $p->name }}" class="w-16 h-16 object-cover rounded-xl border">
                  @else
                    <div class="w-16 h-16 rounded-xl bg-stone-100 flex items-center justify-center text-stone-400 text-xs border">No Cover</div>
                  @endif
                  <div>
                    <h3 class="font-bold text-stone-900 text-sm md:text-base">{{ $p->name }}</h3>
                    <p class="text-xs text-stone-500 mt-0.5">{{ $p->book_count }} buku cerita digital</p>
                  </div>
                </div>
                <div class="flex items-center gap-4">
                  <span class="font-heading font-bold text-stone-900 text-sm md:text-base">Rp{{ number_format($p->price, 0, ',', '.') }}</span>
                  <form method="POST" action="{{ route('cart.remove', $p) }}">
                    @csrf
                    <button type="submit" class="text-stone-400 hover:text-red-500 transition-colors p-1" title="Hapus produk">
                      <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                      </svg>
                    </button>
                  </form>
                </div>
              </div>
            @endforeach
          </div>
        </div>

        <div class="flex justify-between items-center px-6 py-4 bg-amber-50/50 rounded-2xl border border-amber-100">
          <span class="text-sm font-semibold text-stone-700">Total Belanja ({{ count($products) }} paket)</span>
          <span class="font-heading text-xl font-bold text-amber-600">Rp{{ number_format($total, 0, ',', '.') }}</span>
        </div>
      </div>

      {{-- Form Checkout --}}
      <div class="lg:col-span-1">
        <div class="card p-6 bg-white sticky top-20">
          <h2 class="font-heading text-lg font-bold text-stone-900 mb-4 border-b pb-2">Informasi Pemesan</h2>

          @auth
            <form method="POST" action="{{ route('order.store') }}">
              @csrf
              <div class="space-y-4">
                <div>
                  <label class="label">Nama Lengkap</label>
                  <input type="text" name="customer_name" class="input-field" value="{{ old('customer_name', Auth::user()->name) }}" required>
                  @error('customer_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                  <label class="label">Email Pengiriman</label>
                  <input type="email" name="customer_email" class="input-field" value="{{ old('customer_email', Auth::user()->email) }}" required>
                  <p class="text-[10px] text-stone-400 mt-1">Akses download buku digital akan dikirimkan ke email ini.</p>
                  @error('customer_email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                  <label class="label">No. WhatsApp</label>
                  <input type="text" name="customer_phone" class="input-field" value="{{ old('customer_phone', Auth::user()->phone) }}">
                  @error('customer_phone')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
                <div>
                  <label class="label">Catatan Tambahan (opsional)</label>
                  <textarea name="notes" class="input-field" rows="2">{{ old('notes') }}</textarea>
                  @error('notes')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                </div>
              </div>
              
              <button type="submit" class="btn-primary w-full justify-center mt-6">
                Lanjut ke Pembayaran <i class="fa-solid fa-credit-card ml-1"></i>
              </button>
            </form>
          @else
            <div class="text-center py-4">
              <div class="w-12 h-12 bg-stone-100 rounded-full flex items-center justify-center mx-auto mb-3 text-stone-500">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
              </div>
              <p class="font-bold text-stone-800 text-sm mb-1">Masuk untuk Melanjutkan</p>
              <p class="text-xs text-stone-400 mb-6 leading-relaxed">Anda harus masuk ke akun CeritaHey untuk melakukan transaksi aman dan mengakses buku Anda.</p>
              <div class="space-y-2">
                <a href="{{ route('login') }}" class="btn-primary w-full justify-center text-sm py-2">Masuk Sekarang</a>
                <a href="{{ route('register') }}" class="btn-outline w-full justify-center text-sm py-2">Daftar Akun Baru</a>
              </div>
            </div>
          @endauth
        </div>
      </div>
    </div>
  @endif
</div>
@endsection
