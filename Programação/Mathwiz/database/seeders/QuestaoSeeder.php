<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestaoSeeder extends Seeder
{
    /**
     * Execute o seeding do banco de dados.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questoes')->delete();
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
                'opcao_c' => '7',
                'opcao_d' => '6',
                'resposta_correta' => '6'
            ],
            [
                'unidade_id' => 1,
                'materia_id' => 1,
                'enunciado' => 'Olhe os desenhos: 🌟🌟🌟 + 🌙🌙 = ? Quantas estrelas e luas há no total?',
                'opcao_a' => '4',
                'opcao_b' => '5',
                'opcao_c' => '6',
                'opcao_d' => '7',
                'resposta_correta' => '5'
            ],
            [
                'unidade_id' => 1,
                'materia_id' => 1,
                'enunciado' => 'Na feira, Dona Ana comprou 5 maçãs e colocou na sacola. Em seguida, ela encontrou mais 3 maçãs no fundo da sacola e ganhou 2 maçãs de brinde. Quantas maçãs Dona Ana tem agora? 🍎🍎🍎🍎🍎 + 🍎🍎🍎 + 🍎🍎 = ?',
                'opcao_a' => '8',
                'opcao_b' => '9',
                'opcao_c' => '10',
                'opcao_d' => '11',
                'resposta_correta' => '10'
            ],
            [
                'unidade_id' => 1,
                'materia_id' => 1,
                'enunciado' => 'Pedro está organizando seu quarto. Ele encontrou 5 bolas de futebol no armário e depois colocou 2 bolas de basquete na prateleira. Quantas bolas ele tem agora? ⚽⚽⚽⚽⚽ + 🏀🏀 = ?',
                'opcao_a' => '6',
                'opcao_b' => '7',
                'opcao_c' => '8',
                'opcao_d' => '9',
                'resposta_correta' => '7'
            ]
        ]);
    }
}
