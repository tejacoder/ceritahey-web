@extends('layouts.app')
@section('title', 'Beranda')
@section('description', 'Koleksi buku cerita digital bergambar full color untuk anak. Mulai dari Rp2.000! Beli sekarang.')

@section('content')

{{-- ============= HERO ============= --}}
<section class="relative overflow-hidden pt-10 pb-16 md:pt-16 md:pb-24" aria-label="Hero">
  {{-- Decorative blobs --}}
  <div class="absolute inset-0 overflow-hidden pointer-events-none" aria-hidden="true">
    <div class="absolute -top-40 -right-40 w-96 h-96 rounded-full bg-amber-200/30 blur-3xl"></div>
    <div class="absolute -bottom-32 -left-32 w-80 h-80 rounded-full bg-orange-100/40 blur-3xl"></div>
  </div>

  <div class="section-container relative">
    <div class="grid md:grid-cols-2 gap-10 md:gap-16 items-center">
      {{-- Left: content --}}
      <div class="space-y-6 animate-in max-w-lg">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-amber-100/80 text-amber-700 text-sm font-bold">
          <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
          </svg>
          Buku Digital Anak Full Color
        </div>

        <h1 class="font-heading text-4xl sm:text-5xl md:text-6xl font-bold text-stone-900 leading-[1.1] tracking-tight">
          Selamat Datang di<br>
          <span class="text-amber-500">CeritaHey</span>
        </h1>

        <p class="text-lg text-stone-600 leading-relaxed">
          Koleksi buku cerita digital bergambar <strong class="text-stone-800">full color</strong>
          untuk menemani waktu membaca si kecil. Seru, mendidik, penuh pesan moral!
        </p>

        <div class="flex flex-wrap gap-3 pt-2">
          <a href="#paket" class="btn-cta">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
            Lihat Paket
          </a>
          <a href="{{ config('services.google.sample_gdrive_url') }}" target="_blank" class="btn-outline" style="border-color: #10b981; background: #ecfdf5; color: #047857; display: inline-flex; align-items: center; gap: 8px;">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
            </svg>
            Download Sampel
          </a>
          <a href="#tentang" class="btn-outline">Kenalan Dulu</a>
        </div>

        {{-- Social proof --}}
        <div class="flex flex-wrap gap-6 pt-4 text-sm">
          <div class="flex items-center gap-2 text-stone-500">
            <svg class="w-4 h-4 text-amber-500" fill="currentColor" viewBox="0 0 24 24"><path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"/></svg>
            <span>+50 Happy Parents</span>
          </div>
          <div class="flex items-center gap-2 text-stone-500">
            <svg class="w-4 h-4 text-amber-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
            <span>Rating 4.9</span>
          </div>
        </div>
      </div>

      {{-- Right: clean illustration --}}
      <div class="relative h-80 md:h-96 animate-in animate-in-d2" aria-hidden="true">
        {{-- Large book card centered --}}
        <div class="absolute inset-0 flex items-center justify-center">
          <div class="w-64 md:w-72 h-72 md:h-80 rounded-3xl bg-gradient-to-br from-amber-200 via-amber-100 to-orange-200 el-4 flex flex-col items-center justify-center p-8 border border-amber-200/40">
            {{-- Book icon --}}
            <div class="w-16 h-16 rounded-2xl bg-white/40 flex items-center justify-center mb-4">
              <svg class="w-9 h-9 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            </div>
            <p class="font-heading text-2xl font-bold text-white drop-shadow-sm">Petualangan<br>di Hutan</p>
            <div class="flex gap-1 mt-3">
              <span class="w-6 h-1.5 rounded-full bg-white/50"></span>
              <span class="w-6 h-1.5 rounded-full bg-white/50"></span>
              <span class="w-3 h-1.5 rounded-full bg-white/30"></span>
            </div>
          </div>
        </div>
        {{-- Floating small card top-right --}}
        <div class="absolute top-4 right-4 md:top-6 md:right-8 w-28 md:w-32 h-24 md:h-28 rounded-2xl bg-white/80 backdrop-blur-sm el-2 flex flex-col items-center justify-center p-3 border border-amber-100/60">
          <svg class="w-6 h-6 text-emerald-500 mb-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          <span class="font-heading font-bold text-stone-800 text-lg">100+</span>
          <span class="text-[10px] text-stone-400">Cerita</span>
        </div>
        {{-- Floating small card bottom-left --}}
        <div class="absolute bottom-6 left-0 md:bottom-8 md:left-2 w-24 md:w-28 h-20 md:h-24 rounded-2xl bg-white/80 backdrop-blur-sm el-2 flex flex-col items-center justify-center p-3 border border-amber-100/60">
          <span class="font-heading font-bold text-amber-600 text-lg">Rp2K</span>
          <span class="text-[10px] text-stone-400">/buku</span>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ============= TENTANG / FITUR ============= --}}
