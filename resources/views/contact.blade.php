@extends('layouts.app')

@section('title', 'Kontak Support — CeritaHey')

@section('content')
<div class="section-container" style="padding-top:56px;padding-bottom:80px;">

  {{-- Header --}}
  <div class="animate-in text-center mb-14" style="max-width:600px;margin-left:auto;margin-right:auto;">
    <span class="badge badge-warning mb-4" style="font-size:13px;">📞 Kontak Support</span>
    <h1 class="section-title mt-2">Hubungi Kami</h1>
    <p class="mt-4 text-stone-500 text-base leading-relaxed">
      Ada kendala pembayaran, unduhan file, atau punya pertanyaan lain? Tim support kami siap membantumu.
    </p>
  </div>

  {{-- Content --}}
  <div class="animate-in animate-in-d1 grid" style="max-width:960px;margin-left:auto;margin-right:auto;grid-template-columns: 1fr; gap: 32px; display: grid;" class="contact-grid">
    
    {{-- Card 1: Hubungi Langsung --}}
    <div class="card" style="padding:40px 48px;">
      <h2 class="font-heading text-2xl font-bold text-stone-900 mb-6">Hubungi Kami Langsung</h2>
      
      <div style="display:flex;flex-direction:column;gap:24px;">
        <div style="display:flex;align-items:flex-start;gap:16px;">
          <div style="font-size:32px;background:#fef3c7;width:56px;height:56px;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            📧
          </div>
          <div>
            <h3 style="font-size:16px;font-weight:700;color:#1c1917;margin:0 0 4px;">Email Support</h3>
            <p style="margin:0 0 8px;font-size:14px;color:#57534e;">Kirimkan detail kendala atau pertanyaanmu ke email kami.</p>
            <a href="mailto:aksendigitalkreatif@gmail.com" style="font-size:16px;font-weight:700;color:#d97706;text-decoration:none;" class="hover:underline">
              aksendigitalkreatif@gmail.com
            </a>
          </div>
        </div>

        <div style="display:flex;align-items:flex-start;gap:16px;">
          <div style="font-size:32px;background:#fef3c7;width:56px;height:56px;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            ⏰
          </div>
          <div>
            <h3 style="font-size:16px;font-weight:700;color:#1c1917;margin:0 0 4px;">Jam Operasional</h3>
            <p style="margin:0;font-size:15px;color:#44403c;line-height:1.6;">
              Senin – Jumat: 09.00 – 17.00 WIB<br>
              Sabtu, Minggu & Hari Libur Nasional: Tutup
            </p>
          </div>
        </div>

        <div style="display:flex;align-items:flex-start;gap:16px;">
          <div style="font-size:32px;background:#fef3c7;width:56px;height:56px;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
            🏢
          </div>
          <div>
            <h3 style="font-size:16px;font-weight:700;color:#1c1917;margin:0 0 4px;">Badan Usaha / Pengelola</h3>
            <p style="margin:0;font-size:15px;color:#44403c;line-height:1.6;">
              <strong>Aksen Digital Kreatif</strong><br>
              Indonesia
            </p>
          </div>
        </div>
      </div>
    </div>

    {{-- Card 2: FAQ CTA --}}
    <div class="bento-card text-center" style="padding:48px;background:linear-gradient(135deg,#fffbeb,#fff7ed);display:flex;flex-direction:column;justify-content:center;align-items:center;">
      <div style="font-size:48px;margin-bottom:16px;">❓</div>
      <h2 class="font-heading text-2xl font-bold text-stone-900 mb-3">Punya Pertanyaan Lain?</h2>
      <p class="text-stone-500 text-sm mb-6" style="max-width:320px;margin-left:auto;margin-right:auto;line-height:1.6;">
        Sebelum menghubungi kami, kamu mungkin bisa menemukan jawaban instan di halaman FAQ kami.
      </p>
      <a href="{{ route('faq') }}" class="btn-cta" style="padding:14px 32px;font-size:15px;">
        🔍 Baca Halaman FAQ
      </a>
    </div>

  </div>

</div>

<style>
  @media (min-width: 768px) {
    .contact-grid {
      grid-template-columns: 1.2fr 1fr !important;
    }
  }
</style>
@endsection
