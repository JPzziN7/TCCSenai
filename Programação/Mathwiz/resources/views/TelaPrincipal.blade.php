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
<body class="{{ 'operacao-' . session('operacao') }}">
    @if(session('error'))
    {{session('error')}}
    @endif
    <header>
        <img src="{{ asset('images/LogoBranca.png') }}" alt="" id="logo">
        <input type="checkbox" id="perfilIcon">
        <div>
        <a href="{{ route('ranking')}}">🏆</a>
        <label for="perfilIcon"><img src="{{ asset('images/iconPerfil.jfif') }}" alt="perfil"></label>
        </div>
        <div class="caixa">
    <div class="caixa-conteudo">
        @auth
            <!-- Perfil do Usuário -->
            <div class="perfil">
                <div class="perfil-imagem">
                <div class="imagem-perfil">
    <img src="{{ asset('images/iconPerfil.jfif') }}" alt="Foto de perfil de {{ Auth::user()->username }}">
    <button id="mudar-imagem">Mudar Imagem</button>
</div>
                    <p id="username"><span>{{ Auth::user()->username }}</span></p> 
                </div>
</div>

            <!-- Informações do Usuário -->
            <ul class="perfil-info">
                <li><strong>Nome:</strong> <span>{{ Auth::user()->name }}</span></li>
                <li><strong>Email:</strong> <span>{{ Auth::user()->email }}</span></li>
                <li><strong>Pontuação:</strong> <span>{{ $pontuacao}}</span></li>
            </ul>

            <!-- Botão de Logout -->
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" aria-label="Sair da conta">Sair</button>
            </form>
        @else
            <!-- Mensagem para Usuário Não Logado -->
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
                <button name="operacao" value="1" class="adicao">+</button>
        <button name="operacao" value="2" class="subtracao">−</button>
        <button name="operacao" value="3" class="divisao">÷</button>
        <button name="operacao" value="4" class="multiplicacao">×</button>
            </form>
            </div>
        @else 
        <h1 class="titulo">
        @switch(session('operacao'))
        @case(1)
            Adição
            @break
        @case(2)
            Subtração
            @break
        @case(3)
            Divisão
            @break
        @case(4)
            Multiplicação
            @break
        @default
            Escolha uma operação
    @endswitch
    <form action="{{ route('trocar.operacao') }}" method="POST" style="display: inline;">
        @csrf
        <button type="submit">&#x27F3;</button>
    </form>
</h1>
    <div id="nav">
            <p>Unidade <span>{{ session('unidade') }}</span></p> <!-- Exibe a unidade atual -->
            <form action="{{ route('navegar.unidade') }}" method="POST">
        @csrf
        <div>
            <!-- Botão Anterior -->
            <button type="submit" name="acao" value="anterior" 
                    {{ session('unidade') == 1 ? 'disabled' : '' }}
                    aria-label="Unidade Anterior" 
                    title="Unidade Anterior">
                &lt; 
            </button> 
            
            <!-- Botão Próxima -->
            <button type="submit" name="acao" value="proxima" 
                    {{ session('unidade') == 9 ? 'disabled' : '' }}
                    aria-label="Próxima Unidade" 
                    title="Próxima Unidade">
                &gt; 
            </button> 
        </div>
    </form>
        </div>
    <div class="cards">
        
    @php
    $aluno = Auth::user(); // Obter o aluno autenticado
    $unidadeAtual = session('unidade');
    
    $materia_id = session('operacao');
    $licoes = \App\Models\Licao::where('unidade_id', $unidadeAtual)->where('materia_id', $materia_id)->get(); // Licoes da unidade atual

    // Obter as lições liberadas do aluno
    
    $licoesLiberadas = \App\Models\AlunoLicao::where('aluno_id', $aluno->id)
                       ->where('liberada', true)
                       ->pluck('licao_id')->toArray(); 

    // Garantir que a primeira lição esteja sempre liberada
    if ($unidadeAtual == 1 && !in_array(1, $licoesLiberadas)) {
    }
    
@endphp


@foreach ($licoes as $licao)
    <div class="card">
        <div>
            <p> <span>{{ $licao->nome }}</span></p>
            <img src="{{ asset('images/fundoRoxo.png') }}" alt="Imagem de fundo">
        </div>
        @if (in_array($licao->id, $licoesLiberadas))
        <a href="{{ route('game', ['materia' => $materia_id, 'licao' => $licao->id, 'unidade' => $unidadeAtual]) }}">Jogar</a>
        @else
            <p><span style="color: gray;">&#x1F512;</span>Bloqueada</p>
        @endif
    </div>
@endforeach



        
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