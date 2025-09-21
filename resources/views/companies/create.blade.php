<x-app-layout>
    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <h1 class="text-2xl font-bold mb-6">➕ Rejestracja nowej firmy</h1>

            {{-- Błędy walidacji --}}
            @if ($errors->any())
                <div class="bg-red-200 text-red-800 px-4 py-2 rounded mb-4">
                    <ul class="list-disc ml-6">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Formularz --}}
            <form method="POST" action="{{ route('companies.store') }}" class="space-y-4">
                @csrf

                <div>
                    <label class="block font-medium">Nazwa firmy</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block font-medium">Kod pocztowy</label>
                        <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block font-medium">Miasto</label>
                        <input type="text" name="city" value="{{ old('city') }}" class="w-full border rounded px-3 py-2" required>
                    </div>
                </div>

                <div>
                    <label class="block font-medium">Ulica</label>
                    <input type="text" name="street" value="{{ old('street') }}" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block font-medium">NIP</label>
                    <input type="text" name="nip" value="{{ old('nip') }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block font-medium">Adres e-mail</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <label class="block font-medium">Telefon</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="w-full border rounded px-3 py-2">
                </div>

                <div>
                    <label class="block font-medium">Przelicznik zł → TopCoin</label>
                    <input type="number" step="0.01" name="exchange_rate" value="{{ old('exchange_rate', 0.5) }}" class="w-full border rounded px-3 py-2" required>
                </div>

                <div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Zarejestruj firmę
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
