<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;

class CompanyController extends Controller
{
    // ✅ lista firm
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    // ✅ formularz dodawania nowej firmy
    public function create()
    {
        return view('companies.create');
    }

    // ✅ zapis nowej firmy
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:companies,nip',
            'email' => 'required|email|unique:companies,email',
            'phone' => 'nullable|string|max:20',
            'exchange_rate' => 'required|numeric|min:0.01',
        ]);

        // 🔑 generujemy losowe hasło
        $plainPassword = Str::random(8);

        // ✅ tworzymy firmę
        $company = Company::create([
            'name' => $validated['name'],
            'postal_code' => $validated['postal_code'],
            'city' => $validated['city'],
            'street' => $validated['street'],
            'nip' => $validated['nip'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'exchange_rate' => $validated['exchange_rate'],
            'password' => bcrypt($plainPassword),
        ]);

        return redirect()->route('companies.index')
            ->with('success', "Firma została zarejestrowana! ID: {$company->id}, Hasło: {$plainPassword}");
    }

    // ✅ edycja firmy
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    // ✅ aktualizacja firmy
    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'nip' => 'required|string|max:20|unique:companies,nip,' . $company->id,
            'email' => 'required|email|unique:companies,email,' . $company->id,
            'phone' => 'nullable|string|max:20',
            'exchange_rate' => 'required|numeric|min:0.01',
        ]);

        $company->update($validated);

        return redirect()->route('companies.index')->with('success', 'Dane firmy zostały zaktualizowane.');
    }

    // ✅ usuwanie firmy
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Firma została usunięta.');
    }

    // ✅ pobieranie danych logowania jako plik
    public function downloadCredentials($id)
    {
        $company = Company::findOrFail($id);

        // UWAGA: hasło plain nie jest zapisywane w DB
        $content = "ID firmy: {$company->id}\nEmail: {$company->email}\nHasło: (wygenerowane podczas rejestracji)";

        return Response::make($content, 200, [
            'Content-Type' => 'text/plain',
            'Content-Disposition' => "attachment; filename=credentials_company_{$company->id}.txt",
        ]);
    }
}
