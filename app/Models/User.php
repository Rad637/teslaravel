<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Field yang boleh diisi secara massal (mass assignment)
     */
    protected $fillable = [
        'nama_lengkap',
        'username',
        'password',
    ];

    /**
     * Field yang disembunyikan ketika model dikonversi ke array/JSON
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting otomatis tipe data
     */
    protected $casts = [
        'password' => 'hashed', // Laravel 10+ otomatis hash
    ];
}
