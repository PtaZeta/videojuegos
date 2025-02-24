<?php

use App\Livewire\VideojuegoIndex;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/videojuegos', VideojuegoIndex::class)->name('videojuegos');

require __DIR__.'/auth.php';
