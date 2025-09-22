<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;

class CompanyAuthController extends Controller
{
    /**
     * Pokaż formularz logowania firmy
     */
    public function showLoginForm()
    {
        return view('company.login');
    }

    /**
     * Obsługa logowania firmy
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Próba logowania do guard: company
        if (Auth::guard('company')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('company.dashboard'))
                ->with('success', 'Zalogowano pomyślnie.');
        }

        return back()->withErrors([
            'email' => 'Nieprawidłowy email lub hasło.',
        ])->onlyInput('email');
    }

    /**
     * Dashboard firmy
     */
    public function dashboard()
    {
        $company = Auth::guard('company')->user();

        return view('company.dashboard', compact('company'));
    }

    /**
     * Wylogowanie firmy
     */
    public function logout(Request $request)
    {
        Auth::guard('company')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('company.login')->with('success', 'Wylogowano pomyślnie.');
    }
}
