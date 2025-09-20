<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompanyController extends Controller
{
    public function create()
    {
        return view('admin.add-company');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'city' => 'required|string|max:100',
            'street' => 'required|string|max:255',
            'nip' => 'required|string|size:10|unique:companies,nip',
            'email' => 'required|email|unique:companies,email',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ]);

        Company::create([
            'name' => $request->name,
            'postal_code' => $request->postal_code,
            'city' => $request->city,
            'street' => $request->street,
            'nip' => $request->nip,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'company_id' => strtoupper(Str::random(10)),
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Firma została dodana!');
    }
}
