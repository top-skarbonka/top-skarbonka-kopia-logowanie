<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Pobieramy wszystkich użytkowników
        $users = User::all();

        return view('admin.dashboard', compact('users'));
    }

    public function storeCompany(Request $request)
    {
        // Walidacja danych
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'city' => 'required|string|max:100',
            'street' => 'required|string|max:255',
            'nip' => 'required|string|max:15',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
        ]);

        // Tu w przyszłości zapiszemy dane firmy do bazy
        // Na razie tylko przekierowanie z komunikatem
        return redirect()->back()->with('success', 'Firma została dodana poprawnie!');
    }
}
