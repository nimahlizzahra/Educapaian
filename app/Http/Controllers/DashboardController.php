<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Prestasi;
use App\Models\Capaian;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'siswas' => Siswa::count(),
            'gurus' => Guru::count(),
            'prestasis' => Prestasi::count(),
            'capaians' => Capaian::count(),
        ]);
    }
}

