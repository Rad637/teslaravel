<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // ============================================================
    //  TAMPILKAN FORM LOGIN
    // ============================================================
    public function tampilLogin()
    {
        // Kalau sudah login, langsung redirect ke dashboard
        if (Auth::check()) {
            return redirect('/dashboard');
        }

        return view('auth.login');
    }

    // ============================================================
    //  PROSES LOGIN
    // ============================================================
    public function prosesLogin(Request $request)
    {
        // Validasi input dulu sebelum diproses
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ], [
            // Pesan error dalam bahasa Indonesia
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 6 karakter.',
        ]);

        // Ambil data dari form
        $email    = $request->input('email');
        $password = $request->input('password');

        // Coba login menggunakan Laravel Auth
        // Auth::attempt() akan otomatis cek email & password di database
        $berhasil = Auth::attempt([
            'email'    => $email,
            'password' => $password,
        ]);

        if ($berhasil) {
            // Regenerate session biar lebih aman (mencegah session fixation)
            $request->session()->regenerate();

            // Redirect ke dashboard setelah berhasil login
            return redirect('/dashboard')->with('sukses', 'Berhasil masuk! Selamat datang kembali.');
        }

        // Kalau gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password yang kamu masukkan salah.',
        ])->withInput($request->only('email'));
    }

    // ============================================================
    //  TAMPILKAN FORM REGISTER
    // ============================================================
    public function tampilRegister()
    {
        // Kalau sudah login, tidak perlu register lagi
        if (Auth::check()) {
            return redirect('/dashboard');
        }

        return view('auth.register');
    }

    // ============================================================
    //  PROSES REGISTER
    // ============================================================
    public function prosesRegister(Request $request)
    {
        // Validasi semua field yang dikirim dari form
        $request->validate([
            'nama_lengkap'          => 'required|string|min:3|max:100',
            'email'                 => 'required|email|unique:users,email', // email harus unik di tabel users
            'password'              => 'required|min:8|confirmed', // 'confirmed' cek field password_confirmation
        ], [
            // Pesan error bahasa Indonesia biar lebih friendly
            'nama_lengkap.required'  => 'Nama lengkap wajib diisi.',
            'nama_lengkap.min'       => 'Nama lengkap minimal 3 karakter.',
            'nama_lengkap.max'       => 'Nama lengkap maksimal 100 karakter.',
            'email.required'         => 'Email wajib diisi.',
            'email.email'            => 'Format email tidak valid.',
            'email.unique'           => 'Email ini sudah terdaftar. Silakan gunakan email lain.',
            'password.required'      => 'Password wajib diisi.',
            'password.min'           => 'Password minimal 8 karakter.',
            'password.confirmed'     => 'Konfirmasi password tidak cocok.',
        ]);

        // Simpan user baru ke database
        // Hash::make() untuk enkripsi password supaya tidak tersimpan plain text
        $user = User::create([
            'nama_lengkap' => $request->input('nama_lengkap'),
            'email'        => $request->input('email'),
            'password'     => Hash::make($request->input('password')),
        ]);

        // Langsung login setelah register berhasil
        Auth::login($user);

        // Redirect ke dashboard dengan pesan sukses
        return redirect('/dashboard')->with('sukses', 'Akun berhasil dibuat! Selamat datang di SISFARM.');
    }

    // ============================================================
    //  LOGOUT
    // ============================================================
    public function logout(Request $request)
    {
        // Logout dari Auth
        Auth::logout();

        // Hapus semua data session
        $request->session()->invalidate();

        // Regenerate token CSRF
        $request->session()->regenerateToken();

        // Redirect ke halaman login dengan pesan
        return redirect('/login')->with('sukses', 'Kamu berhasil keluar dari sistem.');
    }
}
