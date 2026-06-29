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
  <footer class="border-t border-amber-100/60 py-10 mt-16 bg-white/50">
    <div class="section-container text-center text-sm text-stone-400">
      <p class="font-heading font-semibold text-stone-700">CeritaHey</p>
      <p class="mt-1">Buku Cerita Digital Anak — Indonesia</p>
      <p class="mt-1">&copy; {{ date('Y') }} CeritaHey. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
