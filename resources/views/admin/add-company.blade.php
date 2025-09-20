<x-app-layout>
    <h1 class="text-2xl font-bold mb-4">➕ Zarejestruj firmę</h1>

    <form action="{{ route('admin.store-company') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="name">Nazwa firmy</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="postal_code">Kod pocztowy</label>
            <input type="text" name="postal_code" id="postal_code" required>
        </div>

        <div>
            <label for="city">Miasto</label>
            <input type="text" name="city" id="city" required>
        </div>

        <div>
            <label for="street">Ulica</label>
            <input type="text" name="street" id="street" required>
        </div>

        <div>
            <label for="nip">NIP</label>
            <input type="text" name="nip" id="nip" required>
        </div>

        <div>
            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="phone">Telefon</label>
            <input type="text" name="phone" id="phone">
        </div>

        <div>
            <label for="password">Hasło</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <label for="password_confirmation">Powtórz hasło</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Dodaj firmę
        </button>
    </form>
</x-app-layout>
