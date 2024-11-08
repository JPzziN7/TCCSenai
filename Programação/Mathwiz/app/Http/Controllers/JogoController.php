<?php

namespace App\Http\Controllers;

use App\Models\Licao;
use App\Models\Questao;
use App\Models\AlunoLicao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AlunoQuestao;

class JogoController extends Controller
{
    public function show($materiaId, $licaoId, $unidade_id, Request $request)
    {
        $aluno = Auth::user();


        $alunoLicao = AlunoLicao::firstOrCreate([
            'aluno_id' => $aluno->id,
            'licao_id' => $licaoId,
        ]);

        $respondidasIds = AlunoQuestao::where('aluno_id', $aluno->id)
        ->pluck('questao_id')
        ->toArray();
        
        // dd($respondidas);
        $questao = Questao::where('materia_id', $materiaId)
            ->where('unidade_id', $unidade_id)
            ->whereNotIn('id', $respondidasIds) 
            ->inRandomOrder()
            ->first();

            $licao = Licao::find($licaoId);
            // Se não houver mais questões disponíveis, passa a mensagem de erro
    if (!$questao) {
        return view('jogo', [
            'questao' => null,
            'licao' => $licao,
            'alunoLicao' => $alunoLicao,
            'mensagem' => 'Você já respondeu todas as questões. Não há mais questões disponíveis.'
        ]);
    }


        return view('jogo', compact('questao', 'licao', 'alunoLicao'));
    }
    public function atualizarProgresso(Request $request, $licaoId)
{
    $aluno = Auth::user();

    // Obtém ou cria o registro de progresso para a lição atual
    $alunoLicao = AlunoLicao::firstOrCreate([
        'aluno_id' => $aluno->id,
        'licao_id' => $licaoId,
    ]);

    $progressoAtual = $alunoLicao->progresso ?? 0;

   // Obtém a resposta do aluno e verifica se está correta
   $resposta = $request->input('alternativa');
   $questao = Questao::find($request->questao_id);

   if (!$questao) {
       return redirect()->back()->with('error', 'Questão não encontrada.');
   }

   $respostaCorreta = $questao->resposta_correta === $resposta;

   if ($respostaCorreta) {
    AlunoQuestao::firstOrCreate([
        'aluno_id' => $aluno->id,
        'questao_id' => $questao->id,
    ]);
}


if ($respostaCorreta && $progressoAtual < 5) {
    $alunoLicao->progresso = $progressoAtual + 1;

    // Marca a lição como completa ao atingir 5 de progresso
    if ($alunoLicao->progresso >= 5) {
        $alunoLicao->completa = true;

        // Encontra a próxima lição na mesma matéria e unidade
        $licaoAtual = Licao::find($licaoId);
        $proximaLicao = Licao::where('unidade_id', $licaoAtual->unidade_id)
            ->where('materia_id', $licaoAtual->materia_id)
            ->where('id', '>', $licaoAtual->id)
            ->orderBy('id')
            ->first();

        // Libera a próxima lição, se ela existir
        if ($proximaLicao) {
            AlunoLicao::firstOrCreate([
                'aluno_id' => $aluno->id,
                'licao_id' => $proximaLicao->id,
            ], [
                'liberada' => true,
            ]);
        }
    }

        $alunoLicao->save();
    }

    // Redireciona com uma mensagem dependendo se a lição foi completada ou se a resposta estava certa
    if ($alunoLicao->completa) {
        return redirect()->back()->with('message', 'Parabéns! Você completou a lição.');
    }


    return redirect()->back()->with('message', $respostaCorreta ? 'Resposta correta!' : 'Resposta incorreta, tente novamente.');
}


}
