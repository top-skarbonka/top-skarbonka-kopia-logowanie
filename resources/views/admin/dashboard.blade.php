<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">

        {{-- Nagłówek --}}
        <h1 class="text-3xl font-bold mb-6">👑 Panel Administratora</h1>

        {{-- Nawigacja zakładek --}}
        <ul class="flex border-b mb-6 space-x-4" id="tabs">
            <li><a href="#tab-firmy" class="tab-link px-4 py-2 border-b-2 border-transparent hover:border-blue-500">🏢 Zarejestruj firmę</a></li>
            <li><a href="#tab-users" class="tab-link px-4 py-2 border-b-2 border-transparent hover:border-blue-500">👥 Użytkownicy</a></li>
            <li><a href="#tab-companies" class="tab-link px-4 py-2 border-b-2 border-transparent hover:border-blue-500">🏬 Firmy</a></li>
            <li><a href="#tab-stats" class="tab-link px-4 py-2 border-b-2 border-transparent hover:border-blue-500">📊 Statystyki</a></li>
            <li><a href="#tab-settings" class="tab-link px-4 py-2 border-b-2 border-transparent hover:border-blue-500">⚙️ Ustawienia</a></li>
        </ul>

        {{-- Sekcje zakładek --}}
        <div id="tab-firmy" class="tab-content">
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">➕ Dodaj nową firmę</h2>
                <form action="{{ route('admin.company.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div><label class="block font-medium">Nazwa firmy</label><input type="text" name="name" class="w-full border rounded p-2" required></div>
                    <div><label class="block font-medium">Kod pocztowy</label><input type="text" name="postal_code" class="w-full border rounded p-2" required></div>
                    <div><label class="block font-medium">Miasto</label><input type="text" name="city" class="w-full border rounded p-2" required></div>
                    <div><label class="block font-medium">Ulica</label><input type="text" name="street" class="w-full border rounded p-2"></div>
                    <div><label class="block font-medium">NIP</label><input type="text" name="nip" class="w-full border rounded p-2" required></div>
                    <div><label class="block font-medium">E-mail</label><input type="email" name="email" class="w-full border rounded p-2" required></div>
                    <div><label class="block font-medium">Telefon</label><input type="text" name="phone" class="w-full border rounded p-2"></div>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Dodaj firmę</button>
                </form>
            </div>
        </div>

        <div id="tab-users" class="tab-content hidden">
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">👥 Lista użytkowników</h2>
                <table class="w-full border-collapse border">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Nazwa</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Rola</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->id }}</td>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">{{ $user->role ?? 'Klient' }}</td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center py-4">Brak użytkowników</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div id="tab-companies" class="tab-content hidden">
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">🏬 Lista firm</h2>
                <p>Tutaj pojawi się lista zarejestrowanych firm.</p>
            </div>
        </div>

        <div id="tab-stats" class="tab-content hidden">
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">📊 Statystyki</h2>
                <p>Statystyki systemu (użytkownicy, firmy, punkty).</p>
            </div>
        </div>

        <div id="tab-settings" class="tab-content hidden">
            <div class="bg-white shadow rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">⚙️ Ustawienia</h2>
                <p>Konfiguracja systemu.</p>
            </div>
        </div>

    </div>

    {{-- Skrypt zakładek --}}
    <script>
        document.querySelectorAll(".tab-link").forEach(link => {
            link.addEventListener("click", function(e) {
                e.preventDefault();
                document.querySelectorAll(".tab-content").forEach(tab => tab.classList.add("hidden"));
                document.querySelector(this.getAttribute("href")).classList.remove("hidden");
            });
        });
    </script>
</x-app-layout>
