<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🏢 Rejestracja nowej firmy
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form method="POST" action="#">
                        @csrf

                        <!-- Nazwa firmy -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Nazwa firmy</label>
                            <input type="text" name="nazwa" class="w-full border rounded px-3 py-2 mt-1" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Email</label>
                            <input type="email" name="email" class="w-full border rounded px-3 py-2 mt-1" required>
                        </div>

                        <!-- Hasło -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Hasło</label>
                            <input type="password" name="password" class="w-full border rounded px-3 py-2 mt-1" required>
                        </div>

                        <!-- Kod pocztowy -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Kod pocztowy</label>
                            <input type="text" name="kod_pocztowy" class="w-full border rounded px-3 py-2 mt-1">
                        </div>

                        <!-- Miasto -->
                        <div class="mb-4">
                            <label class="block text-gray-700">Miasto</label>
                            <input type="text" name="miasto" class="w-full border rounded px-3 py-2 mt-1">
                        </div>

                        <!-- Zapisz -->
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                            ➕ Zarejestruj firmę
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
