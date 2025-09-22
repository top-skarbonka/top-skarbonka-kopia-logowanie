<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    // Lista wszystkich firm
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    // Formularz dodawania nowej firmy
    public function create()
    {
        return view('companies.create');
    }

    // Zapis nowej firmy
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'postal_code'  => 'required|string|max:20',
            'city'         => 'required|string|max:255',
            'street'       => 'required|string|max:255',
            'nip'          => 'required|string|max:20|unique:companies,nip',
            'email'        => 'required|email|unique:companies,email',
            'phone'        => 'nullable|string|max:20',
            'exchange_rate'=> 'required|numeric|min:0.01',
        ]);

        // Generujemy losowe hasło
        $plainPassword = Str::random(8);

        // Tworzymy firmę z zaszyfrowanym hasłem
        $company = Company::create([
            'name'         => $validated['name'],
            'postal_code'  => $validated['postal_code'],
            'city'         => $validated['city'],
            'street'       => $validated['street'],
            'nip'          => $validated['nip'],
            'email'        => $validated['email'],
            'phone'        => $validated['phone'],
            'exchange_rate'=> $validated['exchange_rate'],
            'password'     => bcrypt($plainPassword),
        ]);

        // ✅ Zwracamy ID, email i hasło tymczasowe
        return redirect()->route('companies.index')
            ->with('success', "Firma została zarejestrowana! ID firmy: {$company->id}, Email: {$company->email}, Hasło: {$plainPassword}");
    }

    // Formularz edycji firmy
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    // Aktualizacja danych firmy
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $validated = $request->validate([
            'name'         => 'required|string|max:255',
            'postal_code'  => 'required|string|max:20',
            'city'         => 'required|string|max:255',
            'street'       => 'required|string|max:255',
            'nip'          => 'required|string|max:20|unique:companies,nip,' . $company->id,
            'email'        => 'required|email|unique:companies,email,' . $company->id,
            'phone'        => 'nullable|string|max:20',
            'exchange_rate'=> 'required|numeric|min:0.01',
        ]);

        // Aktualizacja firmy bez zmiany hasła
        $company->update($validated);

        return redirect()->route('companies.index')
            ->with('success', 'Dane firmy zostały zaktualizowane!');
    }

    // Usunięcie firmy
    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Firma została usunięta!');
    }
}
