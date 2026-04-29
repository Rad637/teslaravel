<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes - SISFARM
|--------------------------------------------------------------------------
|
| Daftar semua route untuk website SISFARM (Surya Farm)
| Dibuat: 2025
|
*/

// Halaman utama (landing page) - bisa diakses siapa saja
Route::get('/', [HomeController::class, 'index'])->name('home');

// ===== AUTENTIKASI =====

// Halaman login - GET untuk tampil form, POST untuk proses login
Route::get('/login', [AuthController::class, 'tampilLogin'])->name('login');
Route::post('/login', [AuthController::class, 'prosesLogin'])->name('login.proses');

// Halaman register - GET untuk tampil form, POST untuk proses daftar
Route::get('/register', [AuthController::class, 'tampilRegister'])->name('register');
Route::post('/register', [AuthController::class, 'prosesRegister'])->name('register.proses');

// Logout - pakai POST supaya lebih aman
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ===== HALAMAN YANG BUTUH LOGIN =====
// Nanti bisa ditambahkan route untuk dashboard, stok, panen, dll.
// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// });
