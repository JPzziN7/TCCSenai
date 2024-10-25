<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestaoSeeder extends Seeder
{
    /**
     * Execute the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questoes')->insert([
            [
                'unidade_id' => 1, 
                'materia_id' => 1, 
                'enunciado' => 'Qual é a soma de 2 + 2?',
                'opcao_a' => '3',
                'opcao_b' => '4', 
                'opcao_c' => '5',
                'opcao_d' => '6',
                'resposta_correta' => '4' 
            ],
            [
                'unidade_id' => 1,
                'materia_id' => 1,
                'enunciado' => 'Qual é a subtração de 5 - 2?',
                'opcao_a' => '2',
                'opcao_b' => '3', 
                'opcao_c' => '4',
                'opcao_d' => '1',
                'resposta_correta' => '3'
            ],
            [
                'unidade_id' => 1,
                'materia_id' => 1,
                'enunciado' => 'Qual é o resultado de 3 x 3?',
                'opcao_a' => '6',
                'opcao_b' => '9', 
                'opcao_c' => '8',
                'opcao_d' => '7',
                'resposta_correta' => '9'
            ]
        ]);
    }
}
