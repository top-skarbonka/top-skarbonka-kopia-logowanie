<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Panel administratora
     */
    public function dashboard()
    {
        // Pobieramy wszystkich użytkowników
        $users = User::all();

        // Przekazujemy do widoku admin.dashboard
        return view('admin.dashboard', compact('users'));
    }

    /**
     * Zapis nowej firmy
     */
    public function storeCompany(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|unique:users',
            'phone'  => 'nullable|string|max:20',
            'address'=> 'nullable|string|max:255',
        ]);

        // Tworzymy użytkownika typu "firma"
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt('password'), // hasło domyślne, potem zmieni firma
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Firma została dodana!');
    }
}
