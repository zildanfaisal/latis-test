<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    public function index()
    {
        $lembagas = Lembaga::all();
        return view('lembaga.index', compact('lembagas'));
    }

    public function create()
    {
        return view('lembaga.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lembaga' => 'required|string|max:255',
        ]);

        Lembaga::create([
            'nama_lembaga' => $request->nama_lembaga,
        ]);

        return redirect()->route('lembaga.index')->with('success', 'Lembaga created successfully.');
    }

    public function edit(Lembaga $lembaga)
    {
        return view('lembaga.edit', compact('lembaga'));
    }

    public function update(Request $request, Lembaga $lembaga)
    {
        $request->validate([
            'nama_lembaga' => 'required|string|max:255',
        ]);

        $lembaga->update([
            'nama_lembaga' => $request->nama_lembaga,
        ]);

        return redirect()->route('lembaga.index')->with('success', 'Lembaga updated successfully.');
    }

    public function destroy(Lembaga $lembaga)
    {
        $lembaga->delete();

        return redirect()->route('lembaga.index')->with('success', 'Lembaga deleted successfully.');
    }
}
