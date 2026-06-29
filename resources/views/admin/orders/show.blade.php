@extends('layouts.app')
@section('title', 'Detail Pesanan — CeritaHey')

@section('content')
<div class="section-container py-8 md:py-12">
  @include('admin.nav')
  <a href="{{ route('admin.orders.index') }}" class="text-sm font-semibold text-amber-600 hover:underline mb-4 inline-block">← Semua Pesanan</a>

  <div class="card p-6" style="max-width: 48rem;">
    <h1 class="text-xl font-black mb-4">Detail Pesanan</h1>
    <table class="w-full text-sm">
      <tr><td class="py-2 text-stone-500 w-40">Invoice</td><td class="font-semibold">{{ $order->invoice }}</td></tr>
      <tr><td class="py-2 text-stone-500">User</td><td>{{ $order->user->name }} ({{ $order->user->email }})</td></tr>
      <tr><td class="py-2 text-stone-500">Nama Customer</td><td>{{ $order->customer_name }}</td></tr>
      <tr><td class="py-2 text-stone-500">Email</td><td>{{ $order->customer_email }}</td></tr>
      <tr><td class="py-2 text-stone-500">No. HP</td><td>{{ $order->customer_phone ?? '-' }}</td></tr>
      <tr><td class="py-2 text-stone-500">Status</td><td><span class="badge @switch($order->status) @case('paid') badge-success @break @case('expired') badge-danger @break @case('failed') badge-danger @break @default badge-warning @endswitch">{{ ucfirst($order->status) }}</span></td></tr>
      <tr><td class="py-2 text-stone-500">Produk</td><td>
        @foreach($order->items as $item)
          {{ $item->product_name }} ({{ $item->book_count }} buku) — Rp{{ number_format($item->subtotal, 0, ',', '.') }}<br>
        @endforeach
      </td></tr>
      <tr><td class="py-2 text-stone-500">Total</td><td class="font-bold text-lg">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</td></tr>
      <tr><td class="py-2 text-stone-500">Pembayaran</td><td>
        @if($order->payment)
          {{ $order->payment->channel ?? '-' }} ·
          <span class="badge @switch($order->payment->status) @case('paid') badge-success @break @case('expired') badge-danger @break @case('failed') badge-danger @break @default badge-warning @endswitch">{{ ucfirst($order->payment->status) }}</span>
          @if($order->payment->paid_at)
            <br><span class="text-xs text-stone-400">Lunas: {{ $order->payment->paid_at }}</span>
          @endif
        @else
          <span class="text-stone-400">Belum dipilih</span>
        @endif
      </td></tr>
      @if($order->notes)
        <tr><td class="py-2 text-stone-500">Catatan</td><td>{{ $order->notes }}</td></tr>
      @endif
      <tr><td class="py-2 text-stone-500">Dibuat</td><td>{{ $order->created_at->format('d M Y H:i') }}</td></tr>
    </table>
  </div>
</div>
@endsection
