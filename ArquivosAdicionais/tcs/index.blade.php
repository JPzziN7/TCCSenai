<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mathwiz</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/LogoIcon.png') }}" type="image/x-icon">
    @vite('resources/css/style.css')
</head>
<body>
    <header>
        <div class="logo"><a href="#inicio"><img src="{{ asset('images/LogoBranca.png') }}" alt="logo"></a></div>
        <div class="nav">
            <ul>
                <li><a href="#sobre">Sobre</a></li>
                <li><a href="#personagens">Personagens</a></li>
                <li><a href="#comojogar">Tutorial</a></li>
            </ul>
        </div>
    </header>
    <br><br><br><br>
    <div id="inicio">
        <img src="{{ asset('images/FundoBichos.png') }}" alt="Fundo" class="imagem-fundo">
        <a href="{{ url('/login') }}">Jogar</a>
    </div>

    <div id="sobre">
        <h1>Sobre Nós</h1>
        <p>Somos uma equipe dedicada a transformar o aprendizado de matemática em uma experiência divertida e envolvente. Nosso objetivo é criar soluções educacionais inovadoras, utilizando a gamificação para ajudar os alunos a superarem desafios nas operações matemáticas. Com nosso aplicativo interativo, buscamos oferecer uma abordagem lúdica e eficaz para alunos do Ensino Fundamental I, estimulando o interesse e a confiança na disciplina desde as primeiras fases da educação.</p>
    </div>

    <div id="personagens">
        <h1>Conheça os amigos que te ajudarão na hora dos estudos</h1>
        <div class="cards">

            <div class="card green">
                <img src="{{ asset('images/XMRPI.png') }}" alt="">
                <div class="conteudocard">
                    <h1>Mr Pi</h1>
                    <p>"Olá, jovens matemáticos. Eu sou o Mr. Pi, e comigo vocês vão explorar o fascinante mundo da adição."</p>
                </div>
            </div>

            <div class="card pink">
                <img src="{{ asset('images/XPITI.png') }}" alt="">
                <div class="conteudocard">
                    <h1>Piti</h1>
                    <p>"Olá, sou a Piti! Se a subtração estiver confusa, não se preocupe! Vou te mostrar truques e dicas para tornar tudo mais claro e divertido."</p>
                </div>
            </div>
            
            <div class="card blue">
                <img src="{{ asset('images/PLOG.png') }}" alt="">
                <div class="conteudocard">
                <h1>Log</h1>
                <p>"Olá, pessoal! Sou o Log, seu amigo guaxinim que adora dividir, especialmente quando o lanche não é meu. haha!!"</p>
                </div>
            </div>

            <div class="card orange">
                <img src="{{ asset('images/PX.png') }}" alt="">
                <div class="conteudocard">
                <h1>X</h1>
                <p>"Eu sou X, e não estou aqui para fazer amigos, mas para ensinar, multiplicar é apenas repetir o mesmo número, então não complique as coisas e não me faça repetir a questão"</p>
                </div>
            </div>
        </div>
    </div>

    <div id="comojogar">
        <h1>Como Jogar</h1>
        <p>Quer saber como se aventurar no MathWiz, assista um vídeo explicativo sobre</p>
        <iframe width="760" height="415" src="https://www.youtube.com/embed/LA8QGAge2Pg?si=ZldGwexqV7WbX5Yx" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>

    <footer>
        <img src="{{ asset('images/Ondas.png') }}" id="ondas">
        <div id="rodape">
            <div>
                <p>Siga nos |</p>
                <a href="mailto:mathwizsuporte@gmail.com" target="_blank"><img src="{{ asset('images/MailIcon.png') }}" alt="" class="icon"></a>
                <a href="https://www.instagram.com/mathwiz_game?igsh=MXE0bWc0Y2pzNGU0bA==" ><img src="{{ asset('images/instagramIcon.png') }}" alt="" class="icon"></a>
            </div>
            <img src="{{ asset('images/LogoBranca.png') }}" alt="">
        </div>
    </footer>
</body>
</html>
