<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

// Wszystko poniżej tylko dla zalogowanych
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // TRASY PROFILU – wymagane przez layout (navigation.blade.php)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Proste panele
    Route::get('/admin', fn () => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('/firma', fn () => view('firma.dashboard'))->name('firma.dashboard');
    Route::get('/klient', fn () => view('klient.dashboard'))->name('klient.dashboard');
});

// Trasy logowania/rejestracji z Breeze
require __DIR__.'/auth.php';
