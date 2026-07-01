@extends('layouts.app')
@section('title', 'Detail Pesanan — CeritaHey')

@section('content')
<div class="max-w-lg mx-auto px-4 py-12">
  <a href="{{ route('order.my') }}" class="text-sm font-semibold text-amber-600 hover:underline mb-4 inline-block">← Semua Pesanan</a>

  <div class="card p-6">
    <h1 class="text-xl font-black mb-4">Detail Pesanan</h1>
    <table class="w-full text-sm">
      <tr><td class="py-2 text-stone-500">Invoice</td><td class="font-semibold">{{ $order->invoice }}</td></tr>
      <tr><td class="py-2 text-stone-500">Status</td><td><span class="badge @switch($order->status) @case('paid') badge-success @break @case('expired') badge-danger @break @case('failed') badge-danger @break @default badge-warning @endswitch">{{ ucfirst($order->status) }}</span></td></tr>
      <tr><td class="py-2 text-stone-500">Nama</td><td>{{ $order->customer_name }}</td></tr>
      <tr><td class="py-2 text-stone-500">Email</td><td>{{ $order->customer_email }}</td></tr>
      <tr>
        <td class="py-2 text-stone-500 align-top">Produk</td>
        <td class="py-2">
          <ul class="list-disc list-inside space-y-0.5">
            @foreach($order->items as $item)
              <li>{{ $item->product_name }}</li>
            @endforeach
          </ul>
        </td>
      </tr>
      <tr><td class="py-2 text-stone-500">Total</td><td class="font-bold text-lg">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</td></tr>
      @if($order->payment && $order->payment->channel)
        <tr><td class="py-2 text-stone-500">Pembayaran</td><td>{{ $order->payment->channel }}</td></tr>
      @endif
    </table>

    @if($order->status === 'pending')
      <div class="mt-6">
        @if($order->payment && $order->payment->payload && !empty($order->payment->payload['checkout_url']))
          <a href="{{ $order->payment->payload['checkout_url'] }}" target="_blank" class="btn-primary w-full justify-center">Bayar Sekarang</a>
        @else
          <a href="{{ route('payment.channels', $order) }}" class="btn-primary w-full justify-center">Pilih Pembayaran</a>
        @endif
      </div>
    @endif

    @if($order->status === 'paid')
      <div class="mt-6 p-5 bg-emerald-50 border border-emerald-200 rounded-2xl text-center">
        <div class="w-12 h-12 mx-auto rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 mb-3">
          <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
        </div>
        <p class="text-emerald-800 font-bold text-lg">Pembayaran Berhasil</p>
        <p class="text-sm text-emerald-700 mt-1 leading-relaxed">Akses buku digital sudah dibuka dan dikirimkan ke <strong>{{ $order->customer_email }}</strong>.</p>
        
        <div class="mt-4 space-y-2 text-left">
          <p class="text-xs font-bold text-stone-500 uppercase tracking-wider mb-2 text-center">Silakan Unduh Buku Cerita Anda:</p>
          @foreach($order->items as $item)
            <div class="flex items-center justify-between p-3 bg-white rounded-xl border border-stone-200 shadow-sm">
              <span class="font-bold text-xs text-stone-700 max-w-[70%]">{{ $item->product_name }}</span>
              <a href="{{ route('order.download', [$order, 'item' => $item->id]) }}" class="btn-primary text-xs px-3.5 py-2 min-h-0 h-auto inline-flex items-center gap-1 rounded-lg">
                Unduh PDF
              </a>
            </div>
          @endforeach
        </div>
      </div>
    @endif
  </div>
</div>
@endsection
