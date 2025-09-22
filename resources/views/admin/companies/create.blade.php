@extends('layouts.app')

@section('content')
<div class="container">
    <h1>➕ Dodaj nową firmę</h1>

    <form action="{{ route('companies.store') }}" method="POST">
        @csrf

        <div class="form-group mb-3">
            <label for="name">Nazwa firmy</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="nip">NIP</label>
            <input type="text" name="nip" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="city">Miasto</label>
            <input type="text" name="city" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="postal_code">Kod pocztowy</label>
            <input type="text" name="postal_code" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="street">Adres (ulica i nr)</label>
            <input type="text" name="street" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="email">Adres e-mail (login)</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="form-group mb-3">
            <label for="phone">Telefon</label>
            <input type="text" name="phone" class="form-control">
        </div>

        <div class="form-group mb-3">
            <label for="exchange_rate">Przelicznik punktów (np. 0.5)</label>
            <input type="number" step="0.01" name="exchange_rate" class="form-control" value="0.5" required>
        </div>

        <button type="submit" class="btn btn-success">💾 Zapisz</button>
        <a href="{{ route('companies.index') }}" class="btn btn-secondary">↩️ Wróć</a>
    </form>
</div>
@endsection
