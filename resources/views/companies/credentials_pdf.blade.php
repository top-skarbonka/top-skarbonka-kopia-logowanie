<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dane logowania firmy</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .box { border: 1px solid #333; padding: 20px; }
    </style>
</head>
<body>
    <h2>📑 Dane logowania do panelu firmy</h2>
    <div class="box">
        <p><strong>ID firmy:</strong> {{ $company->id }}</p>
        <p><strong>Nazwa:</strong> {{ $company->name }}</p>
        <p><strong>Login (email):</strong> {{ $company->email }}</p>
        <p><strong>Hasło:</strong> {{ $password }}</p>
    </div>
</body>
</html>
