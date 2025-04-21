<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestasi;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Prestasi::with('siswa')->orderBy('created_at', 'desc');
    
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->whereHas('siswa', function ($q) use ($search) {
                $q->where('nama_siswa', 'like', '%' . $search . '%');
            })->orWhere('jenis_prestasi', 'like', '%' . $search . '%');
        }
    
        $prestasis = $query->get();
    
        return view('prestasis.index', compact('prestasis'));
    }    

    public function create()
    {
        $siswas = Siswa::all();     
        return view('prestasis.create', compact('siswas'));
    }

    public function show($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        return view('prestasis.show', compact('prestasi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswaID' => 'required',
            'kategori_prestasi' => 'required',
            'jenis_prestasi' => 'required',
            'tanggal_raih_prestasi' => 'required',
            'deskripsi' => 'required',
            'penyelenggara' => 'required',
            'penghargaan' => 'nullable|string',
        ]);

        $prestasi = new Prestasi();
        $prestasi->siswaID = $request->siswaID;
        $prestasi->kategori_prestasi = $request->kategori_prestasi;
        $prestasi->jenis_prestasi = $request->jenis_prestasi;
        $prestasi->tanggal_raih_prestasi = $request->tanggal_raih_prestasi;
        $prestasi->deskripsi = $request->deskripsi;
        $prestasi->penyelenggara = $request->penyelenggara;
        $prestasi->penghargaan = $request->penghargaan;
        $prestasi->save();

        return redirect()->route('prestasis.index')->with('success', 'Data pencapaian berhasil disimpan');
    }


    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $siswas = Siswa::all();
        return view('prestasis.edit', compact('prestasi', 'siswas'));          
    }

    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $validatedData = $request->validate([
            'siswaID' => 'required|exists:siswas,siswaID', 
            'kategori_prestasi' => 'required|string',
            'jenis_prestasi' => 'required|string|max:255', 
            'deskripsi' => 'required|string', 
            'tanggal_raih_prestasi' => 'required|date', 
            'penyelenggara' => 'required|string',
            'penghargaan' => 'nullable|string',
        ]);

        $prestasi->update($validatedData);

        return redirect()->route('prestasis.index')->with('success', 'Data Prestasi berhasil diperbarui!');
    }


    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $prestasi->delete();

        return redirect()->route('prestasis.index')->with('success', 'Prestasi berhasil dihapus.');
    }

    public function exportPDF(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;

        $prestasis = Prestasi::with('siswa')
            ->whereMonth('tanggal_raih_prestasi', $bulan)
            ->whereYear('tanggal_raih_prestasi', $tahun)
            ->get();

        $pdf = Pdf::loadView('prestasis.laporan_pdf', compact('prestasis', 'bulan', 'tahun'));

        return $pdf->download("laporan-prestasi-$bulan-$tahun.pdf");
    }
}
