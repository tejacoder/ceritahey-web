@extends('layouts.app')

@section('title', 'Kebijakan Privasi — CeritaHey')

@section('content')
<div class="section-container" style="padding-top:56px;padding-bottom:80px;">

  {{-- Header --}}
  <div class="animate-in text-center mb-14" style="max-width:600px;margin-left:auto;margin-right:auto;">
    <span class="badge badge-secondary mb-4" style="font-size:13px;">🔐 Legal</span>
    <h1 class="section-title mt-2">Kebijakan Privasi</h1>
    <p class="mt-4 text-stone-500 text-sm">
      Terakhir diperbarui: <strong>{{ date('d F Y') }}</strong>
    </p>
  </div>

  {{-- Content --}}
  <div class="animate-in animate-in-d1 card" style="max-width:760px;margin-left:auto;margin-right:auto;padding:40px 48px;">

    <div class="privacy-content">

      <p class="lead">
        Selamat datang di <strong>CeritaHey</strong>. Kebijakan Privasi ini menjelaskan bagaimana kami mengumpulkan,
        menggunakan, dan melindungi informasi pribadi Anda saat menggunakan layanan kami.
        Dengan menggunakan CeritaHey, Anda menyetujui praktik yang dijelaskan dalam kebijakan ini.
      </p>

      <h2>1. Informasi yang Kami Kumpulkan</h2>
      <p>Kami mengumpulkan informasi berikut saat Anda menggunakan CeritaHey:</p>
      <ul>
        <li><strong>Informasi Akun:</strong> Nama, alamat email, dan kata sandi (terenkripsi) saat Anda mendaftar.</li>
        <li><strong>Informasi Transaksi:</strong> Riwayat pesanan, metode pembayaran yang digunakan (kami tidak menyimpan nomor kartu), dan status pembayaran.</li>
        <li><strong>Informasi Teknis:</strong> Alamat IP, jenis browser, halaman yang dikunjungi, dan waktu kunjungan untuk keperluan analitik dan keamanan.</li>
      </ul>

      <h2>2. Cara Kami Menggunakan Informasi</h2>
      <p>Informasi yang kami kumpulkan digunakan untuk:</p>
      <ul>
        <li>Memproses dan mengonfirmasi pesanan Anda</li>
        <li>Mengirim notifikasi terkait pesanan dan akun</li>
        <li>Meningkatkan layanan dan pengalaman pengguna</li>
        <li>Mencegah penipuan dan menjaga keamanan platform</li>
        <li>Mematuhi kewajiban hukum yang berlaku</li>
      </ul>

      <h2>3. Pembayaran & Keamanan</h2>
      <p>
        Semua transaksi pembayaran diproses oleh <strong>Tripay</strong>, payment gateway terpercaya yang telah
        memiliki sertifikasi keamanan. Kami <strong>tidak menyimpan</strong> data kartu kredit, debit, atau
        informasi keuangan sensitif lainnya di server kami.
      </p>
      <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:12px;padding:16px 20px;margin:16px 0;">
        <p style="margin:0;color:#065f46;font-size:14px;">
          🔒 <strong>Aman:</strong> Koneksi kami dilindungi dengan enkripsi SSL/TLS. Data pembayaran tidak pernah melewati atau disimpan di server CeritaHey.
        </p>
      </div>

      <h2>4. Berbagi Informasi dengan Pihak Ketiga</h2>
      <p>Kami <strong>tidak menjual</strong> data pribadi Anda kepada siapapun. Kami hanya berbagi data dengan:</p>
      <ul>
        <li><strong>Tripay</strong> — untuk memproses pembayaran</li>
        <li><strong>Pihak berwenang</strong> — jika diwajibkan oleh hukum yang berlaku</li>
      </ul>

      <h2>5. Penyimpanan Data</h2>
      <p>
        Data akun Anda disimpan selama akun aktif atau selama diperlukan untuk keperluan layanan.
        Anda dapat meminta penghapusan akun dengan menghubungi kami. Beberapa data transaksi mungkin
        tetap disimpan untuk keperluan pelaporan keuangan sesuai ketentuan hukum.
      </p>

      <h2>6. Hak Anda</h2>
      <p>Sebagai pengguna, Anda berhak untuk:</p>
      <ul>
        <li>Mengakses informasi pribadi yang kami miliki tentang Anda</li>
        <li>Meminta koreksi data yang tidak akurat</li>
        <li>Meminta penghapusan akun dan data pribadi Anda</li>
        <li>Menarik persetujuan penggunaan data kapan saja</li>
      </ul>
      <p>Untuk menggunakan hak-hak ini, hubungi kami di <a href="mailto:aksendigitalkreatif@gmail.com">aksendigitalkreatif@gmail.com</a>.</p>

      <h2>7. Cookie</h2>
      <p>
        Kami menggunakan cookie sesi untuk menjaga keamanan login Anda. Kami tidak menggunakan cookie
        iklan atau pelacakan pihak ketiga. Anda dapat menonaktifkan cookie di pengaturan browser,
        namun beberapa fitur mungkin tidak berfungsi dengan baik.
      </p>

      <h2>8. Perubahan Kebijakan</h2>
      <p>
        Kami dapat memperbarui Kebijakan Privasi ini dari waktu ke waktu. Perubahan signifikan akan
        kami beritahukan melalui email atau notifikasi di platform. Penggunaan layanan setelah
        perubahan dianggap sebagai persetujuan terhadap kebijakan yang diperbarui.
      </p>

      <h2>9. Hubungi Kami</h2>
      <p>
        Jika Anda memiliki pertanyaan atau kekhawatiran tentang Kebijakan Privasi ini, silakan
        hubungi kami:
      </p>
      <div style="background:#fffbeb;border:1px solid #fde68a;border-radius:12px;padding:20px 24px;margin-top:12px;">
        <p style="margin:0 0 6px;font-weight:700;color:#92400e;">📬 CeritaHey</p>
        <p style="margin:0;color:#78350f;font-size:14px;">
          Email: <a href="mailto:aksendigitalkreatif@gmail.com" style="color:#b45309;">aksendigitalkreatif@gmail.com</a><br>
          Jam operasional: Senin–Jumat, 09.00–17.00 WIB
        </p>
      </div>

    </div>

  </div>

  {{-- Back links --}}
  <div class="animate-in animate-in-d2 flex items-center justify-center gap-6" style="padding-top: 20px;">
    <a href="{{ route('home') }}" class="btn-outline" style="padding:10px 20px;font-size:14px;">← Kembali ke Beranda</a>
    <a href="{{ route('faq') }}" class="btn-outline" style="padding:10px 20px;font-size:14px;">❓ Lihat FAQ</a>
  </div>

</div>

<style>
  .privacy-content { color: #44403c; line-height: 1.8; font-size: 15px; }
  .privacy-content .lead { font-size: 16px; color: #57534e; margin-bottom: 28px; line-height: 1.75; }
  .privacy-content h2 {
    font-family: 'Fredoka', sans-serif;
    font-size: 20px;
    font-weight: 700;
    color: #1c1917;
    margin: 32px 0 12px;
    padding-bottom: 8px;
    border-bottom: 2px solid #fef3c7;
  }
  .privacy-content p { margin-bottom: 14px; }
  .privacy-content ul { margin: 0 0 14px 0; padding-left: 24px; }
  .privacy-content ul li { margin-bottom: 8px; }
  .privacy-content a { color: #d97706; font-weight: 600; }
  .privacy-content a:hover { text-decoration: underline; }

  @media (max-width: 640px) {
    .privacy-content { font-size: 14px; }
    .card { padding: 24px 20px !important; }
  }
</style>
@endsection
