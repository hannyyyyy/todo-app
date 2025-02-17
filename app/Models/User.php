<?php

namespace App\Models;

// Menggunakan fitur autentikasi bawaan Laravel
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable; // Menggunakan trait HasFactory untuk pembuatan data dummy dan Notifiable untuk notifikasi


    /**
     * Atribut yang dapat diisi secara massal.
     * Atribut ini memungkinkan data diisi dengan metode create() atau update().
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',      // Nama pengguna
        'email',     // Email pengguna (unik)
        'password',  // Kata sandi pengguna
    ];

    /**
     * Atribut yang harus disembunyikan saat model dikonversi menjadi array atau JSON.
     * Hal ini mencegah kebocoran informasi sensitif.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
