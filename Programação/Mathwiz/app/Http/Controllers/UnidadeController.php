<?php

namespace App\Http\Controllers;

use App\Models\Unidade; // Importar a model Unidade
use App\Models\Materia;
use Illuminate\Http\Request;


class UnidadeController extends Controller
{
    public function createUnidades()
    {
        $materias = [
            'Adição',
            'Subtração',
            'Divisão',
            'Multiplicação'
        ];
    
        foreach ($materias as $materia) {
            $materiaId = Materia::create(['nome' => $materia])->id;
    
            for ($i = 1; $i <= 9; $i++) {
                Unidade::create(['nome' => "Unidade $i", 'materia_id' => $materiaId]);
            }
        }
    
        return "Unidades criadas com sucesso!";
    }
    
}
