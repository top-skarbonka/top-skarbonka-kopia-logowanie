<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        // widok formularza logowania admina
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // walidacja pól
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // sukces → przekierowanie do panelu admina
            return redirect()->route('companies.index');
        }

        // błąd logowania
        return back()->withErrors(['email' => 'Nieprawidłowe dane logowania']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
