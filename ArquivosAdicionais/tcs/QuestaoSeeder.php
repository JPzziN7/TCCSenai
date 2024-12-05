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
            ],
            [
                'unidade_id' => 2,
                'materia_id' => 1,
                'enunciado' => 'Pedro tem 3 maçãs em sua cesta. Ele encontra mais 2 maçãs no jardim e coloca na cesta. Depois, ele encontra 1 maçã na mesa da cozinha. Quantas maçãs Pedro tem agora? 3 + 2 + 1 = ?',
                'opcao_a' => '5',
                'opcao_b' => '6',
                'opcao_c' => '7',
                'opcao_d' => '8',
                'resposta_correta' => '6'
            ],
            [
                'unidade_id' => 2,
                'materia_id' => 1,
                'enunciado' => 'Maria comprou 4 balas de caramelo e depois ganhou 3 balas de menta de um amigo. Mais tarde, ela encontrou 2 balas de chocolate no bolso do casaco. Quantas balas Maria tem ao todo? 4 + 3 + 2 = ?',
                'opcao_a' => '8',
                'opcao_b' => '9',
                'opcao_c' => '10',
                'opcao_d' => '11',
                'resposta_correta' => '9'
            ],
            [
                'unidade_id' => 1,
                'materia_id' => 1,
                'enunciado' => 'João tem 3 carrinhos e seu amigo lhe dá 2 carrinhos. Mais tarde, ele encontra 1 carrinho que estava no jardim. Quantos carrinhos João tem agora? 3 + 2 + 1 = ?',
                'opcao_a' => '5',
                'opcao_b' => '6',
                'opcao_c' => '7',
                'opcao_d' => '8',
                'resposta_correta' => '6'
            ],
            [
                'unidade_id' => 1,
                'materia_id' => 1,
                'enunciado' => 'Maria tem 4 lápis e sua amiga dá a ela mais 2 lápis. Mais tarde, ela encontra 1 lápis que estava na mochila. Quantos lápis Maria tem agora? 4 + 2 + 1 = ?',
                'opcao_a' => '6',
                'opcao_b' => '7',
                'opcao_c' => '8',
                'opcao_d' => '9',
                'resposta_correta' => '7'
            ],
            [
                'unidade_id' => 1,
                'materia_id' => 1,
                'enunciado' => 'Durante uma festa, Laura recebeu 3 balões vermelhos e 2 balões azuis. Depois, ela encontrou 1 balão verde na caixa de brinquedos e ganhou 3 balões amarelos de presente. Quantos balões Laura tem agora? 3 + 2 + 1 + 3 = ?',
                'opcao_a' => '7',
                'opcao_b' => '8',
                'opcao_c' => '9',
                'opcao_d' => '10',
                'resposta_correta' => '9'
            ],
            [
                'unidade_id' => 1,
                'materia_id' => 1,
                'enunciado' => 'Em um piquenique, Ana trouxe 5 lanches. João trouxe mais 3 lanches, e depois eles encontraram 2 lanches extras na cesta. Quantos lanches há no total para o piquenique? 5 + 3 + 2 = ?',
                'opcao_a' => '8',
                'opcao_b' => '9',
                'opcao_c' => '10',
                'opcao_d' => '11',
                'resposta_correta' => '10'
            ],
            [
                'unidade_id' => 2,
                'materia_id' => 1,
                'enunciado' => 'Júlia tem 3 flores em um vaso. Ela foi ao jardim e pegou mais 2 flores. Mais tarde, encontrou mais 1 flor caída no chão. Quantas flores Júlia tem agora? 3 + 2 + 1 = ?',
                'opcao_a' => '5',
                'opcao_b' => '6',
                'opcao_c' => '7',
                'opcao_d' => '8',
                'resposta_correta' => '6'
            ],
            [
                'unidade_id' => 2,
                'materia_id' => 1,
                'enunciado' => 'No parquinho, Lucas começou a jogar pedrinhas na água. Ele jogou 2 pedrinhas no primeiro lago, 3 no segundo lago e 4 no último lago. Quantas pedrinhas Lucas jogou no total? 2 + 3 + 4 = ?',
                'opcao_a' => '8',
                'opcao_b' => '9',
                'opcao_c' => '10',
                'opcao_d' => '11',
                'resposta_correta' => '9'
            ],
            [
                'unidade_id' => 2,
                'materia_id' => 1,
                'enunciado' => 'Durante uma viagem, Marcos estava contando os carros vermelhos na estrada. Ele viu 4 carros vermelhos de manhã, depois viu mais 3 à tarde e 1 à noite. Quantos carros vermelhos Marcos viu ao todo? 4 + 3 + 1 = ?',
                'opcao_a' => '6',
                'opcao_b' => '7',
                'opcao_c' => '8',
                'opcao_d' => '9',
                'resposta_correta' => '8'
            ],
            [
                'unidade_id' => 2,
                'materia_id' => 1,
                'enunciado' => 'Em uma corrida de carrinhos, João trouxe 4 carrinhos para brincar. Seus amigos lhe deram mais 3 carrinhos. Durante a corrida, um dos carrinhos quebrou. Quantos carrinhos João tem agora? 4 + 3 - 1 = ?',
                'opcao_a' => '5',
                'opcao_b' => '6',
                'opcao_c' => '7',
                'opcao_d' => '8',
                'resposta_correta' => '6'
            ],
            [
                'unidade_id' => 2,
                'materia_id' => 1,
                'enunciado' => 'Durante uma tarde de pesca com seu pai, João conseguiu pescar 2 peixes logo no início. Depois de um tempo, ele pescou mais 3 peixes grandes. Antes de irem embora, ele ainda conseguiu pescar mais 2 peixes pequenos. No total, quantos peixes João pescou naquela tarde? 2 + 3 + 2 = ?',
                'opcao_a' => '7',
                'opcao_b' => '8',
                'opcao_c' => '6',
                'opcao_d' => '9',
                'resposta_correta' => '7'
            ],
            [
                'unidade_id' => 2,
                'materia_id' => 1,
                'enunciado' => 'Durante uma viagem escolar, os alunos visitaram uma fazenda de frutas. Na primeira hora, o grupo colheu 3 cestas de maçãs. Na segunda hora, eles conseguiram colher mais 5 cestas de peras. Já no final da tarde, colheram mais 4 cestas de uvas. Quantas cestas de frutas o grupo colheu ao longo do dia? 3 + 5 + 4 = ?',
                'opcao_a' => '10',
                'opcao_b' => '11',
                'opcao_c' => '12',
                'opcao_d' => '13',
                'resposta_correta' => '12'
            ]
        ]);
    }
}
