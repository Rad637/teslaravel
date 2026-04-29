<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ============================================================
    //  TAMPILKAN FORM LOGIN
    // ============================================================
    public function tampilLogin()
    {
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
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|min:6',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 6 karakter.',
        ]);

        $berhasil = Auth::attempt([
            'username' => $request->input('username'),
            'password' => $request->input('password'),
        ]);

        if ($berhasil) {
            $request->session()->regenerate();
            return redirect('/dashboard')->with('sukses', 'Berhasil masuk! Selamat datang kembali.');
        }

        return back()->withErrors([
            'username' => 'Username atau password yang kamu masukkan salah.',
        ])->withInput($request->only('username'));
    }

    // ============================================================
    //  LOGOUT
    // ============================================================
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('sukses', 'Kamu berhasil keluar dari sistem.');
    }
}
