<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $table = 'gurus'; 
    protected $primaryKey = 'guruID';
    protected $fillable = [
        'nip',
        'nama_guru',
        'mata_pelajaran',
        'email',
        'telepon',
        'alamat',
    ];

    public function guru()
    {
        return $this->hasMany(Guru::class, 'guruID',);
    }
}