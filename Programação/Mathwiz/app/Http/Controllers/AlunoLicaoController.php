<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\AlunoLicao;
use App\Models\Licao;

class AlunoLicaoController extends Controller
{
    public function liberarPrimeiraLicao(Aluno $aluno)
{
   
    $operacao = session('operacao'); 
    $unidades = range(1, 9); 

    foreach ($unidades as $unidadeId) {
        
        $primeiraLicao = \App\Models\Licao::where('unidade_id', $unidadeId)
            ->orderBy('id', 'asc')
            ->first();

       
        if ($primeiraLicao) {
            \App\Models\AlunoLicao::updateOrCreate(
                ['aluno_id' => $aluno->id, 'licao_id' => $primeiraLicao->id],
                ['liberada' => true]
            );
        }
    }
}

}
