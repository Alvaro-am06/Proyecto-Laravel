<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ControladorController;
use App\Http\Controllers\BuloController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ControladorController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/bulos/create', [BuloController::class, 'create']);
    Route::post('/bulos', [BuloController::class, 'store']);
    Route::get('/bulos/{id}/edit', [BuloController::class, 'edit']);
    Route::put('/bulos/{id}', [BuloController::class, 'update']);
    Route::delete('/bulos/{id}', [BuloController::class, 'destroy']);
});

require __DIR__.'/auth.php';
