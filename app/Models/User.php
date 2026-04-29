<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Field yang boleh diisi secara massal (mass assignment)
     * Ini penting untuk keamanan, supaya tidak semua field bisa diisi seenaknya
     */
    protected $fillable = [
        'nama_lengkap',
        'email',
        'password',
    ];

    /**
     * Field yang disembunyikan ketika model dikonversi ke array/JSON
     * Password dan remember_token tidak boleh ikut tampil
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting otomatis tipe data
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed', // Laravel 10+ otomatis hash
    ];
}
