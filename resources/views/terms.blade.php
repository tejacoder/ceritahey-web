@extends('layouts.app')

@section('title', 'Syarat & Ketentuan — CeritaHey')

@section('content')
<div class="section-container" style="padding-top:56px;padding-bottom:80px;">

  {{-- Header --}}
  <div class="animate-in text-center mb-14" style="max-width:600px;margin-left:auto;margin-right:auto;">
    <span class="badge badge-secondary mb-4" style="font-size:13px;"><i class="fa-solid fa-scale-balanced mr-1"></i> Ketentuan</span>
    <h1 class="section-title mt-2">Syarat & Ketentuan</h1>
    <p class="mt-4 text-stone-500 text-sm">
      Harap baca syarat & ketentuan penggunaan layanan CeritaHey ini dengan seksama.
    </p>
  </div>

  {{-- Content --}}
  <div class="animate-in animate-in-d1 card" style="max-width:760px;margin-left:auto;margin-right:auto;padding:40px 48px;">
    <div class="terms-content">
      <p class="lead">
        Selamat datang di <strong>CeritaHey</strong>. Dengan mengakses dan menggunakan platform ini, Anda setuju untuk terikat dan mematuhi seluruh syarat dan ketentuan yang tercantum di bawah ini. Layanan ini dimiliki dan dikelola oleh <strong>Aksen Digital Kreatif</strong>.
      </p>

      <h2>1. Ketentuan Umum</h2>
      <p>
        CeritaHey menyediakan layanan berupa penjualan buku cerita digital bergambar anak dalam format dokumen elektronik (seperti PDF). Layanan ini ditujukan untuk penggunaan pribadi dan non-komersial bagi keluarga di Indonesia.
      </p>

      <h2>2. Akun Pengguna</h2>
      <ul>
        <li>Untuk melakukan pembelian, Anda diharuskan membuat akun dengan memberikan informasi yang valid, akurat, dan lengkap (seperti nama dan alamat email).</li>
        <li>Anda bertanggung jawab penuh atas keamanan dan kerahasiaan kredensial login akun Anda.</li>
        <li>Kami berhak menonaktifkan akun Anda jika ditemukan aktivitas mencurigakan atau pelanggaran ketentuan penggunaan ini.</li>
      </ul>

      <h2>3. Lisensi & Hak Cipta Produk</h2>
      <ul>
        <li>Setiap buku cerita digital yang Anda beli dari CeritaHey adalah karya berhak cipta yang dilindungi undang-undang hak cipta Republik Indonesia.</li>
        <li>Melalui pembelian ini, Anda mendapatkan <strong>lisensi non-eksklusif dan non-transferable untuk penggunaan pribadi (personal use)</strong>.</li>
        <li>Anda <strong>DILARANG KERAS</strong> mendistribusikan ulang, menyebarluaskan, menyewakan, membagikan gratis, mengunggah kembali ke platform lain, atau menjual kembali file digital yang telah dibeli tanpa izin tertulis dari <strong>Aksen Digital Kreatif</strong>.</li>
      </ul>

      <h2>4. Kebijakan Pembelian & Refund</h2>
      <ul>
        <li>Pembelian buku bersifat final dan pembayaran dilakukan di muka (prabayar).</li>
        <li>Karena produk yang kami jual adalah <strong>barang digital non-fisik</strong> yang langsung dapat diunduh dan disimpan setelah transaksi selesai, maka kami <strong>tidak melayani permintaan pengembalian dana (refund)</strong> atau pembatalan transaksi, kecuali jika terjadi kesalahan teknis dari pihak kami yang menyebabkan file tidak dapat diakses sama sekali.</li>
        <li>Harga yang tertera pada produk dapat berubah sewaktu-waktu tanpa pemberitahuan terlebih dahulu.</li>
      </ul>

      <h2>5. Pembayaran Gateway Pihak Ketiga</h2>
      <p>
        Semua transaksi pembayaran di CeritaHey diproses secara aman menggunakan layanan payment gateway resmi dari pihak ketiga, yaitu <strong>Tripay</strong>. Kami tidak mengumpulkan atau menyimpan data kredensial pembayaran Anda. Keamanan pembayaran diatur sepenuhnya oleh kebijakan dan standar industri keamanan Tripay.
      </p>

      <h2>6. Batasan Tanggung Jawab</h2>
      <p>
        CeritaHey dan <strong>Aksen Digital Kreatif</strong> tidak bertanggung jawab atas kerugian tidak langsung, incidental, atau konsekuensial yang diakibatkan oleh penggunaan atau ketidakmampuan menggunakan layanan kami, termasuk namun tidak terbatas pada masalah teknis perangkat pembaca Anda.
      </p>

      <h2>7. Perubahan Syarat & Ketentuan</h2>
      <p>
        Kami berhak mengubah atau memperbarui Syarat & Ketentuan ini sewaktu-waktu. Perubahan akan berlaku segera setelah dipublikasikan di halaman ini. Anda disarankan untuk memeriksa halaman ini secara berkala.
      </p>

      <h2>8. Hukum yang Berlaku</h2>
      <p>
        Syarat & Ketentuan ini diatur dan ditafsirkan sesuai dengan hukum Negara Republik Indonesia. Setiap perselisihan yang timbul akan diselesaikan secara musyawarah mufakat, atau jika tidak tercapai, melalui pengadilan negeri yang berwenang.
      </p>

      <h2>9. Kontak Support</h2>
      <p>
        Jika Anda memiliki pertanyaan mengenai Syarat & Ketentuan ini, silakan hubungi tim support kami di:
      </p>
      
      <div style="background:#fffbeb;border:1px solid #fde68a;border-radius:12px;padding:20px 24px;margin-top:12px;">
        <p style="margin:0 0 6px;font-weight:700;color:#92400e;"><i class="fa-solid fa-envelope-open-text text-amber-600 mr-1.5"></i> Customer Support CeritaHey</p>
        <p style="margin:0;color:#78350f;font-size:14px;">
          Email: <a href="mailto:aksendigitalkreatif@gmail.com" style="color:#b45309;">aksendigitalkreatif@gmail.com</a><br>
          Jam kerja: Senin–Jumat, 09.00–17.00 WIB
        </p>
      </div>
    </div>
  </div>

  {{-- Navigation links --}}
  <div class="animate-in animate-in-d2 flex items-center justify-center gap-6" style="padding-top: 30px;">
    <a href="{{ route('home') }}" class="btn-outline" style="padding:10px 20px;font-size:14px;">← Ke Beranda</a>
    <a href="{{ route('privacy') }}" class="btn-outline" style="padding:10px 20px;font-size:14px;"><i class="fa-solid fa-shield-halved mr-1"></i> Kebijakan Privasi</a>
  </div>

</div>

<style>
  .terms-content { color: #44403c; line-height: 1.8; font-size: 15px; }
  .terms-content .lead { font-size: 16px; color: #57534e; margin-bottom: 28px; line-height: 1.75; }
  .terms-content h2 {
    font-family: 'Fredoka', sans-serif;
    font-size: 20px;
    font-weight: 700;
    color: #1c1917;
    margin: 32px 0 12px;
    padding-bottom: 8px;
    border-bottom: 2px solid #fef3c7;
  }
  .terms-content p { margin-bottom: 14px; }
  .terms-content ul { margin: 0 0 14px 0; padding-left: 24px; }
  .terms-content ul li { margin-bottom: 8px; }
  .terms-content a { color: #d97706; font-weight: 600; }
  .terms-content a:hover { text-decoration: underline; }

  @media (max-width: 640px) {
    .terms-content { font-size: 14px; }
    .card { padding: 24px 20px !important; }
  }
</style>
@endsection
