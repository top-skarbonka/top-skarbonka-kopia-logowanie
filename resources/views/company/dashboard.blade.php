<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Panel Firmy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card p-4 shadow">
            <h1 class="h3 mb-3">👋 Witaj w panelu firmy!</h1>

            <p>Jesteś zalogowany jako 
                <strong>{{ Auth::guard('company')->user()->email }}</strong>.
            </p>

            <h4 class="mt-4">📊 Dane Twojej firmy</h4>
            <ul class="list-group mb-4">
                <li class="list-group-item"><strong>Nazwa:</strong> {{ Auth::guard('company')->user()->name }}</li>
                <li class="list-group-item"><strong>NIP:</strong> {{ Auth::guard('company')->user()->nip }}</li>
                <li class="list-group-item"><strong>Kod pocztowy:</strong> {{ Auth::guard('company')->user()->postal_code }}</li>
                <li class="list-group-item"><strong>Miasto:</strong> {{ Auth::guard('company')->user()->city }}</li>
                <li class="list-group-item"><strong>Ulica:</strong> {{ Auth::guard('company')->user()->street }}</li>
                <li class="list-group-item"><strong>Telefon:</strong> {{ Auth::guard('company')->user()->phone ?? '-' }}</li>
                <li class="list-group-item"><strong>Przelicznik punktów:</strong> {{ Auth::guard('company')->user()->exchange_rate }}</li>
            </ul>

            <div class="d-flex justify-content-between">
                <!-- 🔑 Zmiana hasła -->
                <a href="{{ route('company.password.form') }}" class="btn btn-warning">
                    Zmień hasło
                </a>

                <!-- 🚪 Wylogowanie -->
                <a href="{{ route('company.logout') }}" 
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                   class="btn btn-danger">
                   Wyloguj się
                </a>
            </div>

            <form id="logout-form" action="{{ route('company.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</body>
</html>
