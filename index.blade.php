<x-app-layout>
    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-2xl font-bold mb-6">📋 Lista firm</h1>

            {{-- ✅ Wyświetlanie komunikatów --}}
            @if (session('success'))
                <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($companies->isEmpty())
                <p>Brak firm w bazie.</p>
            @else
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">Nazwa</th>
                            <th class="border px-4 py-2">Miasto</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companies as $company)
                            <tr>
                                <td class="border px-4 py-2">{{ $company->name }}</td>
                                <td class="border px-4 py-2">{{ $company->city }}</td>
                                <td class="border px-4 py-2">{{ $company->email }}</td>
                                <td class="border px-4 py-2">
                                    <a href="{{ route('companies.edit', $company->id) }}" class="text-blue-600">✏️ Edytuj</a> |
                                    <a href="{{ route('companies.download', $company->id) }}" class="text-green-600">⬇️ Pobierz dane</a> |
                                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600">🗑 Usuń</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

        </div>
    </div>
</x-app-layout>
