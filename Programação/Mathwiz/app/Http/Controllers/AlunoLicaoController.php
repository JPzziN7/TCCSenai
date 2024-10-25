<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\AlunoLicao;
use App\Models\Licao;

class AlunoLicaoController extends Controller
{
    public function liberarPrimeiraLicao(Aluno $aluno)
{
    // Verificar a operação atual (Soma, Subtração, etc.) selecionada na sessão
    $operacao = session('operacao'); // Obtemos a operação pela sessão, caso esteja configurada
    $unidades = range(1, 9); // Supondo que temos 9 unidades

    foreach ($unidades as $unidadeId) {
        // Busca a primeira lição da unidade atual
        $primeiraLicao = \App\Models\Licao::where('unidade_id', $unidadeId)
            ->orderBy('id', 'asc')
            ->first();

        // Caso exista uma lição para liberar
        if ($primeiraLicao) {
            \App\Models\AlunoLicao::updateOrCreate(
                ['aluno_id' => $aluno->id, 'licao_id' => $primeiraLicao->id],
                ['liberada' => true]
            );
        }
    }
}

}
