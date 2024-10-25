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
                'enunciado' => 'Lucas foi ao jardim e colheu 3 flores amarelas. Depois, ele encontrou mais 6 flores vermelhas e, ao caminhar um pouco mais, encontrou 4 flores brancas. Quantas flores Lucas tem ao todo? 🌼🌼🌼 + 🌹🌹🌹🌹🌹🌹 + 🌸🌸🌸🌸 = ?',
                'opcao_a' => '11',
                'opcao_b' => '12', 
                'opcao_c' => '13',
                'opcao_d' => '14',
                'resposta_correta' => '13' 
            ],
            [
                'unidade_id' => 1,
                'materia_id' => 1,
                'enunciado' => 'Em um passeio pela fazenda, Clara encontrou 3 galinhas no galinheiro. Depois, ela viu mais 2 galinhas perto do celeiro. Em seguida, 3 pintinhos correram em direção a ela, seguidos de mais 2 pintinhos. Quantas aves Clara viu ao todo? 🐔🐔🐔 + 🐔🐔 + 🐣🐣🐣 + 🐣🐣 = ?',
                'opcao_a' => '8',
                'opcao_b' => '9', 
                'opcao_c' => '10',
                'opcao_d' => '11',
                'resposta_correta' => '10'
            ],
            [
                'unidade_id' => 1,
                'materia_id' => 1,
                'enunciado' => 'Olhe as figuras:🐻🐻🐻 + 🐰🐰🐰 = ?Quantos animais há no total?',
                'opcao_a' => '4',
                'opcao_b' => '5', 
                'opcao_c' => '6 ',
                'opcao_d' => '7',
                'resposta_correta' => '6'
            ]
        ]);
    }
}
