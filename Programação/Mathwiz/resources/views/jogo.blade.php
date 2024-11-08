<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@if ($questao)
            {{ $questao->materia->nome }} - {{ $licao->nome }}
        @else
            Lição Completa
        @endif</title>
    <link rel="stylesheet" href="{{ asset('css/jogo.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/LogoIcon.png') }}" type="image/x-icon">
    @vite('resources/css/jogo.css')
</head>
<body>
    <header class="botoes">
        <a href="{{route('home')}}">X</a>
        <input type="checkbox" id="check" style="display: none;">
        <label for="check" id="lcheck">&#x2699;</label>
        <div class="config">
            <h1>Configurações</h1>
            <audio id="musica" loop autoplay>
                <source src="{{ asset('images/som.mp3') }}" type="audio/mpeg">
                Seu navegador não suporta o elemento de áudio.
            </audio>
            <div class="radio-group">
                <label>
                  <input type="radio" name="cor" value="red" onclick="mudarCor('red')">
                  Vermelho
                </label>
            
                <label>
                  <input type="radio" name="cor" value="blue" onclick="mudarCor('blue')">
                  Azul
                </label>
            
                <label>
                  <input type="radio" name="cor" value="green" onclick="mudarCor('green')">
                  Verde
                </label>
            
                <label>
                  <input type="radio" name="cor" value="yellow" onclick="mudarCor('yellow')">
                  Amarelo
                </label>
            
                <label>
                  <input type="radio" name="cor" value="purple" onclick="mudarCor('purple')">
                  Roxo
                </label>
              </div>
            <button id="botaoIniciar" style="display: none;"><img src="{{ asset('images/tocando.png') }}" alt=""></button> 
            <button id="botaoDesligar"><img src="{{ asset('images/mudo.png') }}" alt=""></button>
            <script>
                const musica = document.getElementById('musica');
                const botaoIniciar = document.getElementById('botaoIniciar');
                const botaoDesligar = document.getElementById('botaoDesligar');

                function mudarCor(cor) {
                document.body.style.backgroundColor = cor;
                }
                // Função para mostrar e ocultar os botões
                function atualizarBotoes() {
                    if (musica.paused) {
                        botaoIniciar.style.display = 'inline-block'; // Mostra o botão Iniciar
                        botaoDesligar.style.display = 'none'; // Oculta o botão Desligar
                    } else {
                        botaoIniciar.style.display = 'none'; // Oculta o botão Iniciar
                        botaoDesligar.style.display = 'inline-block'; // Mostra o botão Desligar
                    }
                }

                
                botaoIniciar.addEventListener('click', function() {
                    musica.play(); // Toca a música
                    atualizarBotoes(); // Atualiza a visibilidade dos botões
                });

                // Pausa a música ao clicar no botão Desligar
                botaoDesligar.addEventListener('click', function() {
                    musica.pause(); 
                    atualizarBotoes(); // Atualiza a visibilidade dos botões
                });

                // Atualiza os botões na inicialização
                window.onload = function() {
                    // Se a música estiver tocando, atualiza os botões
                    if (!musica.paused) {
                        atualizarBotoes();
                    }
                };
            </script>
        </div>
            </header>
    
    
            @if (isset($mensagem))
    <div class="mensagem">
        <p>{{ $mensagem }}</p>
    </div>
    @elseif ($alunoLicao->completa)
    <div class="completou">
    <p>Você completou essa lição, parabéns!🎉 Vá ver a próxima.</p>
    </div>
    @elseif ($questao)
    <div class="conteudo">
    <form action="{{ route('game.atualizar-progresso', ['licao' => $licao->id]) }}" method="POST">
        @csrf
        <input type="hidden" name="questao_id" value="{{ $questao->id }}">
        
       
        
        <div class="quiz">
    <p>{!! $questao->enunciado !!}</p>
    <ul>
        <input type="radio" name="alternativa" id="itemum" value="{{ $questao->opcao_a }}">
        <label for="itemum">{{ $questao->opcao_a }}</label><br>
        
        <input type="radio" name="alternativa" id="itemdois" value="{{ $questao->opcao_b }}">
        <label for="itemdois">{{ $questao->opcao_b }}</label><br>
        
        <input type="radio" name="alternativa" id="itemtres" value="{{ $questao->opcao_c }}">
        <label for="itemtres">{{ $questao->opcao_c }}</label><br>
        
        <input type="radio" name="alternativa" id="itemquatro" value="{{ $questao->opcao_d }}">
        <label for="itemquatro">{{ $questao->opcao_d }}</label><br>
    </ul>
</div>

        <div class="acoes">
        <ul>
            @for ($i = 1; $i <= 5; $i++)
                <li>
                    <input type="checkbox" name="checks" id="check{{ $i }}"
                        {{ $i <= $alunoLicao->progresso ? 'checked' : '' }} disabled>
                    <label for="check{{ $i }}">item {{ $i }}</label>
                </li>
            @endfor
        </ul>
    </div>
        <button type="submit" class="continuar-btn">Continuar</button>
    
</div>
    </form>
    </div>
    @else
        <p class="erro">Nenhuma questão encontrada.</p>
    @endif
</body>
</html>
