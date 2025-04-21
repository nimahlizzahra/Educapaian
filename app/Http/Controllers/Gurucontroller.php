<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;

class Gurucontroller extends Controller
{
    public function index(Request $request)
{
    $query = Guru::orderBy('created_at', 'desc');

    if ($request->has('search') && !empty($request->search)) {
        $search = $request->search;
        $query->where('nama_guru', 'like', '%' . $search . '%')
              ->orWhere('nip', 'like', '%' . $search . '%')
              ->orWhere('mata_pelajaran', 'like', '%' . $search . '%');
    }

    $gurus = $query->get();

    return view('gurus.index', compact('gurus'));
}

    public function create()
    {
        return view('gurus.create');
    }

    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('gurus.show', compact('guru'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nip' => 'required|numeric|unique:gurus,nip',
            'nama_guru' => 'required|string|max:255',
            'mata_pelajaran' => 'required|string',
            'email' => 'required|email|unique:gurus,email',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',

        ]);

        Guru::create($validatedData);

        return redirect()->route('gurus.index')->with('success', 'Data Guru berhasil disimpan!');
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('gurus.edit', compact('guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required|numeric',
            'nama_guru' => 'required|string|max:255',
            'mata_pelajaran' => 'required|string',
            'email' => 'required|email',
            'telepon' => 'required|string|max:15',
            'alamat' => 'required|string',
        ]);

        $guru = Guru::findOrFail($id);

        $guru->update([
            'nip' => $request->nip,
            'nama_guru' => $request->nama_guru,
            'mata_pelajaran' => $request->mata_pelajaran,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('gurus.index')->with('success', 'Data Guru berhasil diperbarui!');
    }

        
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return redirect()->route('gurus.index')->with('success', 'Guru berhasil dihapus.');
    }
}
