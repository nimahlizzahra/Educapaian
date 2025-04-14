<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Prestasi;
use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index()
{
    $prestasis = Prestasi::with('siswa')->orderBy('created_at', 'desc')->get();
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
            'jenis_prestasi' => 'required',
            'tanggal_raih_prestasi' => 'required',
            'penghargaan' => 'nullable|file|mimes:pdf,jpg,png|max:2048', // Validasi file
            'deskripsi' => 'required',
        ]);
    
        $prestasi = new Prestasi();
        $prestasi->siswaID = $request->siswaID;
        $prestasi->jenis_prestasi = $request->jenis_prestasi;
        $prestasi->tanggal_raih_prestasi = $request->tanggal_raih_prestasi;
        $prestasi->deskripsi = $request->deskripsi;
    
        // Menyimpan file jika ada
        if ($request->hasFile('penghargaan')) {
            $file = $request->file('penghargaan');
            $path = $file->store('penghargaan', 'public'); // Menyimpan di folder 'public/penghargaan'
            $prestasi->penghargaan = $path;
        }
    
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
            'jenis_prestasi' => 'required|string|max:255', 
            'deskripsi' => 'required|string', 
            'tanggal_raih_prestasi' => 'required|date', 
            'penghargaan' => 'nullable|mimes:jpeg,png,pdf|max:2048', 
        ]);

        // Handle file update
        if ($request->hasFile('penghargaan')) {
            // Hapus file lama jika ada
            if ($prestasi->penghargaan) {
                Storage::disk('public')->delete($prestasi->penghargaan);
            }
            $validatedData['penghargaan'] = $request->file('penghargaan')->store('penghargaan', 'public');
        }

        $prestasi->update($validatedData);

        return redirect()->route('prestasis.index')->with('success', 'Data Prestasi berhasil diperbarui!');
    }
        
    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);

        // Hapus file penghargaan jika ada
        if ($prestasi->penghargaan) {
            Storage::disk('public')->delete($prestasi->penghargaan);
        }

        $prestasi->delete();

        return redirect()->route('prestasis.index')->with('success', 'Prestasi berhasil dihapus.');
    }
}