<section id="tentang" class="py-16 md:py-24 bg-white/60" aria-label="Fitur">
  <div class="section-container">
    <div class="text-center max-w-xl mx-auto mb-12 space-y-3">
      <h2 class="section-title">Kenapa CeritaHey?</h2>
      <p class="text-stone-500 text-base">Setiap cerita dirancang khusus buat anak — ilustrasi lucu, bahasa ringan, pesan moral berkesan.</p>
    </div>

    {{-- Grid 3x2 --}}
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
      @php
        $fitur = [
          ['palette', 'Ilustrasi Full Color', 'Gambar warna-warni bikin anak betah berlama-lama baca.'],
          ['book-open', 'Cerita Pendek & Padat', 'Pas banget buat dibaca sebelum tidur atau waktu senggang.'],
          ['heart', 'Pesan Moral Setiap Cerita', 'Setiap kisah punya pelajaran berharga yang bisa dipetik.'],
          ['smartphone', 'Baca di Mana Aja', 'Format PDF — buka di HP, tablet, atau laptop kapan pun.'],
          ['coins', 'Harga Super Hemat', 'Mulai Rp2.000 per buku! Lebih murah dari jajan pinggir jalan.'],
          ['gift', 'Bisa Jadi Kado', 'Cocok dikasih ke ponakan, sepupu, murid, atau teman kecil.'],
        ];
      @endphp

      @foreach($fitur as $f)
        <div class="bento-card p-5 md:p-6 group">
          <div class="w-11 h-11 rounded-xl bg-amber-100 flex items-center justify-center mb-4 text-amber-600 group-hover:bg-amber-200 transition-colors">
            @if($f[0] === 'palette')
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            @elseif($f[0] === 'book-open')
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
            @elseif($f[0] === 'heart')
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            @elseif($f[0] === 'smartphone')
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
            @elseif($f[0] === 'coins')
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            @elseif($f[0] === 'gift')
              <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
            @endif
          </div>
          <h3 class="font-heading font-semibold text-stone-900 mb-1.5 text-base">{{ $f[1] }}</h3>
          <p class="text-sm text-stone-500 leading-relaxed">{{ $f[2] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- ============= PAKET ============= --}}
<section id="paket" class="py-16 md:py-24" aria-label="Paket Harga">
  <div class="section-container">
    <div class="text-center max-w-xl mx-auto mb-12 space-y-3">
      <h2 class="section-title">Pilih Paketnya</h2>
      <p class="text-stone-500 text-base">Mulai dari 1 buku aja, atau borong biar makin hemat!</p>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5">
      @foreach($products as $p)
        <div class="relative bento-card p-6 text-center flex flex-col @if($p->is_featured) ring-2 ring-amber-500 bg-amber-50/60 @endif">
          @if($p->is_featured)
            <div class="absolute -top-3 left-1/2 -translate-x-1/2 inline-flex items-center gap-1 px-3 py-1 rounded-full bg-gradient-to-r from-amber-500 to-orange-500 text-white text-xs font-bold shadow-lg">
              <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
              Terlaris
            </div>
          @endif

          {{-- Cover Image or Icon --}}
          @if($p->cover_image_url)
            <div class="mb-4 flex items-center justify-center">
              <img src="{{ $p->cover_image_url }}" alt="{{ $p->image_alt ?? $p->name }}" class="w-28 h-28 object-cover rounded-2xl border shadow-sm">
            </div>
          @else
            <div class="w-12 h-12 rounded-xl bg-stone-100 flex items-center justify-center mx-auto mb-4 text-stone-500">
              @if($loop->index === 0)
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
              @elseif($loop->index === 1)
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
              @elseif($loop->index === 2)
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
              @else
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
              @endif
            </div>
          @endif

          <h3 class="font-heading font-semibold text-stone-900 text-base">{{ $p->name }}</h3>
          <p class="text-xs text-stone-400 mt-1">{{ $p->book_count }} buku cerita</p>

          <div class="mt-3">
            <span class="font-heading text-3xl font-bold text-stone-900">Rp{{ number_format($p->price, 0, ',', '.') }}</span>
            <p class="text-xs text-stone-400 mt-0.5">Rp{{ number_format(round($p->price/$p->book_count), 0, ',', '.') }}/buku</p>
          </div>

          <div class="mt-auto pt-5 space-y-2">
            <a href="{{ route('product.show', $p->slug) }}" class="btn-outline text-sm px-5 py-2 w-full justify-center">
              🔍 Detail Paket
            </a>
            <a href="{{ route('cart.add', [$p, 'redirect' => 'cart']) }}" class="btn-cta text-sm px-5 py-2 w-full justify-center">
              🚀 Beli Sekarang
            </a>
          </div>
        </div>
      @endforeach
    </div>

    {{-- Bonus note --}}
    <div class="mt-8 p-4 rounded-2xl bg-amber-50 border border-amber-200/60 text-center max-w-lg mx-auto">
      <p class="text-sm text-amber-800 font-semibold flex items-center justify-center gap-2">
        <svg class="w-4 h-4 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12a2 2 0 110-4h14a2 2 0 110 4M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7"/></svg>
        Setiap pembelian paket <strong>10+</strong> buku dapat <strong>FREE bookmark digital</strong> eksklusif!
      </p>
    </div>
  </div>
