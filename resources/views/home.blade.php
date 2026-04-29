@extends('layouts.app')

@section('title', 'SISFARM - Sistem Informasi Surya Farm')

@section('styles')
<style>

    /* ============ HERO ============ */
    .hero {
        padding: 80px 0 100px;
        position: relative;
        overflow: hidden;
    }

    /* Dekorasi lingkaran hijau di background */
    .hero::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(82, 183, 136, 0.12) 0%, transparent 70%);
        pointer-events: none;
    }

    .hero-inner {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }

    /* Badge kecil di atas judul */
    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--hijau-pale);
        border: 1px solid rgba(45, 106, 79, 0.2);
        border-radius: 20px;
        padding: 5px 14px;
        font-size: 12px;
        font-weight: 600;
        color: var(--hijau);
        margin-bottom: 20px;
    }

    .hero-judul {
        font-size: clamp(36px, 5vw, 54px);
        color: var(--teks-gelap);
        margin-bottom: 18px;
        line-height: 1.15;
    }

    .hero-judul span {
        color: var(--hijau);
    }

    .hero-desc {
        font-size: 15px;
        color: var(--teks-abu);
        line-height: 1.8;
        margin-bottom: 36px;
        max-width: 480px;
    }

    .hero-tombol {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    /* ---- Visual hero (ilustrasi kartu) ---- */
    .hero-visual {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .hero-card-utama {
        background: var(--putih);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 28px;
        width: 300px;
        box-shadow: 0 20px 60px rgba(45, 106, 79, 0.15);
        position: relative;
        z-index: 2;
    }

    .hero-card-judul {
        font-size: 13px;
        font-weight: 600;
        color: var(--teks-abu);
        margin-bottom: 16px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .stat-baris {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid var(--border);
    }

    .stat-baris:last-child {
        border-bottom: none;
    }

    .stat-nama {
        font-size: 13px;
        color: var(--teks-abu);
    }

    .stat-nilai {
        font-size: 14px;
        font-weight: 700;
        color: var(--hijau);
    }

    /* Kartu kecil yang melayang */
    .hero-card-kecil {
        position: absolute;
        background: var(--putih);
        border: 1px solid var(--border);
        border-radius: var(--radius-kecil);
        padding: 12px 16px;
        display: flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.08);
        white-space: nowrap;
    }

    .hero-card-kecil.posisi-atas {
        top: -20px;
        right: -30px;
        animation: mengambang 3s ease-in-out infinite;
    }

    .hero-card-kecil.posisi-bawah {
        bottom: -20px;
        left: -40px;
        animation: mengambang 3s ease-in-out infinite;
        animation-delay: 1.5s;
    }

    @keyframes mengambang {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-8px); }
    }

    .card-kecil-ikon {
        width: 32px;
        height: 32px;
        background: var(--hijau-pale);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--hijau);
        font-size: 15px;
    }

    .card-kecil-angka {
        font-family: var(--font-judul);
        font-size: 18px;
        font-weight: 700;
        color: var(--teks-gelap);
        line-height: 1;
    }

    .card-kecil-label {
        font-size: 11px;
        color: var(--teks-abu);
    }

    /* ============ STATISTIK ============
    .seksi-statistik {
        background: var(--hijau-tua);
        padding: 60px 0;
    } */

    .statistik-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1px;
        background: rgba(255,255,255,0.1);
        border-radius: var(--radius);
        overflow: hidden;
    }

    .stat-item {
        background: var(--hijau-tua);
        padding: 32px 20px;
        text-align: center;
    }

    .stat-angka {
        font-family: var(--font-judul);
        font-size: 42px;
        font-weight: 700;
        color: var(--hijau-muda);
        line-height: 1;
        margin-bottom: 8px;
    }

    .stat-keterangan {
        font-size: 13px;
        color: #9dbfa3;
    }

    /* ============ TENTANG ============ */
    .seksi-tentang {
        padding: 80px 0;
    }

    .tentang-inner {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }

    .eyebrow {
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: var(--hijau);
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .eyebrow::before {
        content: '';
        width: 24px;
        height: 2px;
        background: var(--hijau);
        border-radius: 2px;
    }

    .seksi-judul {
        font-size: clamp(28px, 4vw, 38px);
        color: var(--teks-gelap);
        margin-bottom: 16px;
    }

    .seksi-desc {
        font-size: 14px;
        color: var(--teks-abu);
        line-height: 1.8;
        margin-bottom: 24px;
    }

    /* Daftar keunggulan */
    .checklist {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .checklist-item {
        display: flex;
        align-items: flex-start;
        gap: 10px;
        font-size: 14px;
        color: var(--teks-abu);
    }

    .checklist-item i {
        color: var(--hijau);
        margin-top: 2px;
        flex-shrink: 0;
    }

    /* Gambar ilustrasi pertanian */
    .tentang-visual {
        background: linear-gradient(145deg, #2d6a4f, #1a3c2b);
        border-radius: var(--radius-besar);
        padding: 40px;
        position: relative;
        overflow: hidden;
        min-height: 380px;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
    }

    .tentang-visual::before {
        content: '';
        position: absolute;
        top: 20px;
        right: 20px;
        width: 180px;
        height: 180px;
        background: radial-gradient(circle, rgba(82,183,136,0.2) 0%, transparent 70%);
    }

    .tentang-ikon-besar {
        position: absolute;
        top: 30px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 80px;
        color: rgba(82,183,136,0.3);
    }

    .tentang-info-box {
        background: rgba(255,255,255,0.08);
        border: 1px solid rgba(255,255,255,0.12);
        border-radius: var(--radius-kecil);
        padding: 16px 20px;
        color: #e8f5e9;
        position: relative;
        z-index: 1;
    }

    .tentang-info-box h4 {
        font-family: var(--font-judul);
        font-size: 20px;
        margin-bottom: 6px;
    }

    .tentang-info-box p {
        font-size: 13px;
        color: #a5c8aa;
        line-height: 1.6;
    }

    /* ============ PRODUK ============ */
    .seksi-produk {
        padding: 80px 0;
        background: #f0f7f2;
    }

    .seksi-header {
        text-align: center;
        margin-bottom: 48px;
    }

    .produk-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .produk-card {
        background: var(--putih);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 28px 24px;
        transition: all 0.25s ease;
        position: relative;
        overflow: hidden;
    }

    .produk-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--hijau);
        transform: scaleX(0);
        transition: transform 0.25s ease;
    }

    .produk-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 32px var(--shadow);
        border-color: rgba(45, 106, 79, 0.2);
    }

    .produk-card:hover::before {
        transform: scaleX(1);
    }

    .produk-ikon {
        width: 54px;
        height: 54px;
        background: var(--hijau-pale);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        color: var(--hijau);
        margin-bottom: 16px;
    }

    .produk-nama {
        font-size: 17px;
        color: var(--teks-gelap);
        margin-bottom: 8px;
    }

    .produk-desc {
        font-size: 13px;
        color: var(--teks-abu);
        line-height: 1.7;
        font-family: var(--font-body);
    }

    /* ============ FITUR ============ */
    .seksi-fitur {
        padding: 80px 0;
    }

    .fitur-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }

    .fitur-item {
        background: var(--putih);
        border: 1px solid var(--border);
        border-radius: var(--radius);
        padding: 24px;
        display: flex;
        gap: 16px;
        align-items: flex-start;
        transition: border-color 0.2s;
    }

    .fitur-item:hover {
        border-color: var(--hijau-muda);
    }

    .fitur-ikon {
        width: 44px;
        height: 44px;
        background: var(--hijau-pale);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--hijau);
        font-size: 18px;
        flex-shrink: 0;
    }

    .fitur-judul {
        font-size: 16px;
        color: var(--teks-gelap);
        margin-bottom: 6px;
    }

    .fitur-desc {
        font-size: 13px;
        color: var(--teks-abu);
        line-height: 1.7;
        font-family: var(--font-body);
    }

    /* ============ KONTAK / CTA ============ */
    .seksi-kontak {
        padding: 80px 0;
        background: #f0f7f2;
    }

    .kontak-box {
        background: var(--hijau-tua);
        border-radius: var(--radius-besar);
        padding: 60px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .kontak-box::before {
        content: '';
        position: absolute;
        top: -80px;
        left: 50%;
        transform: translateX(-50%);
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(82,183,136,0.15) 0%, transparent 65%);
        pointer-events: none;
    }

    .kontak-judul {
        font-size: clamp(28px, 4vw, 40px);
        color: #e8f5e9;
        margin-bottom: 12px;
        position: relative;
    }

    .kontak-judul span {
        color: var(--hijau-muda);
    }

    .kontak-desc {
        font-size: 15px;
        color: #9dbfa3;
        margin-bottom: 32px;
        position: relative;
    }

    .kontak-tombol {
        display: flex;
        gap: 12px;
        justify-content: center;
        flex-wrap: wrap;
        position: relative;
    }

    /* ============ RESPONSIVE ============ */
    @media (max-width: 900px) {
        .hero-inner { grid-template-columns: 1fr; }
        .hero-visual { display: none; }
        .tentang-inner { grid-template-columns: 1fr; }
        .produk-grid { grid-template-columns: 1fr 1fr; }
        .statistik-grid { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 640px) {
        .produk-grid { grid-template-columns: 1fr; }
        .fitur-grid { grid-template-columns: 1fr; }
        .statistik-grid { grid-template-columns: 1fr 1fr; }
        .kontak-box { padding: 40px 24px; }
    }
</style>
@endsection

@section('content')

{{-- ============ HERO ============ --}}
<section class="hero">
    <div class="container">
        <div class="hero-inner">

            {{-- Teks kiri --}}
            <div class="fade-up">
                <div class="hero-badge">
                    <i class="bi bi-leaf-fill"></i>
                    Sistem Informasi Pertanian Digital
                </div>
                <h1 class="hero-judul">
                    Kelola Pertanian Lebih <span>Cerdas</span> & Efisien
                </h1>
                <p class="hero-desc">
                    SISFARM hadir untuk membantu Surya Farm dalam pencatatan stok, hasil panen, distribusi, dan pemasaran produk secara digital. Semua dalam satu sistem yang mudah digunakan.
                </p>
                <div class="hero-tombol">
                    <a href="/login" class="btn btn-hijau">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Masuk ke SISFARM
                    </a>
                    <a href="/#tentang" class="btn btn-outline">
                        <i class="bi bi-info-circle"></i>
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>

            {{-- Visual kanan --}}
            <div class="hero-visual fade-up delay-2">
                <img src="/images/semangka.png" alt="Semangka Surya Farm" style="width: 100%; height: auto; object-fit: cover; border-radius: var(--radius-besar);">
            </img>

        </div>
    </div>
</section>

{{-- ============ STATISTIK ============ --}}
<section class="seksi-statistik">
    <div class="container">
        <div class="statistik-grid fade-up">
           {{-- <div class="stat-item">
                <div class="stat-angka">12+</div>
                <div class="stat-keterangan">Tahun Pengalaman</div>
            </div>
            <div class="stat-item">
                <div class="stat-angka">500+</div>
                <div class="stat-keterangan">Pelanggan Tetap</div>
            </div>
            <div class="stat-item">
                <div class="stat-angka">50+</div>
                <div class="stat-keterangan">Jenis Produk</div>
            </div>
            <div class="stat-item">
                <div class="stat-angka">20+</div>
                <div class="stat-keterangan">Kota Terjangkau</div>
            --}}</div>
        </div>
    </div>
</section>

{{-- ============ TENTANG ============
<section class="seksi-tentang" id="tentang">
    <div class="container">
        <div class="tentang-inner">

            <div class="tentang-visual fade-up">
                <i class="bi bi-tree-fill tentang-ikon-besar"></i>
                <div class="tentang-info-box">
                    <h4>Surya Farm</h4>
                    <p>
                        Usaha pertanian yang berdiri sejak 2012, bergerak di bidang produksi dan distribusi hasil panen berkualitas tinggi untuk memenuhi kebutuhan pasar lokal maupun regional.
                    </p>
                </div>
            </div>


            <div class="fade-up delay-1">
                <p class="eyebrow">Tentang Kami</p>
                <h2 class="seksi-judul">Mengapa SISFARM Dibutuhkan?</h2>
                <p class="seksi-desc">
                    Selama ini pencatatan stok dan hasil panen masih dilakukan secara manual menggunakan buku catatan dan spreadsheet. Cara ini sering menyebabkan kesalahan data, keterlambatan laporan, dan sulitnya monitoring secara real-time.
                </p>
                <p class="seksi-desc">
                    SISFARM hadir sebagai solusi digitalisasi yang memudahkan seluruh proses operasional Surya Farm, mulai dari pencatatan harian hingga laporan distribusi dan pemasaran.
                </p>
                <div class="checklist">
                    <div class="checklist-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Pencatatan stok dan panen otomatis & akurat</span>
                    </div>
                    <div class="checklist-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Dashboard monitoring real-time untuk pengambilan keputusan</span>
                    </div>
                    <div class="checklist-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Manajemen distribusi dan pelacakan pengiriman</span>
                    </div>
                    <div class="checklist-item">
                        <i class="bi bi-check-circle-fill"></i>
                        <span>Platform pemasaran digital yang memperluas jangkauan pasar</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>--}}

{{-- ============ FITUR SISFARM ============
<section class="seksi-fitur">
    <div class="container">
        <div class="seksi-header fade-up">
            <p class="eyebrow" style="justify-content: center;">Fitur Sistem</p>
            <h2 class="seksi-judul">Apa yang Bisa SISFARM Lakukan?</h2>
            <p style="font-size: 14px; color: var(--teks-abu); margin-top: 8px;">
                Fitur lengkap untuk mendukung operasional pertanian modern.
            </p>
        </div>

        <div class="fitur-grid fade-up delay-1">

            <div class="fitur-item">
                <div class="fitur-ikon">
                    <i class="bi bi-box-seam"></i>
                </div>
                <div>
                    <h3 class="fitur-judul">Manajemen Stok</h3>
                    <p class="fitur-desc">Catat dan pantau stok produk secara real-time. Notifikasi otomatis ketika stok hampir habis.</p>
                </div>
            </div>

            <div class="fitur-item">
                <div class="fitur-ikon">
                    <i class="bi bi-calendar2-check"></i>
                </div>
                <div>
                    <h3 class="fitur-judul">Pencatatan Panen</h3>
                    <p class="fitur-desc">Input hasil panen harian dengan mudah. Data tersimpan otomatis dan bisa dilihat kapan saja.</p>
                </div>
            </div>

            <div class="fitur-item">
                <div class="fitur-ikon">
                    <i class="bi bi-truck"></i>
                </div>
                <div>
                    <h3 class="fitur-judul">Manajemen Distribusi</h3>
                    <p class="fitur-desc">Kelola pengiriman produk ke berbagai daerah. Lacak status pengiriman secara langsung.</p>
                </div>
            </div>

            <div class="fitur-item">
                <div class="fitur-ikon">
                    <i class="bi bi-graph-up"></i>
                </div>
                <div>
                    <h3 class="fitur-judul">Laporan & Analitik</h3>
                    <p class="fitur-desc">Lihat grafik perkembangan panen, distribusi, dan pendapatan dalam bentuk laporan yang mudah dipahami.</p>
                </div>
            </div>

            <div class="fitur-item">
                <div class="fitur-ikon">
                    <i class="bi bi-megaphone"></i>
                </div>
                <div>
                    <h3 class="fitur-judul">Pemasaran Digital</h3>
                    <p class="fitur-desc">Tampilkan profil usaha dan produk secara online agar pelanggan baru bisa menemukan Surya Farm.</p>
                </div>
            </div>

            <div class="fitur-item">
                <div class="fitur-ikon">
                    <i class="bi bi-shield-check"></i>
                </div>
                <div>
                    <h3 class="fitur-judul">Keamanan Data</h3>
                    <p class="fitur-desc">Data tersimpan aman dengan sistem login dan hak akses berbeda untuk setiap pengguna.</p>
                </div>
            </div>

        </div>
    </div>
</section>--}}

@endsection
