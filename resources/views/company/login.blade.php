<x-guest-layout>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-lg shadow">
        <div class="text-center mb-4">
            <h2 class="text-2xl font-bold">Logowanie firmy</h2>
        </div>

        @if ($errors->any())
            <div class="mb-4 text-red-600">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('company.login.submit') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium">Email</label>
                <input type="email" name="email" id="email" class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label for="password" class="block text-sm font-medium">Hasło</label>
                <input type="password" name="password" id="password" class="w-full border rounded p-2">
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded">
                Zaloguj się
            </button>
        </form>
    </div>
</x-guest-layout>
