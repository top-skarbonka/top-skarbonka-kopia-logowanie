<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::orderByDesc('id')->get();

        return view('companies.index', compact('companies'));
    }

    public function create()
    {
        return view('companies.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nazwa_firmy'  => ['required','string','max:255'],
            'kod_pocztowy' => ['required','string','max:10'],
            'miasto'       => ['required','string','max:255'],
            'ulica'        => ['nullable','string','max:255'],
            'nip'          => ['required','string','max:15','unique:companies,nip'],
            'email'        => ['required','email','max:255','unique:companies,email'],
            'telefon'      => ['nullable','string','max:20'],
            'exchange_rate'=> ['required','numeric','between:0.01,999.99'],
        ]);

        Company::create($data);

        return redirect()
            ->route('companies.index')
            ->with('success', 'Firma została dodana.');
    }
}
