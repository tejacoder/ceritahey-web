@extends('layouts.app')
@section('title', 'Masuk — CeritaHey')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center px-4 py-12">
  <div class="card p-8 w-full max-w-md">
    <h1 class="text-2xl font-black text-center mb-6">Masuk</h1>
    <form method="POST">
      @csrf
      <div class="space-y-4">
        <div>
          <label class="label">Email</label>
          <input type="email" name="email" class="input-field @error('email') border-red-400 @enderror" value="{{ old('email') }}" required autofocus>
          @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="label">Password</label>
          <input type="password" name="password" class="input-field @error('password') border-red-400 @enderror" required>
        </div>
        <label class="flex items-center gap-2 text-sm text-stone-600">
          <input type="checkbox" name="remember" class="rounded"> Ingat saya
        </label>
      </div>
      <button type="submit" class="btn-cta w-full justify-center mt-6">Masuk</button>
    </form>
    <p class="text-center text-sm text-stone-500 mt-4">
      Belum punya akun? <a href="{{ route('register') }}" class="text-amber-600 font-semibold hover:underline">Daftar</a>
    </p>
  </div>
</div>
@endsection
