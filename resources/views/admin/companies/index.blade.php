@extends('layouts.app')

@section('content')
<div class="container">
    <h1>📋 Lista firm</h1>

    <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">➕ Dodaj firmę</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($companies->isEmpty())
        <p>Brak zarejestrowanych firm.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nazwa</th>
                    <th>NIP</th>
                    <th>Miasto</th>
                    <th>Kod pocztowy</th>
                    <th>Adres</th>
                    <th>Email</th>
                    <th>Telefon</th>
                    <th>Przelicznik punktów</th>
                    <th>Akcje</th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->nip }}</td>
                        <td>{{ $company->city }}</td>
                        <td>{{ $company->postal_code }}</td>
                        <td>{{ $company->street }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->phone }}</td>
                        <td>{{ $company->exchange_rate }}</td>
                        <td>
                            <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm">✏️ Edytuj</a>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">🗑 Usuń</button>
                            </form>
                            <a href="{{ route('companies.download', $company->id) }}" class="btn btn-info btn-sm">⬇️ Dane logowania</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
