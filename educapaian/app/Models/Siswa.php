<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Siswa extends Model
{
    use HasFactory;

    protected $table = 'siswas'; 
    protected $primaryKey = 'siswaID';
    public $incrementing = true; // Tambahkan ini!
    protected $keyType = 'int'; // Tambahkan ini!

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'kelas',
        'tanggal_lahir',
        'email',
        'telepon',
        'alamat',
    ];
}
