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
        'jenis_capaian',
        'deskripsi',
        'tanggal_capaian',
        'penghargaan',
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guruID',);
    }

}
