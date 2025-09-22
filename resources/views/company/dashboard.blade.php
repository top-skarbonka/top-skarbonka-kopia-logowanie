<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🏢 Panel firmy
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8 bg-white shadow p-6 rounded">
            <h3 class="text-lg font-bold mb-4">Witaj, {{ Auth::guard('company')->user()->name }}</h3>

            <p class="text-gray-700">
                Hasło zostało wygenerowane przy rejestracji i nie jest przechowywane w panelu.
                Jeśli go nie masz, poproś administratora o reset.
            </p>
        </div>
    </div>
</x-app-layout>
