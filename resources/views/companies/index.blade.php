@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📋 Lista firm</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3">➕ Dodaj firmę</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nazwa</th>
                <th>Miasto</th>
                <th>Email</th>
                <th>Akcje</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($companies as $company)
                <tr>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->city }}</td>
                    <td>{{ $company->email }}</td>
                    <td>
                        {{-- Guzik edytuj --}}
                        <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning btn-sm">
                            ✏️ Edytuj
                        </a>

                        {{-- Guzik pobierz dane --}}
                        <a href="{{ route('companies.download', $company->id) }}" class="btn btn-success btn-sm">
                            ⬇️ Pobierz dane
                        </a>

                        {{-- Guzik usuń --}}
                        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Na pewno chcesz usunąć tę firmę?')">
                                🗑️ Usuń
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
