<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admina - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">

    <nav class="bg-gray-800 p-4 text-white">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold">Panel Admina</h1>
            <ul class="flex space-x-4">
                <li><a href="{{ url('/dashboard') }}" class="hover:underline">Dashboard</a></li>
                <li><a href="{{ url('/admin') }}" class="hover:underline">Admin Home</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="hover:underline">Wyloguj</button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <main class="container mx-auto p-6">
        @yield('content')
    </main>

</body>
</html>
