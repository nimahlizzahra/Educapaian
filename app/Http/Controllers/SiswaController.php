<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::orderBy('created_at', 'desc');
    
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('nama_siswa', 'like', '%' . $search . '%')
                  ->orWhere('nisn', 'like', '%' . $search . '%'); // tambahin kalo mau bisa cari berdasarkan NISN juga
        }
    
        $siswas = $query->get();
    
        return view('siswas.index', compact('siswas'));
    }

    public function create()
    {
        return view('siswas.create');
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswas.show', compact('siswa'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|numeric|unique:siswas',
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'email' => 'required|email|unique:siswas',
            'telepon' => 'required|string',
            'alamat' => 'required|string',
        ]);
    
        // Upload foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('uploads/siswa', 'public'); // Simpan di storage/app/public/uploads/siswa
        }
    
        Siswa::create([
            'nisn' => $request->nisn,
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
            'foto' => $fotoPath, // Simpan path foto di database
        ]);
    
        return redirect()->route('siswas.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }
    
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswas.edit', compact('siswa'));
    }

            public function update(Request $request, $id)
        {
            $request->validate([
                'nisn' => 'required|numeric',
                'nama_siswa' => 'required|string|max:255',
                'kelas' => 'required|string',
                'tanggal_lahir' => 'required|date',
                'email' => 'required|email',
                'telepon' => 'required|string|max:15',
                'alamat' => 'required|string',
            ]);

            // Cari data siswa berdasarkan ID
            $siswa = Siswa::findOrFail($id);

            // Update data siswa
            $siswa->update([
                'nisn' => $request->nisn,
                'nama_siswa' => $request->nama_siswa,
                'kelas' => $request->kelas,
                'tanggal_lahir' => $request->tanggal_lahir,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'alamat' => $request->alamat,
            ]);

            return redirect()->route('siswas.index')->with('success', 'Data siswa berhasil diperbarui!');
        }
        
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswas.index')->with('success', 'Siswa berhasil dihapus.');
    }
}