<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Migration untuk membuat tabel users
 * Jalankan dengan: php artisan migrate
 */
return new class extends Migration
{
    /**
     * Buat tabel users di database MySQL
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();                          // kolom id auto increment
            $table->string('nama_lengkap');         // nama lengkap pengguna
            $table->string('username')->unique();  // username harus unik
            $table->string('password');            // password (sudah di-hash)
            $table->rememberToken();               // untuk fitur "ingat saya"
            $table->timestamps();                  // created_at dan updated_at otomatis
        });
    }

    /**
     * Hapus tabel jika migration di-rollback
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
