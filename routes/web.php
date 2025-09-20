<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Tutaj rejestrujemy wszystkie trasy aplikacji
|--------------------------------------------------------------------------
*/

// ======================== PANELY ======================== //

// Panel administratora
Route::get('/admin', [AdminController::class, 'dashboard'])
    ->middleware(['auth']) // tylko zalogowani
    ->name('admin.dashboard');

Route::post('/admin/company', [AdminController::class, 'storeCompany'])
    ->middleware(['auth'])
    ->name('admin.company.store');

// Panel firmy
Route::get('/firma', fn () => view('firma.dashboard'))
    ->middleware(['auth'])
    ->name('firma.dashboard');

// Panel klienta
Route::get('/klient', fn () => view('klient.dashboard'))
    ->middleware(['auth'])
    ->name('klient.dashboard');

// ======================== DASHBOARD DEFAULT ======================== //

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// ======================== FIX PROFILE (JETSTREAM) ======================== //
// Dodajemy trasy "atrapy", żeby layout Jetstreama się nie wysypywał
Route::get('/profile', function () {
    return 'Profile edit page (placeholder)';
})->name('profile.edit');

Route::patch('/profile', function () {
    return 'Profile updated (placeholder)';
})->name('profile.update');

Route::delete('/profile', function () {
    return 'Profile deleted (placeholder)';
})->name('profile.destroy');

// ======================== AUTH ======================== //

require __DIR__.'/auth.php';
