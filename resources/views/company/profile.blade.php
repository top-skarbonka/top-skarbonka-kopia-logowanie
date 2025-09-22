@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Profil firmy</h2>
    <ul>
        <li><b>Nazwa:</b> {{ $company->name }}</li>
        <li><b>NIP:</b> {{ $company->nip }}</li>
        <li><b>Miasto:</b> {{ $company->city }}</li>
        <li><b>Kod pocztowy:</b> {{ $company->postal_code }}</li>
        <li><b>Adres:</b> {{ $company->street }}</li>
        <li><b>Email:</b> {{ $company->email }}</li>
        <li><b>Telefon:</b> {{ $company->phone }}</li>
        <li><b>Przelicznik punktów:</b> {{ $company->exchange_rate }}</li>
    </ul>

    <a href="{{ route('company.password.form') }}" class="btn btn-warning">Zmień hasło</a>
</div>
@endsection
