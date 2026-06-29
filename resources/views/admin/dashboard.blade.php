@extends('layouts.app')
@section('title', 'Dashboard Admin')

@section('content')
<div class="section-container py-8 md:py-12">

  @include('admin.nav')

  {{-- Header --}}
  <div class="flex flex-wrap items-center justify-between gap-4 mb-8">
    <div>
      <h1 class="font-heading text-2xl md:text-3xl font-bold text-stone-900">Dashboard</h1>
      <p class="text-stone-500 mt-1 text-sm">Selamat datang kembali, {{ Auth::user()->name }}!</p>
    </div>
    <div class="flex flex-wrap gap-2">
      <a href="{{ route('admin.products.index') }}" class="btn-cta text-sm px-5 py-2.5">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/></svg>
        Kelola Produk
      </a>
      <a href="{{ route('admin.orders.index') }}" class="btn-outline text-sm px-5 py-2.5">
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
        Lihat Pesanan
      </a>
    </div>
  </div>

  {{-- Stat Cards --}}
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    {{-- Card 1: Users --}}
    <div class="bento-card p-5 relative overflow-hidden">
      <div class="absolute top-0 right-0 w-20 h-20 bg-amber-100/40 rounded-bl-[40px] -z-0"></div>
      <div class="relative z-10">
        <div class="w-10 h-10 rounded-lg bg-amber-100 flex items-center justify-center text-amber-600 mb-3">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/></svg>
        </div>
        <p class="font-heading text-3xl font-bold text-stone-900">{{ $stats['total_users'] }}</p>
        <p class="text-xs text-stone-500 mt-0.5">Total User</p>
      </div>
    </div>

    {{-- Card 2: Orders --}}
    <div class="bento-card p-5 relative overflow-hidden">
      <div class="absolute top-0 right-0 w-20 h-20 bg-orange-100/40 rounded-bl-[40px] -z-0"></div>
      <div class="relative z-10">
        <div class="w-10 h-10 rounded-lg bg-orange-100 flex items-center justify-center text-orange-600 mb-3">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
        </div>
        <p class="font-heading text-3xl font-bold text-stone-900">{{ $stats['total_orders'] }}</p>
        <p class="text-xs text-stone-500 mt-0.5">Total Pesanan</p>
      </div>
    </div>

    {{-- Card 3: Paid --}}
    <div class="bento-card p-5 relative overflow-hidden">
      <div class="absolute top-0 right-0 w-20 h-20 bg-emerald-100/40 rounded-bl-[40px] -z-0"></div>
      <div class="relative z-10">
        <div class="w-10 h-10 rounded-lg bg-emerald-100 flex items-center justify-center text-emerald-600 mb-3">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <p class="font-heading text-3xl font-bold text-stone-900">{{ $stats['orders_paid'] }}</p>
        <p class="text-xs text-stone-500 mt-0.5">Lunas</p>
      </div>
    </div>

    {{-- Card 4: Revenue --}}
    <div class="bento-card p-5 relative overflow-hidden">
      <div class="absolute top-0 right-0 w-20 h-20 bg-amber-100/40 rounded-bl-[40px] -z-0"></div>
      <div class="relative z-10">
        <div class="w-10 h-10 rounded-lg bg-amber-100 flex items-center justify-center text-amber-600 mb-3">
          <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <p class="font-heading text-3xl font-bold text-stone-900">Rp{{ number_format($stats['revenue'], 0, ',', '.') }}</p>
        <p class="text-xs text-stone-500 mt-0.5">Pendapatan</p>
      </div>
    </div>
  </div>

  {{-- Charts Row --}}
  <div class="grid md:grid-cols-2 gap-6 mb-8">
    {{-- Revenue Chart --}}
    <div class="bento-card p-6 flex flex-col justify-between">
      <div class="flex items-center justify-between mb-4">
        <h2 class="font-heading font-bold text-stone-900">Pendapatan Bulanan</h2>
        <span class="text-xs text-stone-400">6 bulan terakhir</span>
      </div>
      <div style="height:200px" class="relative">
        <canvas id="revenueChart" class="w-full h-full"></canvas>
      </div>
    </div>

    {{-- Order Status Chart --}}
    <div class="bento-card p-6 flex flex-col justify-between">
      <div class="flex items-center justify-between mb-4">
        <h2 class="font-heading font-bold text-stone-900">Status Pesanan</h2>
        <span class="text-xs text-stone-400">{{ $stats['total_orders'] }} total</span>
      </div>
      <div class="flex items-center justify-center relative" style="height:200px">
        <canvas id="statusChart" class="max-w-[200px] h-full"></canvas>
      </div>
    </div>
  </div>

  {{-- Bottom Row: Top Products + Recent Orders --}}
  <div class="grid md:grid-cols-2 gap-6">
    {{-- Top Products --}}
    <div class="bento-card overflow-hidden">
      <div class="p-5 border-b border-amber-100/40">
        <h2 class="font-heading font-bold text-stone-900">Produk Terlaris</h2>
      </div>
      <div class="p-5">
        @forelse($topProducts as $p)
          <div class="flex items-center gap-4 py-2.5 {{ !$loop->last ? 'border-b border-stone-100' : '' }}">
            <div class="w-8 h-8 rounded-lg bg-stone-100 flex items-center justify-center text-stone-500 text-xs font-bold shrink-0">
              {{ $loop->iteration }}
            </div>
            <div class="flex-1 min-w-0">
              <p class="text-sm font-bold text-stone-900 truncate">{{ $p->name }}</p>
              <p class="text-xs text-stone-400">{{ $p->book_count }} buku</p>
            </div>
            <div class="text-right shrink-0">
              <p class="text-sm font-bold text-emerald-600">{{ $p->sold_count }}x</p>
              <p class="text-xs text-stone-400">terjual</p>
            </div>
          </div>
        @empty
          <p class="text-sm text-stone-400 text-center py-6">Belum ada produk terjual.</p>
        @endforelse
      </div>
    </div>

    {{-- Recent Orders --}}
    <div class="bento-card overflow-hidden">
      <div class="p-5 border-b border-amber-100/40">
        <h2 class="font-heading font-bold text-stone-900">Pesanan Terbaru</h2>
      </div>
      <div class="divide-y divide-stone-100">
        @forelse($recentOrders as $o)
          <div class="p-4 flex items-center gap-3 hover:bg-stone-50/50 transition-colors">
            <div class="flex-1 min-w-0">
              <a href="{{ route('admin.orders.show', $o) }}" class="text-sm font-bold text-amber-600 hover:underline">{{ $o->invoice }}</a>
              <p class="text-xs text-stone-400 truncate">{{ $o->user->name }} • {{ $o->items->sum('count') }} item</p>
            </div>
            <div class="text-right shrink-0">
              <p class="text-sm font-bold text-stone-900">Rp{{ number_format($o->total_amount, 0, ',', '.') }}</p>
              <span class="inline-block mt-0.5 text-xs px-2 py-0.5 rounded-full font-bold
                @switch($o->status)
                  @case('paid') bg-emerald-100 text-emerald-700 @break
                  @case('pending') bg-amber-100 text-amber-700 @break
                  @case('expired') bg-red-100 text-red-700 @break
                  @case('failed') bg-red-100 text-red-700 @break
                  @default bg-stone-100 text-stone-600 @endswitch
              ">{{ ucfirst($o->status) }}</span>
            </div>
          </div>
        @empty
          <p class="text-sm text-stone-400 text-center py-8">Belum ada pesanan.</p>
        @endforelse
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
  // Revenue bar chart
  const revCtx = document.getElementById('revenueChart').getContext('2d');
  new Chart(revCtx, {
    type: 'bar',
    data: {
      labels: @json($months),
      datasets: [{
        label: 'Pendapatan (Rp)',
        data: @json($revenueData),
        backgroundColor: 'rgba(251,191,36,0.7)',
        borderColor: '#f59e0b',
        borderWidth: 2,
        borderRadius: 6,
        barPercentage: 0.6,
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: false }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: {
            callback: v => 'Rp' + v.toLocaleString('id-ID'),
            font: { size: 10 }
          },
          grid: { color: 'rgba(0,0,0,0.04)' }
        },
        x: {
          grid: { display: false },
          ticks: { font: { size: 11 } }
        }
      }
    }
  });

  // Status donut chart
  const stCtx = document.getElementById('statusChart').getContext('2d');
  new Chart(stCtx, {
    type: 'doughnut',
    data: {
      labels: @json($statusLabels),
      datasets: [{
        data: @json($statusCounts),
        backgroundColor: ['#fbbf24', '#34d399', '#f87171'],
        borderWidth: 3,
        borderColor: '#fff',
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      cutout: '70%',
      plugins: {
        legend: {
          position: 'bottom',
          labels: {
            boxWidth: 12,
            padding: 12,
            font: { size: 11 }
          }
        }
      }
    }
  });
});
</script>
@endpush
