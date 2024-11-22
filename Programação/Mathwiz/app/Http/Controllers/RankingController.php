<?php

namespace App\Http\Controllers;

use App\Models\Pontuacao;

class RankingController extends Controller
{
    public function index()
    {
        $ranking = Pontuacao::with('aluno') // Carrega a relação com o aluno
            ->orderByDesc('pontuacao') // Ordena por pontuação em ordem decrescente
            ->get(); // Pega todos os registros

        return view('ranking', ['ranking' => $ranking]);
    }
}
