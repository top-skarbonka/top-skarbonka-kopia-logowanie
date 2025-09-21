<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

Route::get('/', function () {
    return view('welcome');
});

// Dashboard (dla zalogowanych)
Route::middleware(['auth'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Panel admina — proste sprawdzenie zalogowania (rolę dodamy później)
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/companies',            [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/admin/companies/create',     [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/admin/companies/store',     [CompanyController::class, 'store'])->name('companies.store');

    // NOWE:
    Route::get('/admin/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('/admin/companies/{company}',      [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('/admin/companies/{company}',   [CompanyController::class, 'destroy'])->name('companies.destroy');
});

require __DIR__.'/auth.php';
