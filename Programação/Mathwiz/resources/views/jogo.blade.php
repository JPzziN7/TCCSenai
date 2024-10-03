<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game</title>
    <link rel="stylesheet" href="{{ asset('css/jogo.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/LogoIcon.png') }}" type="image/x-icon">
    @vite('resources/css/jogo.css')
</head>
<body>
    <div class="botoes">
        <a href="#">X</a>
        <input type="checkbox" id="check" style="display: none;">
        <label for="check" id="lcheck">C</label>
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
    </div>
    
    <div class="conteudo">
        <form action="" method="post">
        <div class="quiz">
            <p>Veja as figuras abaixo: 🍎🍎 + 🍏🍏 = ?   Quantas frutas há no total?
                </p>
            <ul>
                <li>a</li>
                <li>b</li>
                <li>c</li>
                <li>d</li>
            </ul>
        </div>
        <div class="acoes">
            <div><ul>
                <li>item1</li>
                <li>item2</li>
                <li>item3</li>
                <li>item4</li>
                <li>item5</li>
            </ul></div>
            <button>Continuar</button>
        </div>
    </form>
    </div>
    
</body>
</html>
