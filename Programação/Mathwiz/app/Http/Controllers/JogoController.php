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

    // Obtém ou cria o registro de progresso para a lição atual
    $alunoLicao = AlunoLicao::firstOrCreate([
        'aluno_id' => $aluno->id,
        'licao_id' => $licaoId,
    ]);

    $progressoAtual = $alunoLicao->progresso ?? 0;

    // Obtém resposta e verifica se está correta
    $resposta = $request->input('alternativa');
    $questao = Questao::find($request->questao_id);
    $respostaCorreta = $questao && $questao->resposta_correta === $resposta;

    // Atualiza o progresso se a resposta estiver correta e o progresso for menor que 5
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
