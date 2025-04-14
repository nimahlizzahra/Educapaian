<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Capaian;
use App\Models\Prestasi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Carbon;

class LaporanPencapaianController extends Controller
{
    public function index(Request $request)
    {
        $prestasis = collect();
        $capaians = collect();
        $bulan = null;
        $tahun = null;

        if ($request->has('bulan')) {
            $tanggal = Carbon::parse($request->bulan);
            $bulan = $tanggal->month;
            $tahun = $tanggal->year;

            $capaians = Capaian::with('guru')
                ->whereMonth('tanggal_capaian', $bulan)
                ->whereYear('tanggal_capaian', $tahun)
                ->get();

            $prestasis = Prestasi::with('siswa')
                ->whereMonth('tanggal_raih_prestasi', $bulan)
                ->whereYear('tanggal_raih_prestasi', $tahun)
                ->get();
        }

        return view('laporan.index', compact('capaians', 'prestasis', 'bulan', 'tahun'));
    }

    public function exportPdf(Request $request)
    {
        try {
            $tanggal = Carbon::parse($request->bulan);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Format bulan tidak valid.');
        }
    
        $bulan = $tanggal->month;
        $tahun = $tanggal->year;
    
        $prestasis = Prestasi::with('siswa')
            ->whereMonth('tanggal_raih_prestasi', $bulan)
            ->whereYear('tanggal_raih_prestasi', $tahun)
            ->get();
    
        $capaians = Capaian::with('guru')
            ->whereMonth('tanggal_capaian', $bulan)
            ->whereYear('tanggal_capaian', $tahun)
            ->get();
    
        $pdf = PDF::loadView('laporan.pdf', compact('prestasis', 'capaians', 'bulan', 'tahun'))
                 ->setPaper('A4', 'portrait');
    
        return $pdf->stream('laporan-pencapaian-' . $request->bulan . '.pdf');
    }
    

}
