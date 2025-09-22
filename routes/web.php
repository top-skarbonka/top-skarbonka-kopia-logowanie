<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Tutaj są zarejestrowane wszystkie trasy webowe dla aplikacji.
|
*/

// ------------------------
// Admin routes (z logowaniem admina)
// ------------------------
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/companies', [CompanyController::class, 'index'])->name('companies.index');
    Route::get('/admin/companies/create', [CompanyController::class, 'create'])->name('companies.create');
    Route::post('/admin/companies/store', [CompanyController::class, 'store'])->name('companies.store');
    Route::get('/admin/companies/{company}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
    Route::put('/admin/companies/{company}', [CompanyController::class, 'update'])->name('companies.update');
    Route::delete('/admin/companies/{company}', [CompanyController::class, 'destroy'])->name('companies.destroy');
    Route::get('/admin/companies/{id}/download', [CompanyController::class, 'downloadCredentials'])->name('companies.download');
});

// ✅ Trasa wylogowania dla ADMINA
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // albo /admin/login jeśli masz osobny login admina
})->name('logout');

// ------------------------
// Company routes (panel firmowy)
// ------------------------
Route::prefix('company')->group(function () {
    Route::get('/login', [CompanyAuthController::class, 'showLoginForm'])->name('company.login');
    Route::post('/login', [CompanyAuthController::class, 'login'])->name('company.login.submit');
    Route::post('/logout', [CompanyAuthController::class, 'logout'])->name('company.logout');

    Route::middleware('auth:company')->group(function () {
        Route::get('/dashboard', [CompanyAuthController::class, 'dashboard'])->name('company.dashboard');
        Route::get('/profile', [CompanyAuthController::class, 'profile'])->name('company.profile');
        Route::get('/change-password', [CompanyAuthController::class, 'showChangePasswordForm'])->name('company.password.form');
        Route::post('/change-password', [CompanyAuthController::class, 'updatePassword'])->name('company.password.update');
    });
});
