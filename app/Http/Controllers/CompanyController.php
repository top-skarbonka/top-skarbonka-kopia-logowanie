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
        $request->validate([
            'name'         => 'required|string|max:255',
            'postal_code'  => 'required|string|max:20',
            'city'         => 'required|string|max:255',
            'street'       => 'nullable|string|max:255',
            'nip'          => 'required|string|max:20|unique:companies',
            'email'        => 'required|email|unique:companies',
            'phone'        => 'nullable|string|max:20',
            'exchange_rate'=> 'required|numeric|min:0.01',
        ]);

        Company::create($request->all());

        return redirect()->route('companies.index')
            ->with('success', 'Firma została dodana.');
    }
}
