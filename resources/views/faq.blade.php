@extends('layouts.app')

@section('title', 'FAQ — Pertanyaan yang Sering Ditanyakan')

@section('content')
<div class="section-container" style="padding-top:56px;padding-bottom:80px;">

  {{-- Header --}}
  <div class="animate-in text-center mb-14" style="max-width:600px;margin-left:auto;margin-right:auto;">
    <span class="badge badge-warning mb-4" style="font-size:13px;"><i class="fa-solid fa-circle-question mr-1"></i> FAQ</span>
    <h1 class="section-title mt-2">Pertanyaan yang Sering<br>Ditanyakan</h1>
    <p class="mt-4 text-stone-500 text-base leading-relaxed">
      Tidak menemukan jawabannya? Hubungi kami di
      <a href="mailto:aksendigitalkreatif@gmail.com" class="text-amber-600 font-bold hover:underline">aksendigitalkreatif@gmail.com</a>
    </p>
  </div>

  {{-- FAQ Items --}}
  <div style="max-width:720px;margin-left:auto;margin-right:auto;margin-top: 20px;" class="animate-in animate-in-d1">
    @php
    $faqs = [
      [
        'icon' => 'fa-solid fa-book-open',
        'q' => 'Apa itu CeritaHey?',
        'a' => 'CeritaHey adalah platform buku cerita digital bergambar full color untuk anak Indonesia. Kami menyediakan koleksi cerita yang menyenangkan, edukatif, dan terjangkau, mulai dari Rp2.000 per buku.',
      ],
      [
        'icon' => 'fa-solid fa-credit-card',
        'q' => 'Metode pembayaran apa saja yang tersedia?',
        'a' => 'Kami menerima berbagai metode pembayaran melalui Tripay, antara lain: QRIS (ShopeePay, GoPay, dll.), Virtual Account BRI, BNI, BCA, serta OVO. Semua transaksi aman dan terenkripsi.',
      ],
      [
        'icon' => 'fa-solid fa-circle-arrow-down',
        'q' => 'Bagaimana cara mengunduh buku setelah membeli?',
        'a' => 'Setelah pembayaran berhasil dikonfirmasi, kamu bisa langsung mengunduh buku di halaman "Pesanan Saya". File akan tersedia dalam format PDF yang bisa dibaca di perangkat apapun.',
      ],
      [
        'icon' => 'fa-solid fa-clock-rotate-left',
        'q' => 'Berapa lama proses konfirmasi pembayaran?',
        'a' => 'Pembayaran melalui QRIS dan Virtual Account biasanya dikonfirmasi secara otomatis dalam hitungan detik hingga beberapa menit. Jika lebih dari 10 menit belum terkonfirmasi, silakan hubungi kami.',
      ],
      [
        'icon' => 'fa-solid fa-rotate',
        'q' => 'Apakah buku bisa diunduh ulang?',
        'a' => 'Ya! Selama akun kamu masih aktif, kamu bisa mengunduh kembali buku yang sudah dibeli kapan saja melalui halaman "Pesanan Saya". Tidak ada batas unduhan.',
      ],
      [
        'icon' => 'fa-solid fa-baby',
        'q' => 'Untuk usia berapa buku-buku di CeritaHey?',
        'a' => 'Koleksi kami dirancang untuk anak-anak usia 3–12 tahun. Setiap buku memiliki keterangan usia yang direkomendasikan pada halaman deskripsi produk.',
      ],
      [
        'icon' => 'fa-solid fa-shield-halved',
        'q' => 'Apakah data saya aman?',
        'a' => 'Keamanan data pengguna adalah prioritas kami. Kami tidak menyimpan data kartu kredit/debit kamu. Semua pembayaran diproses oleh Tripay yang telah bersertifikat keamanan. Baca selengkapnya di Kebijakan Privasi kami.',
      ],
      [
        'icon' => 'fa-solid fa-hand-holding-dollar',
        'q' => 'Apakah ada refund?',
        'a' => 'Karena buku kami merupakan produk digital yang bisa langsung diakses setelah pembelian, kami tidak menyediakan refund kecuali terdapat kesalahan teknis dari pihak kami. Hubungi kami jika ada masalah.',
      ],
      [
        'icon' => 'fa-solid fa-print',
        'q' => 'Apakah buku bisa dicetak?',
        'a' => 'Buku yang dibeli hanya untuk penggunaan pribadi dan tidak boleh dicetak secara komersial. Namun kamu boleh mencetaknya untuk keperluan pribadi atau rumah.',
      ],
      [
        'icon' => 'fa-solid fa-mobile-screen-button',
        'q' => 'Di perangkat apa saja buku bisa dibaca?',
        'a' => 'Buku dalam format PDF bisa dibaca di smartphone (Android/iOS), tablet, laptop, maupun komputer. Kami merekomendasikan penggunaan aplikasi PDF reader seperti Adobe Acrobat atau Foxit Reader untuk pengalaman membaca terbaik.',
      ],
    ];
    @endphp

    <div id="faq-accordion" style="display:flex;flex-direction:column;gap:12px;">
      @foreach($faqs as $i => $faq)
      <div class="card" style="border-radius:16px;overflow:hidden;">
        <button
          onclick="toggleFaq({{ $i }})"
          id="faq-btn-{{ $i }}"
          aria-expanded="false"
          aria-controls="faq-panel-{{ $i }}"
          style="width:100%;text-align:left;padding:20px 24px;display:flex;align-items:center;justify-content:space-between;gap:16px;background:transparent;border:none;cursor:pointer;font-family:inherit;"
          class="focus-ring"
        >
          <span style="font-size:15px;font-weight:700;color:#1c1917;line-height:1.4;"><i class="{{ $faq['icon'] }} text-amber-500 mr-2 fa-fw"></i>{{ $faq['q'] }}</span>
          <svg id="faq-icon-{{ $i }}" style="flex-shrink:0;transition:transform .3s ease;color:#d97706;" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 9l6 6 6-6"/>
          </svg>
        </button>
        <div
          id="faq-panel-{{ $i }}"
          role="region"
          aria-labelledby="faq-btn-{{ $i }}"
          style="max-height:0;overflow:hidden;transition:max-height .35s ease, padding .3s ease;"
        >
          <p style="padding:0 24px 20px;font-size:15px;color:#57534e;line-height:1.7;">{{ $faq['a'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>

  {{-- Still have questions CTA --}}
  <div class="animate-in animate-in-d2" style="max-width:560px;margin-left:auto;margin-right:auto;margin-top:64px;">
    <div class="bento-card text-center" style="padding:40px 32px;background:linear-gradient(135deg,#fffbeb,#fff7ed);">
      <div style="font-size:40px;margin-bottom:12px;color:#d97706;"><i class="fa-regular fa-comment-dots"></i></div>
      <h2 class="font-heading text-xl font-bold text-stone-900 mb-2">Masih ada pertanyaan?</h2>
      <p class="text-stone-500 text-sm mb-6">Tim kami siap membantu kamu setiap hari kerja.</p>
      <a href="mailto:aksendigitalkreatif@gmail.com" class="btn-cta" style="padding:12px 28px;font-size:15px;">
        <i class="fa-solid fa-envelope"></i> Hubungi Kami
      </a>
    </div>
  </div>

</div>

@push('scripts')
<script>
  function toggleFaq(index) {
    const panel = document.getElementById('faq-panel-' + index);
    const btn   = document.getElementById('faq-btn-' + index);
    const icon  = document.getElementById('faq-icon-' + index);
    const isOpen = btn.getAttribute('aria-expanded') === 'true';

    // Close all
    document.querySelectorAll('[id^="faq-panel-"]').forEach((p, i) => {
      p.style.maxHeight = '0';
      document.getElementById('faq-btn-' + i).setAttribute('aria-expanded', 'false');
      document.getElementById('faq-icon-' + i).style.transform = 'rotate(0deg)';
    });

    // Toggle clicked
    if (!isOpen) {
      panel.style.maxHeight = panel.scrollHeight + 40 + 'px';
      btn.setAttribute('aria-expanded', 'true');
      icon.style.transform = 'rotate(180deg)';
    }
  }

  // Open first by default
  toggleFaq(0);
</script>
@endpush
@endsection
