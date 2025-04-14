<?php

namespace App\Models; // Sesuaikan jika berbeda
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'role' // Pastikan role bisa diisi
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isKepalaSekolah()
    {
        return $this->role === 'kepala_sekolah';
    }
    
    public function isGuru()
    {
        return $this->role === 'guru';
    }
    
    public function isSiswa()
    {
        return $this->role === 'siswa';
    }
    
}
