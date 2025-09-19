  GNU nano 7.2                       resources/views/admin/dashboard.blade.php                                 
@extends('layouts.admin')

@section('content')
    <h1 class="text-3xl font-bold mb-4">Panel administratora</h1>

    <div class="bg-white shadow-md rounded p-6">
        <p class="text-gray-700">Witaj, jesteś zalogowany jako <strong>Admin</strong> 🎉</p>

        <ul class="mt-4 list-disc pl-6">
            <li>Podgląd użytkowników</li>
            <li>Zarządzanie rolami i uprawnieniami</li>
            <li>Statystyki aplikacji</li>
        </ul>
    </div>
