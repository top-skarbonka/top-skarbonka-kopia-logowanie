@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1 class="mb-4">👋 Witaj, {{ Auth::user()->name }}</h1>

    <p class="lead">To jest panel administratora. Tutaj możesz zarządzać firmami.</p>

    <div class="d-flex justify-content-center gap-3 mt-4">
        <a href="{{ route('companies.index') }}" class="btn btn-primary">
            📋 Lista firm
        </a>
        <a href="{{ route('companies.create') }}" class="btn btn-success">
            ➕ Dodaj nową firmę
        </a>
    </div>
</div>
@endsection
