<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::all();
        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        $lembagas = Lembaga::all();
        return view('siswa.create', compact('lembagas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|integer|unique:siswa,nis',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:100',
            'lembaga_id' => 'required|exists:lembaga,id',
            'email' => 'nullable|email|max:255',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto', 'public');
        }

        Siswa::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'foto' => $fotoPath,
            'lembaga_id' => $request->lembaga_id,
            'email' => $request->email,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa created successfully.');
    }


    public function show($id)
    {
        // Logic to show a specific Siswa
    }

    public function edit(Siswa $siswa)
    {
        $lembagas = Lembaga::all();
        return view('siswa.edit', compact('siswa', 'lembagas'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|integer|unique:siswa,nis,' . $id,
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:100',
            'lembaga_id' => 'required|exists:lembaga,id',
            'email' => 'nullable|email|max:255',
        ]);

        if ($request->hasFile('foto')) {
            if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {
                Storage::disk('public')->delete($siswa->foto);
            }
            $fotoPath = $request->file('foto')->store('foto', 'public');
            $siswa->foto = $fotoPath;
        }

        $siswa->nama = $request->nama;
        $siswa->nis = $request->nis;
        $siswa->lembaga_id = $request->lembaga_id;
        $siswa->email = $request->email;
        $siswa->save();

        return redirect()->route('siswa.index')->with('success', 'Siswa updated successfully.');
    }


    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        if ($siswa->foto && Storage::disk('public')->exists($siswa->foto)) {
            Storage::disk('public')->delete($siswa->foto);
        }

        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa deleted successfully.');
    }

}
