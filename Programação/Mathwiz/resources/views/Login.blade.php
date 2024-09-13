<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/Login.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/LogoIcon.png') }}" type="image/x-icon">
    @vite('resources/css/Login.css')
    
</head>
<body>
    <img src="{{ asset('images/giflogin.gif') }}" alt="" id="fundo">
    <form action="">
    <div class="conteudo">
        <a href="{{ url('/') }}"><img src="{{ asset('images/LogoBranca.png') }}" alt="Logo"></a>
        <input type="text" placeholder="Username" required>
        <input type="password" placeholder="Password" required>
        <div>
        <button>Sign in</button>
        <p>Not registered?<a href="{{ url('/cadastro') }}"> Create an account</a></p>
        </div>
    </div>
    </form>
</body>
</html>