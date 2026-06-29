@extends('layouts.app')
@section('title', 'Pengaturan Profil')

@section('content')
<div class="section-container py-8 md:py-12">
  <div class="max-w-2xl mx-auto">
    <h1 class="text-2xl font-black mb-6">Pengaturan Profil</h1>

    @if($errors->any())
      <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 text-sm font-semibold rounded-2xl">
        <ul class="list-disc list-inside space-y-1">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="card p-6" style="max-width: 42rem;">
      <form method="POST" action="{{ route('settings.update') }}">
        @csrf
        @method('PUT')
        
        <div class="space-y-5">
          <div>
            <h2 class="text-base font-bold text-stone-800 mb-4 border-b border-stone-100 pb-2">Informasi Profil</h2>
            <div class="space-y-4">
              <div>
                <label class="label">Nama</label>
                <input type="text" name="name" class="input-field" value="{{ old('name', $user->name) }}" required>
              </div>
              <div>
                <label class="label">Email</label>
                <input type="email" name="email" class="input-field" value="{{ old('email', $user->email) }}" required>
              </div>
            </div>
          </div>

          <div class="pt-4">
            <h2 class="text-base font-bold text-stone-800 mb-4 border-b border-stone-100 pb-2">Ubah Password</h2>
            <p class="text-xs text-stone-500 mb-4">Kosongkan kolom di bawah jika Anda tidak ingin mengganti password.</p>
            <div class="space-y-4">
              <div>
                <label class="label">Password Lama</label>
                <input type="password" name="current_password" class="input-field" autocomplete="current-password">
              </div>
              <div>
                <label class="label">Password Baru</label>
                <input type="password" name="new_password" class="input-field" autocomplete="new-password">
              </div>
              <div>
                <label class="label">Konfirmasi Password Baru</label>
                <input type="password" name="new_password_confirmation" class="input-field" autocomplete="new-password">
              </div>
            </div>
          </div>
        </div>

        <button type="submit" class="btn-primary w-full justify-center mt-8">Simpan Perubahan</button>
      </form>
    </div>
  </div>
</div>
@endsection
