<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

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
            'postal_code' => 'required|string|max:10',
            'city' => 'required|string|max:255',
            'street' => 'nullable|string|max:255',
            'nip' => 'required|string|max:15|unique:companies',
            'email' => 'required|email|unique:companies',
            'phone' => 'nullable|string|max:20',
            'exchange_rate' => 'required|numeric|min:0.01',
        ]);

        Company::create($validated);

        return redirect()->route('companies.index')->with('success', 'Firma została zarejestrowana!');
    }
}
