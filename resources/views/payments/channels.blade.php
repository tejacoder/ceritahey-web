@extends('layouts.app')
@section('title', 'Pilih Pembayaran — CeritaHey')

@section('content')
<div class="max-w-lg mx-auto px-4 py-12">
  <h1 class="text-2xl font-black text-center mb-2">Pilih Pembayaran</h1>
  <p class="text-center text-stone-500 text-sm mb-2">Invoice: {{ $order->invoice }}</p>
  <p class="text-center text-2xl font-black text-amber-600 mb-8">Rp{{ number_format($order->total_amount, 0, ',', '.') }}</p>

  @if(empty($channels))
    <div class="card p-6 text-center">
      <p class="text-red-500 font-semibold">Gagal memuat metode pembayaran. Coba lagi nanti.</p>
      <p class="text-xs text-stone-400 mt-2">Pastikan API key Tripay sudah diisi di .env</p>
    </div>
  @else
    <form method="POST" action="{{ route('payment.process') }}" class="space-y-3">
      @csrf
      <input type="hidden" name="order_id" value="{{ $order->id }}">
      @foreach($channels as $ch)
        <label class="card p-4 flex items-center gap-4 cursor-pointer hover:ring-2 hover:ring-amber-400 transition has-[:checked]:ring-2 has-[:checked]:ring-amber-500 has-[:checked]:bg-amber-50">
          <input type="radio" name="method" value="{{ $ch['code'] }}" class="accent-amber-500" required>
          <div>
            <p class="font-bold text-sm">{{ $ch['name'] }}</p>
            <p class="text-xs text-stone-400">{{ $ch['group'] ?? '-' }}</p>
          </div>
        </label>
      @endforeach
      <button type="submit" class="btn-primary w-full justify-center mt-4">Lanjut Bayar</button>
    </form>
  @endif
</div>
@endsection
