<?php

use App\Http\Controllers\VideojuegoController;
use App\Models\Videojuego;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::resource('videojuegos', VideojuegoController::class);
require __DIR__.'/auth.php';
