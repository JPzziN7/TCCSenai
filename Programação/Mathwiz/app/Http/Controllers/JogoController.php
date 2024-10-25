<?php

namespace App\Http\Controllers;

use App\Models\Questao; // Importa a model Questao
use Illuminate\Http\Request;

class JogoController extends Controller
{
    public function show($materiaId, $licaoId)
    {
        $questao = Questao::where('materia_id', $materiaId)
                          ->where('unidade_id', $licaoId) 
                          ->inRandomOrder()
                          ->first(); 

        if (!$questao) {
            return redirect()->back()->with('error', 'Nenhuma questão encontrada.');
        }

        return view('jogo', compact('questao'));
    }
}

