<?php

use App\Http\Controllers\LembagaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Lembaga Routes
    Route::get('/lembaga', [LembagaController::class, 'index'])->name('lembaga.index');
    Route::get('/lembaga/create', [LembagaController::class, 'create'])->name('lembaga.create');
    Route::post('/lembaga', [LembagaController::class, 'store'])->name('lembaga.store');
    Route::get('/lembaga/{lembaga}', [LembagaController::class, 'show'])->name('lembaga.show');
    Route::get('/lembaga/{lembaga}/edit', [LembagaController::class, 'edit'])->name('lembaga.edit');
    Route::put('/lembaga/{lembaga}', [LembagaController::class, 'update'])->name('lembaga.update');
    Route::delete('/lembaga/{lembaga}', [LembagaController::class, 'destroy'])->name('lembaga.destroy');
});

require __DIR__.'/auth.php';
