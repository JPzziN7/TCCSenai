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

        // Busca a primeira lição apenas da primeira unidade
        $primeiraLicao = Licao::where('unidade_id', 1)
            ->orderBy('id', 'asc')
            ->first();

        // Libera a primeira lição encontrada, se ela existir
        if ($primeiraLicao) {
            AlunoLicao::updateOrCreate(
                ['aluno_id' => $aluno->id, 'licao_id' => $primeiraLicao->id],
                ['liberada' => true]
            );
        }
    }
}
