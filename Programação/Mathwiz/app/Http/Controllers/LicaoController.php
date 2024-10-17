<?php

namespace App\Http\Controllers;

use App\Models\Licao;
use App\Models\Unidade;
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

        // Percorrer as unidades e suas lições
        foreach ($licoes as $unidadeNome => $licoesArray) {
            // Obter a unidade correspondente
        
            $unidades = Unidade::where('nome', $unidadeNome)->get();

            foreach ($unidades as $unidade){
            // Adicionar as lições para a unidade
            //if ($unidade) {
                foreach ($licoesArray as $nome) {
                    Licao::firstOrCreate(['nome' => $nome, 'unidade_id' => $unidade->id]);
                }
            //}
            }
        }

        return 'Lições criadas com sucesso!';
    }
}
