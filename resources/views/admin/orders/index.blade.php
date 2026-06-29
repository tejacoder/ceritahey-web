@extends('layouts.app')
@section('title', 'Pesanan — CeritaHey')

@section('content')
<div class="section-container py-8 md:py-12">
  @include('admin.nav')
  <h1 class="text-2xl font-black mb-6">Semua Pesanan</h1>

  <div class="card overflow-hidden">
    <table class="w-full text-sm">
      <thead class="bg-stone-50 text-left">
        <tr><th class="p-3 font-semibold">Invoice</th><th class="p-3 font-semibold">User</th><th class="p-3 font-semibold">Produk</th><th class="p-3 font-semibold">Total</th><th class="p-3 font-semibold">Status</th><th class="p-3 font-semibold">Tanggal</th></tr>
      </thead>
      <tbody class="divide-y divide-stone-100">
        @foreach($orders as $o)
          <tr>
            <td class="p-3"><a href="{{ route('admin.orders.show', $o) }}" class="text-amber-600 hover:underline font-semibold">{{ $o->invoice }}</a></td>
            <td class="p-3">{{ $o->user->name }}</td>
            <td class="p-3 text-stone-500">{{ $o->items->first()?->product_name ?? '-' }}</td>
            <td class="p-3">Rp{{ number_format($o->total_amount, 0, ',', '.') }}</td>
            <td class="p-3"><span class="badge @switch($o->status) @case('paid') badge-success @break @case('expired') badge-danger @break @case('failed') badge-danger @break @default badge-warning @endswitch">{{ ucfirst($o->status) }}</span></td>
            <td class="p-3 text-stone-500">{{ $o->created_at->format('d M Y') }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="mt-6">{{ $orders->links() }}</div>
</div>
@endsection
