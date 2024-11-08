<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pontuacao;

class HomeController extends Controller
{
    public function index()
    {
        $aluno = Auth::user(); // Pega o usuário autenticado

        // Verifica se o aluno tem um registro de pontuação
        $pontuacao = $aluno->pontuacao ? $aluno->pontuacao->pontuacao : 0;

        // Se o aluno não tiver uma pontuação registrada, cria um novo registro com 0 pontos
        if (!$aluno->pontuacao) {
            Pontuacao::create([
                'aluno_id' => $aluno->id,
                'pontuacao' => 0
            ]);
        }

        // Retorna a view da página principal com a pontuação compactada
        return view('TelaPrincipal', compact('pontuacao'));
    }
}
