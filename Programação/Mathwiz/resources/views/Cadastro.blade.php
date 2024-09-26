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
    @if ($errors->any())
            <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <h3 style="color: red; height:20px;">Você errou em algo</h3>
                    @endforeach
            </div>
        @endif
    <form action="{{ route('register') }}" method="POST">
    @csrf
    <div class="conteudo">
        <a href="{{ url('/') }}"><img src="{{ asset('images/LogoBranca.png') }}" alt="Logo"></a>
        <input type="text" name="name" placeholder="Fullname" required>
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        <div>
        <button type="submit">Register</button>
        <p>Already registered? ?<a href="{{ url('/login') }}"> Sign in</a></p>
        </div>
    </div>
    </form>
</body>
</html>