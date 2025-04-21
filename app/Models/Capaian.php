<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capaian extends Model
{
    use HasFactory;

    protected $table = 'capaians'; 
    protected $primaryKey = 'capaianID';
    protected $fillable = [
        'guruID',
        'kategori_prestasi',
        'jenis_capaian',
        'deskripsi',
        'tanggal_capaian',
        'penghargaan',
        'penyelenggara',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guruID',);
    }

}
