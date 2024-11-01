<?php

namespace App\Http\Controllers;

use App\Models\Licao;
use App\Models\Questao;
use App\Models\AlunoLicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JogoController extends Controller
{
    public function show($materiaId, $licaoId, $unidade_id)
    {
        $aluno = Auth::user();


        $alunoLicao = AlunoLicao::firstOrCreate([
            'aluno_id' => $aluno->id,
            'licao_id' => $licaoId,
        ]);

        $questao = Questao::where('materia_id', $materiaId)
            ->where('unidade_id', $unidade_id)
            ->inRandomOrder()
            ->first();



        $licao = Licao::find($licaoId);

        if (!$questao) {
            return redirect()->back()->with('error', 'Nenhuma questão encontrada.');
        }

        return view('jogo', compact('questao', 'licao', 'alunoLicao'));
    }
    public function atualizarProgresso(Request $request, $licaoId)
    {

        $aluno = Auth::user();

        $alunoLicao = AlunoLicao::firstOrCreate([
            'aluno_id' => $aluno->id,
            'licao_id' => $licaoId,
        ]);


        $progressoAtual = $alunoLicao->progresso ?? 0;


        $resposta = $request->input('alternativa');
        $questao = Questao::find($request->questao_id);
        $respostaCorreta = $questao && $questao->resposta_correta === $resposta;

        if ($respostaCorreta && $progressoAtual < 5) {
            $alunoLicao->progresso = $progressoAtual + 1;
            $alunoLicao->save();
        }

        if ($alunoLicao->progresso >= 5) {
            return redirect()->back()->with('message', 'Parabéns! Você completou a lição.');
        }

        return redirect()->back()->with('message', $respostaCorreta ? 'Resposta correta!' : 'Resposta incorreta, tente novamente.');
    }
}
