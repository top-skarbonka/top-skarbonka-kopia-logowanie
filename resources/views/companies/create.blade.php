@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Dodaj firmę</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('companies.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nazwa firmy</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="postal_code" class="form-label">Kod pocztowy</label>
            <input type="text" class="form-control" id="postal_code" name="postal_code" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Miasto</label>
            <input type="text" class="form-control" id="city" name="city" required>
        </div>

        <div class="mb-3">
            <label for="street" class="form-label">Ulica</label>
            <input type="text" class="form-control" id="street" name="street" required>
        </div>

        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" id="nip" name="nip" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Telefon</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>

        <div class="mb-3">
            <label for="exchange_rate" class="form-label">Kurs wymiany</label>
            <input type="number" step="0.01" class="form-control" id="exchange_rate" name="exchange_rate" required>
        </div>

        <button type="submit" class="btn btn-success">Zarejestruj firmę</button>
    </form>
</div>
@endsection
