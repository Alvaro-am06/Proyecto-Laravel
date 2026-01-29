<?php

use App\Http\Controllers\BuloController;
use App\Http\Controllers\ControladorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BuloController::class, 'index']);

Route::get('/dashboard', [BuloController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/bulos/create', [BuloController::class, 'create']);
    Route::post('/bulos', [BuloController::class, 'store']);
    Route::get('/bulos/{bulo}/edit', [BuloController::class, 'edit']);
    Route::put('/bulos/{bulo}', [BuloController::class, 'update']);
    Route::delete('/bulos/{bulo}', [BuloController::class, 'destroy']);
});

require __DIR__.'/auth.php';
