<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📋 Lista firm
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">

                {{-- ✅ komunikaty sukcesu --}}
                @if(session('success'))
                    <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- ✅ przycisk dodawania firmy --}}
                <div class="mb-4">
                    <a href="{{ route('companies.create') }}"
                       class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        ➕ Dodaj firmę
                    </a>
                </div>

                {{-- ✅ tabela firm --}}
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100 border-b">
                            <th class="py-2 px-4 text-left">Nazwa</th>
                            <th class="py-2 px-4 text-left">Miasto</th>
                            <th class="py-2 px-4 text-left">Email</th>
                            <th class="py-2 px-4 text-left">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($companies as $company)
                            <tr class="border-b">
                                <td class="py-2 px-4">{{ $company->name }}</td>
                                <td class="py-2 px-4">{{ $company->city }}</td>
                                <td class="py-2 px-4">{{ $company->email }}</td>
                                <td class="py-2 px-4 space-x-2">
                                    {{-- Edycja --}}
                                    <a href="{{ route('companies.edit', $company->id) }}" class="text-yellow-600">✏️ Edytuj</a>

                                    {{-- Pobieranie danych --}}
                                    <a href="{{ route('companies.download', $company->id) }}" class="text-green-600">⬇️ Pobierz dane</a>

                                    {{-- Usuwanie --}}
                                    <form action="{{ route('companies.destroy', $company->id) }}"
                                          method="POST"
                                          class="inline"
                                          onsubmit="return confirm('Na pewno chcesz usunąć tę firmę?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600">🗑️ Usuń</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 px-4 text-center text-gray-500">
                                    Brak firm w bazie.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
