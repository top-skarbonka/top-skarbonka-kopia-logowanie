<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center justify-between mb-4">
                <h1 class="text-2xl font-bold">📋 Lista firm</h1>
                <a href="{{ route('companies.create') }}"
                   class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    ➕ Dodaj firmę
                </a>
            </div>

            @if (session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if($companies->isEmpty())
                <p>Brak firm w bazie.</p>
            @else
                <div class="bg-white shadow rounded">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="border px-3 py-2 text-left">ID</th>
                                <th class="border px-3 py-2 text-left">Nazwa</th>
                                <th class="border px-3 py-2 text-left">Miasto</th>
                                <th class="border px-3 py-2 text-left">NIP</th>
                                <th class="border px-3 py-2 text-left">E-mail</th>
                                <th class="border px-3 py-2 text-left">Przelicznik</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($companies as $c)
                                <tr>
                                    <td class="border px-3 py-2">{{ $c->id }}</td>
                                    <td class="border px-3 py-2">{{ $c->nazwa_firmy }}</td>
                                    <td class="border px-3 py-2">{{ $c->miasto }}</td>
                                    <td class="border px-3 py-2">{{ $c->nip }}</td>
                                    <td class="border px-3 py-2">{{ $c->email }}</td>
                                    <td class="border px-3 py-2">{{ number_format($c->exchange_rate, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
