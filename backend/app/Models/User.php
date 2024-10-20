<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'password_confirmed', // Pastikan untuk menambahkan ini jika Anda ingin mengisi secara massal
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Tentukan apakah pengguna sudah mengonfirmasi kata sandi.
     *
     * @return bool
     */
    public function hasVerifiedPassword()
    {
        return $this->password_confirmed; // Kembalikan status konfirmasi
    }
}
