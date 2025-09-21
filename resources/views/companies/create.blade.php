<x-app-layout>
    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-2xl font-bold mb-6">➕ Rejestracja nowej firmy</h1>

            @if ($errors->any())
                <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
                    <ul class="list-disc ml-6">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('companies.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block font-medium">Nazwa firmy</label>
                    <input type="text" name="nazwa_firmy" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium">Kod pocztowy</label>
                        <input type="text" name="kod_pocztowy" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block font-medium">Miasto</label>
                        <input type="text" name="miasto" class="w-full border rounded px-3 py-2" required>
                    </div>
                </div>

                <div>
                    <label class="block font-medium">Ulica</label>
                    <input type="text" name="ulica" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block font-medium">NIP</label>
                    <input type="text" name="nip" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block font-medium">Adres e-mail</label>
                    <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block font-medium">Telefon</label>
                    <input type="text" name="telefon" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block font-medium">Przelicznik zł → TopCoin</label>
                    <input type="number" step="0.01" min="0.01" name="exchange_rate"
                           class="w-full border rounded px-3 py-2" value="0.50" required>
                </div>

                <div class="pt-2">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Zarejestruj firmę
                    </button>

                    <a href="{{ route('companies.index') }}" class="ml-3 text-gray-600 hover:underline">
                        ← Wróć do listy
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
