<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold mb-4">👑 Panel Administratora</h1>

            @if(session('success'))
                <div class="bg-green-200 text-green-800 px-4 py-2 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <p>Panel działa poprawnie 🎉</p>
        </div>
    </div>
</x-app-layout>
