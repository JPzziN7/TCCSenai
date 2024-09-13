<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/Cadastro.css') }}">
    @vite('resources/css/Cadastro.css')
    <link rel="shortcut icon" href="{{ asset('images/LogoIcon.png') }}" type="image/x-icon">
</head>
<body>
    <img src="{{ asset('images/giflogin.gif') }}" alt="" id="fundo">
    <form action="" method="POST">
    <div class="conteudo">
        <a href="{{ url('/') }}"><img src="{{ asset('images/LogoBranca.png') }}" alt="Logo"></a>
        <input type="text" placeholder="Fullname" required>
        <input type="text" placeholder="Username" required>
        <input type="email" placeholder="Email" required>
        <input type="password" placeholder="Password" required>
        <div>
        <button>Register</button>
        <p>Already registered? ?<a href="{{ url('/login') }}"> Sign in</a></p>
        </div>
    </div>
    </form>
</body>
</html>