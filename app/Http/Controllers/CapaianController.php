<?php

namespace App\Http\Controllers;
use App\Models\Capaian;
use App\Models\Guru;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf; 

class CapaianController extends Controller
{
    public function index()
    {
        $capaians = Capaian::orderBy('created_at', 'desc')->get();
        return view('capaians.index', compact('capaians'));
    }

    public function create()
    {
        $gurus = Guru::all(); 
        return view('capaians.create', compact('gurus'));
    }

    public function show($id)
    {
        $capaian = Capaian::findOrFail($id);
        return view('capaians.show', compact('capaian'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guruID' => 'required|exists:gurus,guruID',
            'jenis_capaian' => 'required|string|max:255',
            'tanggal_capaian' => 'required|date',
            'penghargaan' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'deskripsi' => 'required|string',
            'penyelenggara' => 'required|string',

        ]);

        $capaian = new Capaian();
        $capaian->guruID = $request->guruID;
        $capaian->jenis_capaian = $request->jenis_capaian;
        $capaian->tanggal_capaian = $request->tanggal_capaian;
        $capaian->deskripsi = $request->deskripsi;
        $capaian->penyelenggara = $request->penyelenggara;

        if ($request->hasFile('penghargaan')) {
            $file = $request->file('penghargaan');
            $path = $file->store('penghargaan', 'public');
            $capaian->penghargaan = $path;
        }

        $capaian->save();

        return redirect()->route('capaians.index')->with('success', 'Data Capaian berhasil disimpan');
    }

    public function exportPdf(Request $request)
        {
            $bulan = $request->input('bulan');
            $tahun = $request->input('tahun');

            $capaians = Capaian::with('guru')
                ->whereMonth('tanggal_capaian', $bulan)
                ->whereYear('tanggal_capaian', $tahun)
                ->get();

            $prestasis = Prestasi::with('siswa')
                ->whereMonth('tanggal_raih_prestasi', $bulan)
                ->whereYear('tanggal_raih_prestasi', $tahun)
                ->get();

            $pdf = Pdf::loadView('capaians.laporan_pdf', compact('capaians', 'prestasis', 'bulan', 'tahun'));

            return $pdf->download('laporan_capaian_' . $bulan . '_' . $tahun . '.pdf');
        }



    public function edit($id)
    {
        $capaian = Capaian::findOrFail($id);
        $gurus = Guru::all();
        return view('capaians.edit', compact('capaian', 'gurus'));          
    }

    public function update(Request $request, $id)
    {
        $capaian = Capaian::findOrFail($id);

        $request->validate([
            'guruID' => 'required|exists:gurus,guruID',
            'jenis_capaian' => 'required|string|max:255',
            'tanggal_capaian' => 'required|date',
            'penghargaan' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
            'deskripsi' => 'required|string',
            'penyelenggara' => 'required|string',
        ]);

        $capaian->guruID = $request->guruID;
        $capaian->jenis_capaian = $request->jenis_capaian;
        $capaian->tanggal_capaian = $request->tanggal_capaian;
        $capaian->deskripsi = $request->deskripsi;
        $capaian->penyelenggara = $request->penyelenggara;

        if ($request->hasFile('penghargaan')) {
            if ($capaian->penghargaan) {
                Storage::disk('public')->delete($capaian->penghargaan);
            }
            $file = $request->file('penghargaan');
            $path = $file->store('penghargaan', 'public');
            $capaian->penghargaan = $path;
        }

        $capaian->save();

        return redirect()->route('capaians.index')->with('success', 'Data Capaian berhasil diperbarui');
    }

        
    public function destroy($id)
    {
        $capaian = Capaian::findOrFail($id);
    
        if ($capaian->penghargaan) {
            Storage::disk('public')->delete($capaian->penghargaan);
        }
    
        $capaian->delete();
    
        return redirect()->route('capaians.index')->with('success', 'Data Capaian berhasil dihapus');
    }
    
}
