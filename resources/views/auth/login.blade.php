@extends('layouts.app')

@section('title', 'Masuk - SISFARM')

@section('styles')
<style>
    /* Halaman login full height */
    .halaman-login {
        min-height: calc(100vh - 68px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 16px;
        background: linear-gradient(135deg, #f0f7f2 0%, #faf7f2 100%);
        position: relative;
    }

    /* Dekorasi background */
    .halaman-login::before {
        content: '';
        position: absolute;
        top: -100px;
        right: -100px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(82,183,136,0.1) 0%, transparent 70%);
        pointer-events: none;
    }

    /* Wrapper dua kolom */
    .login-wrapper {
        display: grid;
        grid-template-columns: 1fr 1fr;
        max-width: 880px;
        width: 100%;
        background: var(--putih);
        border: 1px solid var(--border);
        border-radius: var(--radius-besar);
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(45, 106, 79, 0.1);
        position: relative;
        z-index: 1;
    }

    /* Panel kiri - dekoratif */
    .login-panel-kiri {
        background: linear-gradient(145deg, #1a3c2b 0%, #2d6a4f 100%);
        padding: 48px 40px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        position: relative;
        overflow: hidden;
    }

    /* Pola background panel kiri */
    .login-panel-kiri::before {
        content: '';
        position: absolute;
        top: -60px;
        right: -60px;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(82,183,136,0.2) 0%, transparent 70%);
    }

    .login-panel-kiri::after {
        content: '';
        position: absolute;
        bottom: -60px;
        left: -60px;
        width: 250px;
        height: 250px;
        background: radial-gradient(circle, rgba(82,183,136,0.12) 0%, transparent 70%);
    }

    .panel-kiri-atas {
        position: relative;
        z-index: 1;
    }

    .panel-kiri-atas .logo-text {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 28px;
    }

    .panel-logo-ikon {
        width: 44px;
        height: 44px;
        background: var(--hijau-muda);
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 20px;
    }

    .panel-logo-nama {
        font-family: var(--font-judul);
        font-size: 22px;
        font-weight: 700;
        color: #e8f5e9;
    }

    .panel-logo-sub {
        font-size: 12px;
        color: #9dbfa3;
    }

    .panel-kiri-judul {
        font-size: 28px;
        color: #e8f5e9;
        margin-bottom: 10px;
    }

    .panel-kiri-desc {
        font-size: 13px;
        color: #9dbfa3;
        line-height: 1.7;
    }

    /* Fitur list di panel kiri */
    .panel-fitur-list {
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .panel-fitur-item {
        display: flex;
        align-items: center;
        gap: 12px;
        background: rgba(255,255,255,0.06);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: var(--radius-kecil);
        padding: 12px 14px;
    }

    .panel-fitur-ikon {
        width: 32px;
        height: 32px;
        background: rgba(82,183,136,0.2);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--hijau-muda);
        font-size: 14px;
        flex-shrink: 0;
    }

    .panel-fitur-teks {
        font-size: 13px;
        color: #c5d9c9;
    }

    /* Panel kanan - form */
    .login-panel-kanan {
        padding: 48px 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .form-judul {
        font-size: 26px;
        color: var(--teks-gelap);
        margin-bottom: 6px;
    }

    .form-sub {
        font-size: 13px;
        color: var(--teks-abu);
        margin-bottom: 30px;
    }

    /* Alert error */
    .alert-error {
        background: #fef2f2;
        border: 1px solid #fca5a5;
        border-radius: var(--radius-kecil);
        padding: 10px 14px;
        font-size: 13px;
        color: #dc2626;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Alert sukses */
    .alert-sukses {
        background: #f0fdf4;
        border: 1px solid #86efac;
        border-radius: var(--radius-kecil);
        padding: 10px 14px;
        font-size: 13px;
        color: #16a34a;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    /* Form group */
    .form-group {
        margin-bottom: 18px;
    }

    .form-label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: var(--teks-gelap);
        margin-bottom: 7px;
    }

    .input-wrapper {
        position: relative;
    }

    .input-ikon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--teks-abu);
        font-size: 15px;
        pointer-events: none;
    }

    .form-input {
        width: 100%;
        border: 1px solid var(--border);
        border-radius: var(--radius-kecil);
        padding: 11px 14px 11px 38px;
        font-family: var(--font-body);
        font-size: 14px;
        color: var(--teks-gelap);
        background: var(--krem);
        outline: none;
        transition: border-color 0.2s, box-shadow 0.2s;
    }

    .form-input:focus {
        border-color: var(--hijau);
        box-shadow: 0 0 0 3px rgba(45, 106, 79, 0.1);
        background: var(--putih);
    }

    .form-input::placeholder {
        color: #b0bdb3;
    }

    /* Jika ada error pada field */
    .form-input.is-invalid {
        border-color: #fca5a5;
    }

    .teks-error {
        font-size: 12px;
        color: #dc2626;
        margin-top: 5px;
    }

    /* Tombol submit */
    .btn-submit {
        width: 100%;
        justify-content: center;
        padding: 12px;
        font-size: 15px;
        margin-top: 6px;
    }

    /* Link daftar */
    .link-daftar {
        text-align: center;
        margin-top: 20px;
        font-size: 13px;
        color: var(--teks-abu);
    }

    .link-daftar a {
        color: var(--hijau);
        font-weight: 600;
    }

    .link-daftar a:hover {
        text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 680px) {
        .login-wrapper {
            grid-template-columns: 1fr;
        }

        .login-panel-kiri {
            display: none; /* Sembunyikan panel kiri di mobile */
        }

        .login-panel-kanan {
            padding: 32px 24px;
        }
    }
</style>
@endsection

@section('content')
<div class="halaman-login">
    <div class="login-wrapper fade-up">

        {{-- Panel Kiri --}}
        <div class="login-panel-kiri">
            <div class="panel-kiri-atas">
                <div class="logo-text">
                    <div class="panel-logo-ikon">
                        <i class="bi bi-flower1"></i>
                    </div>
                    <div>
                        <div class="panel-logo-nama">SISFARM</div>
                        <div class="panel-logo-sub">Surya Farm</div>
                    </div>
                </div>
                <h2 class="panel-kiri-judul">Selamat Datang Kembali!</h2>
                <p class="panel-kiri-desc">Masuk untuk mengakses sistem pengelolaan pertanian Surya Farm secara digital.</p>
            </div>

            <div class="panel-fitur-list">
                <div class="panel-fitur-item">
                    <div class="panel-fitur-ikon"><i class="bi bi-box-seam"></i></div>
                    <span class="panel-fitur-teks">Pantau stok & hasil panen real-time</span>
                </div>
                <div class="panel-fitur-item">
                    <div class="panel-fitur-ikon"><i class="bi bi-truck"></i></div>
                    <span class="panel-fitur-teks">Kelola distribusi dengan mudah</span>
                </div>
                <div class="panel-fitur-item">
                    <div class="panel-fitur-ikon"><i class="bi bi-graph-up"></i></div>
                    <span class="panel-fitur-teks">Laporan & analitik lengkap</span>
                </div>
            </div>
        </div>

        {{-- Panel Kanan (Form) --}}
        <div class="login-panel-kanan">
            <h2 class="form-judul">Masuk ke Akun</h2>
            <p class="form-sub">Masukkan email dan password untuk melanjutkan.</p>

            {{-- Tampilkan pesan error dari controller --}}
            @if($errors->any())
                <div class="alert-error">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    {{ $errors->first() }}
                </div>
            @endif

            {{-- Tampilkan pesan sukses (misal setelah register) --}}
            @if(session('sukses'))
                <div class="alert-sukses">
                    <i class="bi bi-check-circle-fill"></i>
                    {{ session('sukses') }}
                </div>
            @endif

            {{-- Form Login --}}
            <form action="/login" method="POST">
                @csrf

                {{-- Field Email --}}
                <div class="form-group">
                    <label class="form-label" for="email">Alamat Email</label>
                    <div class="input-wrapper">
                        <i class="bi bi-envelope input-ikon"></i>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input @error('email') is-invalid @enderror"
                            placeholder="Masukkan email kamu"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                        >
                    </div>
                    @error('email')
                        <p class="teks-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Field Password --}}
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="bi bi-lock input-ikon"></i>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input @error('password') is-invalid @enderror"
                            placeholder="Masukkan password kamu"
                            required
                            autocomplete="current-password"
                        >
                    </div>
                    @error('password')
                        <p class="teks-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tombol Submit --}}
                <button type="submit" class="btn btn-hijau btn-submit">
                    <i class="bi bi-box-arrow-in-right"></i>
                    Masuk Sekarang
                </button>
            </form>

            {{-- Link ke halaman register --}}
            <p class="link-daftar">
                Belum punya akun? <a href="/register">Daftar di sini</a>
            </p>
        </div>

    </div>
</div>
@endsection
