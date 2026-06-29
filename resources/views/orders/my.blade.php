@extends('layouts.app')
@section('title', 'Pesanan Saya — CeritaHey')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-12">
  <h1 class="text-2xl font-black mb-6">Pesanan Saya</h1>

  @if($orders->isEmpty())
    <div class="card p-8 text-center">
      <p class="text-stone-500">Belum ada pesanan. <a href="{{ route('home') }}" class="text-amber-600 font-semibold hover:underline">Beli sekarang</a></p>
    </div>
  @else
    <div class="space-y-4">
      @foreach($orders as $order)
        <a href="{{ route('order.show', $order) }}" class="card p-5 flex flex-wrap items-center justify-between gap-4 hover:shadow-md transition block">
          <div>
            <p class="font-bold">{{ $order->invoice }}</p>
            <p class="text-sm text-stone-500">{{ $order->created_at->format('d M Y, H:i') }}</p>
            <p class="text-xs text-stone-400">{{ $order->items->first()?->product_name ?? '-' }}</p>
          </div>
          <div class="text-right">
            <p class="font-bold">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</p>
            <span class="badge @switch($order->status) @case('paid') badge-success @break @case('expired') badge-danger @break @case('failed') badge-danger @break @default badge-warning @endswitch">{{ ucfirst($order->status) }}</span>
          </div>
        </a>
      @endforeach
    </div>
    <div class="mt-6">
      {{ $orders->links() }}
    </div>
  @endif
</div>
@endsection
