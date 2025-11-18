<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        $siswas = Siswa::all();

        $lembagas = Lembaga::all();

        return view('dashboard', compact('user', 'siswas', 'lembagas'));
    }
}
