@extends('layouts.app')
@section('title', 'Daftar — CeritaHey')

@section('content')
<div class="min-h-[70vh] flex items-center justify-center px-4 py-12">
  <div class="card p-8 w-full max-w-md">
    <h1 class="text-2xl font-black text-center mb-6">Daftar Akun</h1>
    <form method="POST">
      @csrf
      <div class="space-y-4">
        <div>
          <label class="label">Nama Lengkap</label>
          <input type="text" name="name" class="input-field @error('name') border-red-400 @enderror" value="{{ old('name') }}" required>
          @error('name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="label">Email</label>
          <input type="email" name="email" class="input-field @error('email') border-red-400 @enderror" value="{{ old('email') }}" required>
          @error('email')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="label">No. HP (opsional)</label>
          <input type="text" name="phone" class="input-field" value="{{ old('phone') }}">
        </div>
        <div>
          <label class="label">Password</label>
          <input type="password" name="password" class="input-field @error('password') border-red-400 @enderror" required>
          @error('password')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>
        <div>
          <label class="label">Konfirmasi Password</label>
          <input type="password" name="password_confirmation" class="input-field" required>
        </div>
      </div>
      <button type="submit" class="btn-cta w-full justify-center mt-6">Daftar</button>
    </form>
    <p class="text-center text-sm text-stone-500 mt-4">
      Sudah punya akun? <a href="{{ route('login') }}" class="text-amber-600 font-semibold hover:underline">Masuk</a>
    </p>
  </div>
</div>
@endsection
