<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::latest()->get();

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => ['required','string','max:255'],
            'postal_code'   => ['required','string','max:255'],
            'city'          => ['required','string','max:255'],
            'street'        => ['nullable','string','max:255'],
            'nip'           => ['required','string','max:255','unique:companies,nip'],
            'email'         => ['required','email','max:255','unique:companies,email'],
            'phone'         => ['nullable','string','max:255'],
            'exchange_rate' => ['required','numeric','min:0','max:999.99'],
        ]);

        Company::create($data);

        return redirect()->route('companies.index')
            ->with('success', 'Firma została zarejestrowana!');
    }

    // NOWE:
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $data = $request->validate([
            'name'          => ['required','string','max:255'],
            'postal_code'   => ['required','string','max:255'],
            'city'          => ['required','string','max:255'],
            'street'        => ['nullable','string','max:255'],
            'nip'           => ['required','string','max:255', Rule::unique('companies', 'nip')->ignore($company->id)],
            'email'         => ['required','email','max:255', Rule::unique('companies', 'email')->ignore($company->id)],
            'phone'         => ['nullable','string','max:255'],
            'exchange_rate' => ['required','numeric','min:0','max:999.99'],
        ]);

        $company->update($data);

        return redirect()->route('companies.index')
            ->with('success', 'Dane firmy zaktualizowane.');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Firma usunięta.');
    }
}
