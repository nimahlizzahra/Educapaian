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
        'kategori_prestasi',
        'jenis_prestasi',
        'tanggal_raih_prestasi',
        'deskripsi',
        'penyelenggara',
        'penghargaan',
    ];
    

    public function siswa()
{
    return $this->belongsTo(Siswa::class, 'siswaID');
}

}

