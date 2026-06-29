@extends('layouts.app')
@section('title', 'Menunggu Pembayaran — CeritaHey')

@section('content')
<div class="max-w-lg mx-auto px-4 py-12 text-center">
  <div class="card p-8">
    <div class="w-16 h-16 mx-auto rounded-full bg-amber-100 flex items-center justify-center mb-4 text-amber-600">
      <svg class="w-8 h-8 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    </div>
    <h1 class="text-2xl font-black mb-2">Menunggu Pembayaran</h1>
    <p class="text-stone-500 mb-6">Silakan selesaikan pembayaran melalui halaman Tripay.</p>

    <div class="text-left space-y-2 text-sm mb-6">
      <p><span class="text-stone-500">Invoice:</span> <span class="font-semibold">{{ $payment->order->invoice }}</span></p>
      <p><span class="text-stone-500">Metode:</span> <span class="font-semibold">{{ $payment->channel }}</span></p>
      <p><span class="text-stone-500">Total:</span> <span class="font-semibold text-lg">Rp{{ number_format($payment->total, 0, ',', '.') }}</span></p>
    </div>

    @if(!empty($payment->payload['checkout_url']))
      <a href="{{ $payment->payload['checkout_url'] }}" target="_blank" class="btn-primary w-full justify-center">Buka Halaman Bayar</a>
    @endif

    <a href="{{ route('order.show', $payment->order) }}" class="btn-outline w-full justify-center mt-3">Cek Status Pesanan</a>
  </div>
</div>
@endsection
