<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

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
            'name'        => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'city'        => 'required|string|max:255',
            'street'      => 'required|string|max:255',
            'nip'         => 'required|string|max:20|unique:companies,nip',
            'email'       => 'required|email|unique:companies,email',
            'phone'       => 'nullable|string|max:20',
        ]);

        Company::create($validated);

        return redirect()->route('companies.index')
                         ->with('success', 'Firma została dodana pomyślnie.');
    }

    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'city'        => 'required|string|max:255',
            'street'      => 'required|string|max:255',
            'nip'         => 'required|string|max:20|unique:companies,nip,' . $company->id,
            'email'       => 'required|email|unique:companies,email,' . $company->id,
            'phone'       => 'nullable|string|max:20',
        ]);

        $company->update($validated);

        return redirect()->route('companies.index')
                         ->with('success', 'Dane firmy zostały zaktualizowane.');
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return redirect()->route('companies.index')
                         ->with('success', 'Firma została usunięta.');
    }
}
