<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;

Route::get('/', fn () => view('welcome'));

Route::middleware(['auth'])->group(function () {
    // Dashboard Breeze
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    // Panele (demo)
    Route::get('/firma', fn () => view('firma.dashboard'))->name('firma.dashboard');
    Route::get('/klient', fn () => view('klient.dashboard'))->name('klient.dashboard');

    // Panel ADMIN
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/company', [AdminController::class, 'storeCompany'])->name('admin.company.store');

    // Profile (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
