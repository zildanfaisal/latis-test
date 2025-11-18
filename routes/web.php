<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Dashboard Controller
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Lembaga Routes
    Route::get('/lembaga', [LembagaController::class, 'index'])->name('lembaga.index');
    Route::get('/lembaga/create', [LembagaController::class, 'create'])->name('lembaga.create');
    Route::post('/lembaga', [LembagaController::class, 'store'])->name('lembaga.store');
    Route::get('/lembaga/{lembaga}/edit', [LembagaController::class, 'edit'])->name('lembaga.edit');
    Route::put('/lembaga/{lembaga}', [LembagaController::class, 'update'])->name('lembaga.update');
    Route::delete('/lembaga/{lembaga}', [LembagaController::class, 'destroy'])->name('lembaga.destroy');

    // Siswa Routes
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{siswa}', [SiswaController::class, 'show'])->name('siswa.show');
    Route::get('/siswa/{siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{siswa}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
});

require __DIR__.'/auth.php';
