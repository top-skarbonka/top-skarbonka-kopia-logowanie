<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;

class CompanyAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('company.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('company')->attempt($credentials)) {
            return redirect()->route('company.dashboard');
        }

        return back()->withErrors(['email' => 'Nieprawidłowe dane logowania']);
    }

    public function logout(Request $request)
    {
        Auth::guard('company')->logout();
        return redirect()->route('company.login');
    }

    public function dashboard()
    {
        // Pobierz aktualnie zalogowaną firmę
        $company = Auth::guard('company')->user();

        // Przekaż dane do widoku
        return view('company.dashboard', compact('company'));
    }
}
