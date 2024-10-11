<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mathwiz</title>
    <link rel="stylesheet" href="{{ asset('css/TelaPrincipal.css') }}">
    @vite('resources/css/TelaPrincipal.css')
    <link rel="shortcut icon" href="{{ asset('images/LogoIcon.png') }}" type="image/x-icon">
</head>
<body>
    <header>
        <img src="{{ asset('images/LogoBranca.png') }}" alt="" id="logo">
        <input type="checkbox" id="perfilIcon">
        <label for="perfilIcon"><img src="{{ asset('images/iconPerfil.jfif') }}" alt="perfil"></label>
        <div class="caixa">
            <div class="caixaconteudo">
            @auth
                <div>
                <img src="{{ asset('images/iconPerfil.jfif') }}" alt="">
                <p id="username"><span>{{ Auth::user()->username }}</span></p> 
                </div>
                <ul>
                <li>Nome:  <span>  {{ Auth::user()->name }}</span></li> 
            <li><p>Email:  <span>  {{ Auth::user()->email }}</span></p></li> 
            <li><p>Pontuação: <span>{{ Auth::user()->pontos ?? 0 }}</span></p></li> 
                </ul>
                <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Sair</button>
    </form>
    @else
            <p>Você não está logado. <a href="{{ url('/login') }}">Clique aqui para entrar</a>.</p>
        @endauth
            </div>
        </div>
    </header>
    <main>
    @if (session('operacao') == null)
    <div id="escolha">
            <h1>Escolha uma operação:</h1>
            <form action="{{ route('selecionar.operacao') }}" method="POST">
                @csrf
                <button name="operacao" value="soma">Soma</button>
                <button name="operacao" value="subtracao">Subtração</button>
                <button name="operacao" value="multiplicacao">Multiplicação</button>
                <button name="operacao" value="divisao">Divisão</button>
            </form>
            </div>
        @else 
        <h1>
    {{ ucfirst(session('operacao', 'Escolha uma operação')) }}
    <form action="{{ route('trocar.operacao') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit">Trocar</button>
    </form>
</h1>
    <div id="nav">
            <p>Unidade <span>{{ session('unidade') }}</span></p> <!-- Exibe a unidade atual -->
            <form action="{{ route('navegar.unidade') }}" method="POST">
                @csrf
                <div>
                    <button type="submit" name="acao" value="anterior" {{ session('unidade') == 1 ? 'disabled' : '' }}> < </button> 
                    <button type="submit" name="acao" value="proxima" {{ session('unidade') == 9 ? 'disabled' : '' }}> > </button> 
                </div>
            </form>
        </div>
        <div class="cards">
        <div class="cards">
            @php
                $unidadeAtual = session('unidade');
                $numeroDaLicaoInicial = ($unidadeAtual - 1) * 5 + 1; // Cálculo do número da primeira lição da unidade
            @endphp

            @for ($i = 0; $i < 5; $i++)
                <div class="card">
                    <div>
                        <p>Lição <span>{{ $numeroDaLicaoInicial + $i }}</span></p> <!-- Exibe o número da lição -->
                        <img src="{{ asset('images/fundoRoxo.png') }}" alt="">
                    </div>
                    <a href="">Jogar</a>  
                </div>
            @endfor
        </div>
        </div>
        
        @endif
    </main>
    <footer>
        <div id="rodape">
            <div>
                <p>Siga nos |</p>
                <a href="https://www.instagram.com/mathwiz_game?igsh=MXE0bWc0Y2pzNGU0bA==" target="_blank"><img src="{{ asset('images/instagramIcon.png') }}" alt="" class="icon"></a>
                <a href="mailto:mathwizsuporte@gmail.com" ><img src="{{ asset('images/MailIcon.png') }}" alt="" class="icon"></a>
            </div>
            <img src="{{ asset('images/LogoBranca.png') }}" alt="">
        </div>
    </footer>
</body>
</html>