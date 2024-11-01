<?php
namespace App\Http\Controllers;

use App\Models\Licao;
use App\Models\Unidade;
use App\Models\Materia;
use Illuminate\Http\Request;

class LicaoController extends Controller
{
    public function createLicoes()
    {
        // Definindo as lições organizadas por unidade
        $licoes = [
            'Unidade 1' => ['Lição 1', 'Lição 2', 'Lição 3', 'Lição 4', 'Lição 5'],
            'Unidade 2' => ['Lição 6', 'Lição 7', 'Lição 8', 'Lição 9', 'Lição 10'],
            'Unidade 3' => ['Lição 11', 'Lição 12', 'Lição 13', 'Lição 14', 'Lição 15'],
            'Unidade 4' => ['Lição 16', 'Lição 17', 'Lição 18', 'Lição 19', 'Lição 20'],
            'Unidade 5' => ['Lição 21', 'Lição 22', 'Lição 23', 'Lição 24', 'Lição 25'],
            'Unidade 6' => ['Lição 26', 'Lição 27', 'Lição 28', 'Lição 29', 'Lição 30'],
            'Unidade 7' => ['Lição 31', 'Lição 32', 'Lição 33', 'Lição 34', 'Lição 35'],
            'Unidade 8' => ['Lição 36', 'Lição 37', 'Lição 38', 'Lição 39', 'Lição 40'],
            'Unidade 9' => ['Lição 41', 'Lição 42', 'Lição 43', 'Lição 44', 'Lição 45'],
        ];

        // Obtém os IDs das matérias
        $materias = Materia::whereIn('nome', ['Adição', 'Subtração', 'Multiplicação', 'Divisão'])->pluck('id', 'nome');

        foreach ($licoes as $unidadeNome => $licoesArray) {
            // Obter a unidade correspondente
            $unidade = Unidade::where('nome', $unidadeNome)->first();

            if ($unidade) {
                // Para cada unidade, percorre todas as matérias
                foreach ($materias as $materiaId) {
                    foreach ($licoesArray as $nome) {
                        // Insere a lição com a unidade e a matéria associadas
                        Licao::firstOrCreate([
                            'nome' => $nome,
                            'unidade_id' => $unidade->id,
                            'materia_id' => $materiaId,
                        ]);
                    }
                }
            }
        }

        return 'Lições criadas com sucesso para todas as matérias!';
    }
}
