<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
  <title>@yield('title', 'CeritaHey') — Buku Cerita Digital Anak</title>
  <meta name="description" content="Koleksi buku cerita digital bergambar full color untuk anak. Mulai dari Rp2.000!">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@400;500;600;700&family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    * { -webkit-tap-highlight-color: transparent; }
    html { scroll-behavior: smooth; }

    /* Typography */
    .font-heading { font-family: 'Fredoka', sans-serif; }
    .font-body { font-family: 'Nunito', sans-serif; }

    /* Elevation */
    .el-0 { box-shadow: none; }
    .el-1 { box-shadow: 0 1px 3px rgba(0,0,0,.06), 0 1px 2px rgba(0,0,0,.04); }
    .el-2 { box-shadow: 0 4px 6px -1px rgba(0,0,0,.07), 0 2px 4px -2px rgba(0,0,0,.05); }
    .el-3 { box-shadow: 0 10px 15px -3px rgba(0,0,0,.08), 0 4px 6px -4px rgba(0,0,0,.04); }
    .el-4 { box-shadow: 0 20px 25px -5px rgba(0,0,0,.1), 0 8px 10px -6px rgba(0,0,0,.05); }

    /* Container - NO @apply, plain CSS */
    .section-container {
      max-width: 1152px;
      margin-left: auto;
      margin-right: auto;
      padding-left: 16px;
      padding-right: 16px;
    }
    @media (min-width: 640px) {
      .section-container {
        padding-left: 24px;
        padding-right: 24px;
      }
    }
    @media (min-width: 1024px) {
      .section-container {
        padding-left: 32px;
        padding-right: 32px;
      }
    }

    /* Bento card */
    .bento-card {
      background: rgba(255,255,255,0.8);
      -webkit-backdrop-filter: blur(4px);
      backdrop-filter: blur(4px);
      border: 1px solid rgba(251,191,36,0.15);
      border-radius: 16px;
      transition: all 0.2s;
    }
    .bento-card:hover {
      box-shadow: 0 10px 15px -3px rgba(0,0,0,.08), 0 4px 6px -4px rgba(0,0,0,.04);
      border-color: rgba(251,191,36,0.3);
      transform: translateY(-2px);
    }

    /* Regular Card */
    .card {
      background: #fff;
      border: 1px solid #e7e5e4;
      border-radius: 16px;
      box-shadow: 0 4px 6px -1px rgba(0,0,0,.07), 0 2px 4px -2px rgba(0,0,0,.05);
    }

    /* CTA button */
    .btn-cta {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      padding: 14px 28px;
      border-radius: 12px;
      font-weight: 700;
      color: #fff;
      font-size: 16px;
      min-height: 48px;
      background: linear-gradient(135deg, #f97316, #ea580c);
      box-shadow: 0 4px 14px rgba(249,115,22,.3);
      transition: all .2s;
    }
    .btn-cta:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(249,115,22,.35); }
    .btn-cta:active { transform: translateY(0); }

    .btn-primary {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      padding: 14px 28px;
      border-radius: 12px;
      font-weight: 700;
      color: #fff;
      font-size: 16px;
      min-height: 48px;
      background: linear-gradient(135deg, #f97316, #ea580c);
      box-shadow: 0 4px 14px rgba(249,115,22,.3);
      transition: all .2s;
    }
    .btn-primary:hover { transform: translateY(-1px); box-shadow: 0 6px 20px rgba(249,115,22,.35); }
    .btn-primary:active { transform: translateY(0); }

    .btn-outline {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      gap: 8px;
      padding: 14px 28px;
      border-radius: 12px;
      font-weight: 700;
      color: #44403c;
      font-size: 16px;
      min-height: 48px;
      border: 2px solid #d6d3d1;
      transition: all .2s;
    }
    .btn-outline:hover { border-color: #fbbf24; background: #fffbeb; color: #b45309; }

    /* Badge */
    .badge {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 4px 12px;
      border-radius: 9999px;
      font-size: 12px;
      font-weight: 700;
    }
    .badge-warning { background: #fef3c7; color: #92400e; }
    .badge-success { background: #d1fae5; color: #065f46; }
    .badge-danger { background: #fee2e2; color: #991b1b; }
    .badge-secondary { background: #f5f5f4; color: #57534e; }

    /* Input */
    .input-field {
      width: 100%;
      padding: 12px 16px;
      border-radius: 12px;
      border: 1px solid #d6d3d1;
      background: rgba(255,255,255,0.8);
      transition: all 0.2s;
      min-height: 48px;
    }
    .input-field:focus {
      border-color: #fbbf24;
      outline: none;
      box-shadow: 0 0 0 3px rgba(251,191,36,0.3);
    }

    .label {
      display: block;
      font-size: 14px;
      font-weight: 700;
      color: #44403c;
      margin-bottom: 6px;
    }

    /* Section title */
    .section-title {
      font-family: 'Fredoka', sans-serif;
      font-size: 30px;
      font-weight: 700;
      color: #1c1917;
    }
    @media (min-width: 768px) {
      .section-title { font-size: 36px; }
    }

    /* Focus ring */
    .focus-ring {
      outline: 2px solid transparent;
      outline-offset: 2px;
      transition: outline-color .15s;
    }
    .focus-ring:focus-visible {
      outline-color: #f59e0b;
      border-radius: 8px;
    }
    a:focus-visible, button:focus-visible, input:focus-visible, select:focus-visible, textarea:focus-visible {
      outline: 2px solid #f59e0b;
      outline-offset: 2px;
    }

    /* Z-index */
    .z-nav { z-index: 100; }
    .z-overlay { z-index: 200; }
    .z-modal { z-index: 300; }

    /* Animation */
    .animate-in {
      opacity: 0;
      transform: translateY(12px);
      animation: fadeUp .5s ease-out forwards;
    }
    .animate-in-d1 { animation-delay: .1s; }
    .animate-in-d2 { animation-delay: .2s; }
    .animate-in-d3 { animation-delay: .3s; }
    .animate-in-d4 { animation-delay: .4s; }

    @keyframes fadeUp {
      to { opacity: 1; transform: translateY(0); }
    }

    @media (prefers-reduced-motion: reduce) {
      *, *::before, *::after {
        animation-duration: 0.01ms !important;
        animation-iteration-count: 1 !important;
        transition-duration: 0.01ms !important;
      }
      html { scroll-behavior: auto; }
      .animate-in { opacity: 1; transform: none; }
    }
  </style>
</head>
<body class="font-body text-stone-800 bg-amber-50/40 antialiased min-h-dvh">

  {{-- Nav --}}
  <nav class="sticky top-0 z-nav bg-white/85 backdrop-blur-xl border-b border-amber-100/60">
    <div class="section-container h-16 flex items-center justify-between">
      <a href="{{ route('home') }}" class="font-heading text-xl font-bold text-stone-900 tracking-tight focus-ring" aria-label="CeritaHey Beranda">
        CeritaHey
      </a>
      <div class="flex items-center gap-1 sm:gap-3 text-sm font-bold">
        <a href="{{ route('home') }}" class="px-3 py-2 rounded-xl text-stone-600 hover:text-amber-600 hover:bg-amber-50 transition-colors focus-ring" aria-current="@if(request()->routeIs('home')) page @endif">Beranda</a>
        <a href="{{ route('cart.index') }}" class="relative px-3 py-2 rounded-xl text-stone-600 hover:text-amber-600 hover:bg-amber-50 transition-colors focus-ring flex items-center gap-1" aria-current="@if(request()->routeIs('cart.index')) page @endif">
          <span><i class="fa-solid fa-cart-shopping"></i></span>
          <span class="hidden sm:inline">Keranjang</span>
          @if(session()->has('cart') && count(session('cart')) > 0)
            <span class="absolute -top-1 -right-1 flex h-4 w-4 items-center justify-center rounded-full bg-orange-500 text-[10px] font-black text-white">
              {{ count(session('cart')) }}
            </span>
          @endif
        </a>
        @auth
          @if(Auth::user()->isAdmin())
            <a href="{{ route('admin.dashboard') }}" class="px-3 py-2 rounded-xl text-stone-600 hover:text-amber-600 hover:bg-amber-50 transition-colors focus-ring">Admin</a>
          @endif
          <a href="{{ route('order.my') }}" class="px-3 py-2 rounded-xl text-stone-600 hover:text-amber-600 hover:bg-amber-50 transition-colors focus-ring">Pesanan</a>
          <a href="{{ route('settings') }}" class="px-3 py-2 rounded-xl text-stone-600 hover:text-amber-600 hover:bg-amber-50 transition-colors focus-ring" aria-current="@if(request()->routeIs('settings')) page @endif">Pengaturan</a>
          <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button class="px-3 py-2 rounded-xl text-stone-500 hover:bg-stone-100 transition-colors focus-ring font-semibold cursor-pointer">{{ Auth::user()->name }}</button>
          </form>
        @else
          <a href="{{ route('login') }}" class="px-3 py-2 rounded-xl text-stone-600 hover:text-amber-600 hover:bg-amber-50 transition-colors focus-ring">Masuk</a>
          <a href="{{ route('register') }}" class="btn-cta text-sm px-5 py-2.5">Daftar</a>
        @endauth
      </div>
    </div>
  </nav>

  {{-- Flash --}}
  @if(session('success'))
    <div class="section-container mt-4">
      <div class="flex items-center gap-3 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm font-bold" role="alert">
        <svg class="w-5 h-5 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        {{ session('success') }}
      </div>
    </div>
  @endif

  {{-- Main --}}
  <main>
    @yield('content')
  </main>

  @stack('scripts')

  {{-- Footer --}}
  <footer class="border-t border-amber-100 mt-32 bg-white">
    <div class="section-container" style="padding-top:56px;padding-bottom:48px;">
      <div style="display:grid;grid-template-columns:1fr;gap:40px;" class="footer-grid">

        {{-- Brand col --}}
        <div>
          <a href="{{ route('home') }}" class="font-heading text-2xl font-bold text-stone-900 tracking-tight">
            <i class="fa-solid fa-book-open text-amber-500 mr-1.5"></i>CeritaHey
          </a>
          <p class="mt-3 text-sm text-stone-500 leading-relaxed" style="max-width:280px;">
            Platform buku cerita digital bergambar full color untuk anak Indonesia.
            Terjangkau, menyenangkan, dan edukatif.
          </p>
          <div class="mt-5 flex items-center gap-3">
            <span class="badge badge-success text-xs"><i class="fa-solid fa-lock"></i> Pembayaran Aman</span>
            <span class="badge badge-warning text-xs"><i class="fa-solid fa-circle-check"></i> Produk Digital</span>
          </div>
        </div>

        {{-- Navigasi --}}
        <div>
          <h3 class="text-xs font-bold text-stone-400 uppercase tracking-widest mb-4">Navigasi</h3>
          <ul class="space-y-3 text-sm">
            <li><a href="{{ route('home') }}" class="text-stone-600 hover:text-amber-600 transition-colors font-medium"><i class="fa-solid fa-house fa-fw mr-1 text-stone-400"></i>Beranda</a></li>
            @auth
            <li><a href="{{ route('order.my') }}" class="text-stone-600 hover:text-amber-600 transition-colors font-medium"><i class="fa-solid fa-box fa-fw mr-1 text-stone-400"></i>Pesanan Saya</a></li>
            <li><a href="{{ route('settings') }}" class="text-stone-600 hover:text-amber-600 transition-colors font-medium"><i class="fa-solid fa-gear fa-fw mr-1 text-stone-400"></i>Pengaturan</a></li>
            @else
            <li><a href="{{ route('login') }}" class="text-stone-600 hover:text-amber-600 transition-colors font-medium"><i class="fa-solid fa-right-to-bracket fa-fw mr-1 text-stone-400"></i>Masuk</a></li>
            <li><a href="{{ route('register') }}" class="text-stone-600 hover:text-amber-600 transition-colors font-medium"><i class="fa-solid fa-wand-magic-sparkles fa-fw mr-1 text-amber-500"></i>Daftar Gratis</a></li>
            @endauth
          </ul>
        </div>

        {{-- Informasi --}}
        <div>
          <h3 class="text-xs font-bold text-stone-400 uppercase tracking-widest mb-4">Informasi</h3>
          <ul class="space-y-3 text-sm">
            <li><a href="{{ route('about') }}" class="text-stone-600 hover:text-amber-600 transition-colors font-medium"><i class="fa-solid fa-book fa-fw mr-1 text-stone-400"></i>Tentang Kami</a></li>
            <li><a href="{{ route('faq') }}" class="text-stone-600 hover:text-amber-600 transition-colors font-medium"><i class="fa-solid fa-circle-question fa-fw mr-1 text-stone-400"></i>FAQ</a></li>
            <li><a href="{{ route('privacy') }}" class="text-stone-600 hover:text-amber-600 transition-colors font-medium"><i class="fa-solid fa-shield-halved fa-fw mr-1 text-stone-400"></i>Kebijakan Privasi</a></li>
            <li><a href="{{ route('terms') }}" class="text-stone-600 hover:text-amber-600 transition-colors font-medium"><i class="fa-solid fa-scale-balanced fa-fw mr-1 text-stone-400"></i>Syarat & Ketentuan</a></li>
          </ul>
        </div>

        {{-- Kontak --}}
        <div>
          <h3 class="text-xs font-bold text-stone-400 uppercase tracking-widest mb-4">Kontak</h3>
          <ul class="space-y-3 text-sm text-stone-600">
            <li>
              <a href="{{ route('contact') }}" class="text-stone-600 hover:text-amber-600 transition-colors font-medium"><i class="fa-solid fa-phone fa-fw mr-1 text-stone-400"></i>Kontak Support</a>
            </li>
            <li class="flex items-start gap-2">
              <span><i class="fa-solid fa-envelope fa-fw mr-1 text-stone-400"></i></span>
              <a href="mailto:aksendigitalkreatif@gmail.com" class="hover:underline">aksendigitalkreatif@gmail.com</a>
            </li>
            <li class="flex items-start gap-2">
              <span><i class="fa-solid fa-clock fa-fw mr-1 text-stone-400"></i></span>
              <span>Senin–Jumat<br>09.00–17.00 WIB</span>
            </li>
          </ul>
        </div>

      </div>

      {{-- Payment badges --}}
      <div class="mt-12 pt-8 border-t border-stone-100">
        <div class="flex flex-wrap items-center gap-3 mb-6">
          <span class="text-xs text-stone-400 font-semibold mr-2">Metode Pembayaran:</span>
          @foreach(['QRIS', 'BRI VA', 'BNI VA', 'BCA VA', 'OVO'] as $pm)
          <span style="display:inline-flex;align-items:center;padding:4px 10px;border-radius:8px;border:1px solid #e7e5e4;background:#fff;font-size:11px;font-weight:700;color:#57534e;">{{ $pm }}</span>
          @endforeach
        </div>
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
          <p class="text-sm text-stone-400">
            &copy; {{ date('Y') }} CeritaHey. All rights reserved.
          </p>
          <div class="flex flex-wrap items-center gap-4 text-xs text-stone-400">
            <a href="{{ route('about') }}" class="hover:text-amber-600 transition-colors">Tentang Kami</a>
            <a href="{{ route('privacy') }}" class="hover:text-amber-600 transition-colors">Kebijakan Privasi</a>
            <a href="{{ route('terms') }}" class="hover:text-amber-600 transition-colors">Syarat & Ketentuan</a>
            <a href="{{ route('faq') }}" class="hover:text-amber-600 transition-colors">FAQ</a>
            <a href="{{ route('contact') }}" class="hover:text-amber-600 transition-colors">Kontak</a>
          </div>
        </div>
      </div>

    </div>

    <style>
      @media (min-width: 640px) {
        .footer-grid { grid-template-columns: 2fr 1fr 1fr 1fr !important; }
      }
      .space-y-3 > * + * { margin-top: 0.75rem; }
    </style>
  </footer>


</body>
</html>
