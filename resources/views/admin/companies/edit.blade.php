@extends('layouts.app')

@section('content')
<div class="container">
    <h1>✏️ Edytuj firmę</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('companies.update', $company->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nazwa firmy</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $company->name }}" required>
        </div>

        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" name="nip" id="nip" class="form-control" value="{{ $company->nip }}" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Miasto</label>
            <input type="text" name="city" id="city" class="form-control" value="{{ $company->city }}" required>
        </div>

        <div class="mb-3">
            <label for="postal_code" class="form-label">Kod pocztowy</label>
            <input type="text" name="postal_code" id="postal_code" class="form-control" value="{{ $company->postal_code }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Adres</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ $company->address }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Adres e-mail (login)</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $company->email }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telefon</label>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $company->phone }}">
        </div>

        <div class="mb-3">
            <label for="points_ratio" class="form-label">Przelicznik punktów</label>
            <input type="number" step="0.01" name="points_ratio" id="points_ratio" class="form-control" value="{{ $company->points_ratio }}" required>
        </div>

        <button type="submit" class="btn btn-primary">💾 Zapisz zmiany</button>
        <a href="{{ route('companies.index') }}" class="btn btn-secondary">↩️ Wróć</a>
    </form>
</div>
@endsection
