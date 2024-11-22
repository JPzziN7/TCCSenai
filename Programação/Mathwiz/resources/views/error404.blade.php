<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erro 404</title>
    <link rel="stylesheet" href="{{ asset('css/error404.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/LogoIcon.png') }}" type="image/x-icon">
    @vite('resources/css/error404.css')
</head>
<body>
    <div class="error-container">
    <div>
        <h1 class="error-code">404</h1>
        <p class="error-message">Ops! Não encontramos essa página. Vamos voltar à diversão?</p>
        <div class="suggestions">
            <a href="{{ route('home') }}" class="error-button">Página Inicial</a>
        </div>
    </div>
    </div>
</body>
</html>
