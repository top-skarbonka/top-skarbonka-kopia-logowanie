<x-app-layout>
    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-6">📋 Lista firm</h1>

            @if (session('success'))
                <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('companies.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">
                ➕ Dodaj firmę
            </a>

            <table class="w-full bg-white shadow rounded">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Nazwa</th>
                        <th class="px-4 py-2">Miasto</th>
                        <th class="px-4 py-2">Email</th>
                        <th class="px-4 py-2">Akcje</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companies as $company)
                        <tr>
                            <td class="px-4 py-2">{{ $company->nazwa_firmy }}</td>
                            <td class="px-4 py-2">{{ $company->miasto }}</td>
                            <td class="px-4 py-2">{{ $company->email }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('companies.edit', $company) }}" class="text-blue-600">✏️ Edytuj</a>
                                <form action="{{ route('companies.destroy', $company) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 ml-2" onclick="return confirm('Na pewno usunąć?')">🗑️ Usuń</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
