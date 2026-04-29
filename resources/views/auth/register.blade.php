@extends('layouts.app')

@section('title', 'Daftar - SISFARM')

@section('styles')
<style>
    /* Halaman register */
    .halaman-register {
        min-height: calc(100vh - 68px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 16px;
        background: linear-gradient(135deg, #f0f7f2 0%, #faf7f2 100%);
        position: relative;
    }

    .halaman-register::before {
        content: '';
        position: absolute;
        bottom: -100px;
        left: -100px;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(82,183,136,0.08) 0%, transparent 70%);
        pointer-events: none;
    }

    /* Kartu form register */
    .register-card {
        background: var(--putih);
        border: 1px solid var(--border);
        border-radius: var(--radius-besar);
        box-shadow: 0 20px 60px rgba(45, 106, 79, 0.1);
        overflow: hidden;
        max-width: 500px;
        width: 100%;
        position: relative;
        z-index: 1;
    }

    /* Header card */
    .register-header {
        background: linear-gradient(135deg, #1a3c2b 0%, #2d6a4f 100%);
        padding: 32px 40px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .register-header::before {
        content: '';
        position: absolute;
        top: -40px;
        right: -40px;
        width: 150px;
        height: 150px;
        background: radial-gradient(circle, rgba(82,183,136,0.2) 0%, transparent 70%);
    }

    .register-logo {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 16px;
        position: relative;
        z-index: 1;
    }

    .register-logo-ikon {
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

    .register-logo-nama {
        font-family: var(--font-judul);
        font-size: 22px;
        font-weight: 700;
        color: #e8f5e9;
        display: block;
    }

    .register-logo-sub {
        font-size: 12px;
        color: #9dbfa3;
        display: block;
    }

    .register-header-judul {
        font-size: 22px;
        color: #e8f5e9;
        margin-bottom: 6px;
        position: relative;
        z-index: 1;
    }

    .register-header-desc {
        font-size: 13px;
        color: #9dbfa3;
        position: relative;
        z-index: 1;
    }

    /* Body form */
    .register-body {
        padding: 36px 40px;
    }

    /* Alert */
    .alert-error {
        background: #fef2f2;
        border: 1px solid #fca5a5;
        border-radius: var(--radius-kecil);
        padding: 10px 14px;
        font-size: 13px;
        color: #dc2626;
        margin-bottom: 20px;
        display: flex;
        align-items: flex-start;
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

    /* Tanda bintang wajib diisi */
    .form-label .wajib {
        color: #dc2626;
        margin-left: 2px;
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

    .form-input.is-invalid {
        border-color: #fca5a5;
    }

    .teks-error {
        font-size: 12px;
        color: #dc2626;
        margin-top: 5px;
    }

    /* Helper text kecil */
    .form-helper {
        font-size: 12px;
        color: var(--teks-abu);
        margin-top: 5px;
    }

    /* Tombol submit */
    .btn-submit {
        width: 100%;
        justify-content: center;
        padding: 13px;
        font-size: 15px;
        margin-top: 4px;
    }

    /* Link login */
    .link-login {
        text-align: center;
        margin-top: 20px;
        font-size: 13px;
        color: var(--teks-abu);
    }

    .link-login a {
        color: var(--hijau);
        font-weight: 600;
    }

    .link-login a:hover {
        text-decoration: underline;
    }

    /* Divider */
    .divider {
        display: flex;
        align-items: center;
        gap: 12px;
        margin: 20px 0;
        font-size: 12px;
        color: var(--teks-abu);
    }

    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: var(--border);
    }

    /* Responsive */
    @media (max-width: 540px) {
        .register-body {
            padding: 28px 24px;
        }

        .register-header {
            padding: 24px;
        }
    }
</style>
@endsection

@section('content')
<div class="halaman-register">
    <div class="register-card fade-up">

        {{-- Header --}}
        <div class="register-header">
            <div class="register-logo">
                <div class="register-logo-ikon">
                    <i class="bi bi-flower1"></i>
                </div>
                <div>
                    <span class="register-logo-nama">SISFARM</span>
                    <span class="register-logo-sub">Surya Farm</span>
                </div>
            </div>
            <h2 class="register-header-judul">Buat Akun Baru</h2>
            <p class="register-header-desc">Isi data di bawah untuk mendaftar sebagai pengguna SISFARM.</p>
        </div>

        {{-- Body Form --}}
        <div class="register-body">

            {{-- Tampilkan semua error validasi --}}
            @if($errors->any())
                <div class="alert-error">
                    <i class="bi bi-exclamation-circle-fill" style="margin-top: 1px; flex-shrink: 0;"></i>
                    <div>
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- Form Register --}}
            <form action="/register" method="POST">
                @csrf

                {{-- Nama Lengkap --}}
                <div class="form-group">
                    <label class="form-label" for="nama_lengkap">
                        Nama Lengkap <span class="wajib">*</span>
                    </label>
                    <div class="input-wrapper">
                        <i class="bi bi-person input-ikon"></i>
                        <input
                            type="text"
                            id="nama_lengkap"
                            name="nama_lengkap"
                            class="form-input @error('nama_lengkap') is-invalid @enderror"
                            placeholder="Masukkan nama lengkap kamu"
                            value="{{ old('nama_lengkap') }}"
                            required
                            autocomplete="name"
                        >
                    </div>
                    @error('nama_lengkap')
                        <p class="teks-error">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="form-group">
                    <label class="form-label" for="email">
                        Alamat Email <span class="wajib">*</span>
                    </label>
                    <div class="input-wrapper">
                        <i class="bi bi-envelope input-ikon"></i>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            class="form-input @error('email') is-invalid @enderror"
                            placeholder="Masukkan email aktif kamu"
                            value="{{ old('email') }}"
                            required
                            autocomplete="email"
                        >
                    </div>
                    @error('email')
                        <p class="teks-error">{{ $message }}</p>
                    @enderror
                    <p class="form-helper">Email ini akan digunakan untuk masuk ke SISFARM.</p>
                </div>

                {{-- Password --}}
                <div class="form-group">
                    <label class="form-label" for="password">
                        Password <span class="wajib">*</span>
                    </label>
                    <div class="input-wrapper">
                        <i class="bi bi-lock input-ikon"></i>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input @error('password') is-invalid @enderror"
                            placeholder="Minimal 8 karakter"
                            required
                            autocomplete="new-password"
                        >
                    </div>
                    @error('password')
                        <p class="teks-error">{{ $message }}</p>
                    @enderror
                    <p class="form-helper">Gunakan minimal 8 karakter dengan kombinasi huruf dan angka.</p>
                </div>

                {{-- Konfirmasi Password --}}
                <div class="form-group">
                    <label class="form-label" for="password_confirmation">
                        Konfirmasi Password <span class="wajib">*</span>
                    </label>
                    <div class="input-wrapper">
                        <i class="bi bi-lock-fill input-ikon"></i>
                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            class="form-input"
                            placeholder="Ulangi password kamu"
                            required
                            autocomplete="new-password"
                        >
                    </div>
                </div>

                {{-- Tombol Daftar --}}
                <button type="submit" class="btn btn-hijau btn-submit">
                    <i class="bi bi-person-check-fill"></i>
                    Daftar Sekarang
                </button>
            </form>

            <div class="divider">atau</div>

            {{-- Link ke Login --}}
            <p class="link-login">
                Sudah punya akun? <a href="/login">Masuk di sini</a>
            </p>

        </div>
    </div>
</div>
@endsection