</section>

{{-- ============= CARA ORDER ============= --}}
<section class="py-16 md:py-20 bg-white/60" aria-label="Cara Order">
  <div class="section-container">
    <div class="text-center max-w-xl mx-auto mb-12 space-y-3">
      <h2 class="section-title">Cara Order</h2>
      <p class="text-stone-500 text-base">Mudah banget, cuma 3 langkah!</p>
    </div>

    <div class="grid sm:grid-cols-3 gap-8 max-w-3xl mx-auto">
      <div class="text-center">
        <div class="w-14 h-14 rounded-full bg-gradient-to-br from-amber-400 to-orange-400 text-white font-heading font-bold text-lg flex items-center justify-center mx-auto mb-4 el-3">1</div>
        <h3 class="font-heading font-semibold text-stone-900">Pilih Paket</h3>
        <p class="text-sm text-stone-500 mt-1.5 max-w-48 mx-auto">Tentukan paket yang cocok buat si kecil.</p>
      </div>
      <div class="text-center">
        <div class="w-14 h-14 rounded-full bg-gradient-to-br from-amber-400 to-orange-400 text-white font-heading font-bold text-lg flex items-center justify-center mx-auto mb-4 el-3">2</div>
        <h3 class="font-heading font-semibold text-stone-900">Bayar via Tripay</h3>
        <p class="text-sm text-stone-500 mt-1.5 max-w-48 mx-auto">Pilih metode pembayaran favorit kamu.</p>
      </div>
      <div class="text-center">
        <div class="w-14 h-14 rounded-full bg-gradient-to-br from-amber-400 to-orange-400 text-white font-heading font-bold text-lg flex items-center justify-center mx-auto mb-4 el-3">3</div>
        <h3 class="font-heading font-semibold text-stone-900">Terima PDF</h3>
        <p class="text-sm text-stone-500 mt-1.5 max-w-48 mx-auto">File langsung dikirim ke email & HP kamu!</p>
      </div>
    </div>
  </div>
</section>

{{-- ============= TESTIMONI ============= --}}
<section class="py-16 md:py-20" aria-label="Testimoni">
  <div class="section-container">
    <div class="text-center max-w-xl mx-auto mb-12 space-y-3">
      <h2 class="section-title">Kata Mereka</h2>
      <p class="text-stone-500 text-base">Apa kata para bunda & ayah tentang CeritaHey?</p>
    </div>

    <div class="grid sm:grid-cols-3 gap-5 max-w-4xl mx-auto">
      <div class="bento-card p-6">
        <div class="flex gap-0.5 text-amber-400 mb-3" aria-label="Rating 5 dari 5">
          @for($i=0;$i<5;$i++)
            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          @endfor
        </div>
        <p class="text-sm text-stone-600 leading-relaxed italic">"Anakku suka banget ilustrasinya. Tiap mau tidur minta dibacain lagi dan lagi!"</p>
        <p class="text-xs font-bold text-stone-500 mt-3">— Bunda Rina</p>
      </div>
      <div class="bento-card p-6">
        <div class="flex gap-0.5 text-amber-400 mb-3" aria-label="Rating 5 dari 5">
          @for($i=0;$i<5;$i++)
            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          @endfor
        </div>
        <p class="text-sm text-stone-600 leading-relaxed italic">"Harga ramah banget di kantong, isinya bagus. Jadi suka beliin buat ponakan."</p>
        <p class="text-xs font-bold text-stone-500 mt-3">— Tante Dinda</p>
      </div>
      <div class="bento-card p-6">
        <div class="flex gap-0.5 text-amber-400 mb-3" aria-label="Rating 4 dari 5">
          @for($i=0;$i<4;$i++)
            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
          @endfor
        </div>
        <p class="text-sm text-stone-600 leading-relaxed italic">"PDF-nya bersih, full color. Cocok diprint atau dibaca langsung dari HP."</p>
        <p class="text-xs font-bold text-stone-500 mt-3">— Mas Adit</p>
      </div>
    </div>
  </div>
</section>

@endsection
