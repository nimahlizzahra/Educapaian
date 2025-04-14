<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasis'; 
    protected $primaryKey = 'prestasiID';
    protected $fillable = [
        'siswaID',
        'jenis_prestasi',
        'deskripsi',
        'tanggal_raih_prestasi',
        'penghargaan',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswaID',);
    }
}

