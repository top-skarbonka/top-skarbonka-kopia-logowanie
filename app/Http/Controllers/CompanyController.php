<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

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

        // ✅ Generujemy losowe hasło
        $plainPassword = Str::random(8);

        // ✅ Tworzymy firmę z zaszyfrowanym hasłem
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

        // ✅ Zapisz hasło do sesji, żeby admin mógł je pobrać
        session([
            'company_credentials' => [
                'id' => $company->id,
                'email' => $company->email,
                'password' => $plainPassword,
            ]
        ]);

        return redirect()->route('companies.index')
            ->with('success', "Firma została zarejestrowana! 
            ID firmy: {$company->id}, Email: {$company->email}, Hasło: {$plainPassword}");
    }

    // ✅ Pobieranie danych logowania w TXT
    public function downloadCredentials($id)
    {
        $credentials = session('company_credentials');

        if (!$credentials || $credentials['id'] != $id) {
            return redirect()->route('companies.index')
                ->with('error', 'Dane logowania nie są już dostępne.');
        }

        $content = "ID firmy: {$credentials['id']}\n";
        $content .= "Email: {$credentials['email']}\n";
        $content .= "Hasło: {$credentials['password']}\n";

        return Response::make($content, 200, [
            'Content-Type' => 'text/plain',
            'Content-Disposition' => "attachment; filename=credentials_company_{$id}.txt"
        ]);
    }
}
