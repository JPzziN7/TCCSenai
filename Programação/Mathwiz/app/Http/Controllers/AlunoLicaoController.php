<?php
namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Models\AlunoLicao;
use App\Models\Licao;
use App\Models\Materia;

class AlunoLicaoController extends Controller
{
    public function liberarPrimeiraLicao(Aluno $aluno)
    {
        $operacao = session('operacao'); 

        // Busca todas as matérias disponíveis no sistema
        $materias = Materia::all();

        foreach ($materias as $materia) {
            // Busca a primeira lição (ordem ascendente por ID) de cada matéria
            $primeiraLicao = Licao::where('materia_id', $materia->id)
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
}
