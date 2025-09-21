<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-6">✏️ Edycja firmy</h1>

            <form method="POST" action="{{ route('companies.update', $company) }}" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block font-medium">Nazwa firmy</label>
                    <input type="text" name="nazwa_firmy" value="{{ $company->nazwa_firmy }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium">Kod pocztowy</label>
                        <input type="text" name="kod_pocztowy" value="{{ $company->kod_pocztowy }}" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block font-medium">Miasto</label>
                        <input type="text" name="miasto" value="{{ $company->miasto }}" class="w-full border rounded px-3 py-2" required>
                    </div>
                </div>

                <div>
                    <label class="block font-medium">Ulica</label>
                    <input type="text" name="ulica" value="{{ $company->ulica }}" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block font-medium">NIP</label>
                    <input type="text" name="nip" value="{{ $company->nip }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block font-medium">Email</label>
                    <input type="email" name="email" value="{{ $company->email }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block font-medium">Telefon</label>
                    <input type="text" name="telefon" value="{{ $company->telefon }}" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block font-medium">Przelicznik zł → TopCoin</label>
                    <input type="number" step="0.01" name="exchange_rate" value="{{ $company->exchange_rate }}" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">💾 Zapisz zmiany</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
