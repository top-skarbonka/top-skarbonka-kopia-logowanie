<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyAuthController extends Controller
{
    // ✅ Formularz logowania firmy
    public function showLoginForm()
    {
        return view('company.login');
    }

    // ✅ Obsługa logowania
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if (Auth::guard('company')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('company.dashboard');
        }

        return back()->withErrors([
            'email' => 'Nieprawidłowy email lub hasło.',
        ]);
    }

    // ✅ Dashboard firmy
    public function dashboard()
    {
        $company = Auth::guard('company')->user();
        return view('company.dashboard', compact('company'));
    }

    // ✅ Wylogowanie
    public function logout(Request $request)
    {
        Auth::guard('company')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('company.login');
    }
}
