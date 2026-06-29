@extends('layouts.app')

@section('title', 'Tentang Kami — CeritaHey')

@section('content')
<div class="section-container" style="padding-top:56px;padding-bottom:80px;">

  {{-- Header --}}
  <div class="animate-in text-center mb-14" style="max-width:600px;margin-left:auto;margin-right:auto;">
    <span class="badge badge-warning mb-4" style="font-size:13px;">📚 Tentang Kami</span>
    <h1 class="section-title mt-2">Mengenal CeritaHey</h1>
    <p class="mt-4 text-stone-500 text-base leading-relaxed">
      Platform buku cerita digital bergambar full color untuk anak Indonesia yang terjangkau, menyenangkan, dan edukatif.
    </p>
  </div>

  {{-- Content --}}
  <div class="animate-in animate-in-d1 card" style="max-width:760px;margin-left:auto;margin-right:auto;padding:40px 48px;">
    <div class="about-content">
      <h2>Siapa Kami?</h2>
      <p>
        <strong>CeritaHey</strong> didirikan dengan satu tujuan sederhana namun besar: menumbuhkan minat baca pada anak-anak Indonesia sejak usia dini. Kami menyadari bahwa akses terhadap buku cerita berkualitas dan memiliki ilustrasi yang menarik seringkali terkendala oleh harga yang mahal atau distribusi fisik yang terbatas.
      </p>
      <p>
        Oleh karena itu, di bawah naungan <strong>Aksen Digital Kreatif</strong>, kami menghadirkan solusi berupa buku cerita anak dalam format digital (PDF) berkualitas tinggi yang bisa diakses kapan saja dan di mana saja dengan harga yang sangat terjangkau, mulai dari <strong>Rp2.000 saja per buku</strong>.
      </p>

      <h2>Visi & Misi Kami</h2>
      <ul>
        <li><strong>Visi:</strong> Menjadi platform penyedia buku cerita digital anak nomor satu di Indonesia yang mendidik, mudah diakses, dan dicintai oleh anak-anak serta dipercaya oleh orang tua.</li>
        <li><strong>Misi:</strong>
          <ul>
            <li>Menyediakan konten bacaan anak yang edukatif, aman, dan sarat akan pesan moral positif.</li>
            <li>Menghadirkan ilustrasi visual yang cerah, penuh warna, dan menarik bagi anak-anak untuk meningkatkan imajinasi mereka.</li>
            <li>Menawarkan harga yang sangat terjangkau agar seluruh anak dari berbagai kalangan di Indonesia dapat menikmati buku cerita berkualitas.</li>
            <li>Mempermudah akses membaca melalui platform digital yang praktis dan instan.</li>
          </ul>
        </li>
      </ul>

      <h2>Mengapa Memilih CeritaHey?</h2>
      <p>
        Membaca buku cerita digital di CeritaHey memberikan banyak keuntungan untuk anak dan orang tua:
      </p>
      <ul>
        <li><strong>Harga Sangat Terjangkau:</strong> Dengan harga mulai dari Rp2.000, Anda sudah bisa memberikan bacaan berkualitas untuk si kecil tanpa membebani dompet.</li>
        <li><strong>Ilustrasi Penuh Warna:</strong> Setiap buku didesain dengan visual full-color yang indah untuk melatih kecerdasan visual anak.</li>
        <li><strong>Unduhan Instan & Selamanya:</strong> Setelah pembayaran sukses dikonfirmasi secara otomatis oleh sistem kami, buku langsung siap diunduh dalam format PDF dan dapat disimpan selamanya tanpa batasan unduhan.</li>
        <li><strong>Pembayaran Aman & Praktis:</strong> Kami bermitra dengan payment gateway resmi <strong>Tripay</strong> untuk memastikan seluruh proses transaksi Anda berlangsung aman, cepat, dan mudah melalui QRIS maupun Virtual Account.</li>
      </ul>

      <h2>Hubungi Kami</h2>
      <p>
        Kami sangat terbuka untuk mendengar saran, kritik, atau peluang kerja sama dari Anda. Jangan ragu untuk menghubungi tim support kami melalui email berikut:
      </p>
      
      <div style="background:#fffbeb;border:1px solid #fde68a;border-radius:12px;padding:20px 24px;margin-top:12px;">
        <p style="margin:0 0 6px;font-weight:700;color:#92400e;">📬 Aksen Digital Kreatif (CeritaHey)</p>
        <p style="margin:0;color:#78350f;font-size:14px;">
          Email: <a href="mailto:aksendigitalkreatif@gmail.com" style="color:#b45309;">aksendigitalkreatif@gmail.com</a><br>
          Jam operasional: Senin–Jumat, 09.00–17.00 WIB
        </p>
      </div>
    </div>
  </div>

  {{-- Navigation links --}}
  <div class="animate-in animate-in-d2 flex items-center justify-center gap-6" style="padding-top: 30px;">
    <a href="{{ route('home') }}" class="btn-outline" style="padding:10px 20px;font-size:14px;">← Ke Beranda</a>
    <a href="{{ route('faq') }}" class="btn-outline" style="padding:10px 20px;font-size:14px;">❓ Lihat FAQ</a>
  </div>

</div>

<style>
  .about-content { color: #44403c; line-height: 1.8; font-size: 15px; }
  .about-content h2 {
    font-family: 'Fredoka', sans-serif;
    font-size: 20px;
    font-weight: 700;
    color: #1c1917;
    margin: 32px 0 12px;
    padding-bottom: 8px;
    border-bottom: 2px solid #fef3c7;
  }
  .about-content p { margin-bottom: 14px; }
  .about-content ul { margin: 0 0 14px 0; padding-left: 24px; }
  .about-content ul li { margin-bottom: 8px; }
  .about-content a { color: #d97706; font-weight: 600; }
  .about-content a:hover { text-decoration: underline; }

  @media (max-width: 640px) {
    .about-content { font-size: 14px; }
    .card { padding: 24px 20px !important; }
  }
</style>
@endsection
