<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ControladorController;

Route::get('/', [ControladorController::class, 'index']);

use App\Http\Controllers\MemeController;
Route::get('/memes', [MemeController::class, 'index'])->name('memes.index');
Route::get('/feed', [MemeController::class, 'feed'])->name('memes.feed');
