<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ✅ Strona startowa przekierowuje do logowania admina
Route::get('/', function () {
    return redirect()->route('login');
});

// ✅ Alias do dashboard (wymagany przez Laravel Breeze/Jetstream)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('companies.index');
    })->name('dashboard');
});

// ✅ Panel admina – firmy
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return redirect()->route('companies.index');
    })->name('admin.dashboard');

    Route::get('/admin/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/admin/companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/admin/companies/store', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/admin/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('/admin/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('/admin/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');
    Route::get('/admin/companies/{id}/download', [CompanyController::class, 'downloadCredentials'])->name('companies.download');
});

// ✅ Logowanie firm
Route::get('/company/login', [CompanyAuthController::class, 'showLoginForm'])->name('company.login');
Route::post('/company/login', [CompanyAuthController::class, 'login'])->name('company.login.submit');
Route::get('/company/dashboard', [CompanyAuthController::class, 'dashboard'])->middleware('auth:company')->name('company.dashboard');
Route::post('/company/logout', [CompanyAuthController::class, 'logout'])->name('company.logout');

// ✅ Standardowe logowanie admina (Laravel Breeze/Jetstream)
require __DIR__.'/auth.php';
