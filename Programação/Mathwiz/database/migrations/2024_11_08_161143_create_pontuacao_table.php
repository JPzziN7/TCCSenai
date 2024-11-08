<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePontuacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pontuacao', function (Blueprint $table) {
            $table->id(); // Cria um campo id auto-incremental
            $table->foreignId('aluno_id') // Cria a coluna para o id do aluno
                  ->constrained('alunos') // Referencia a tabela 'alunos'
                  ->onDelete('cascade'); // Apaga a pontuação se o aluno for excluído
            $table->integer('pontuacao')->default(0); // Coluna para a pontuação
            $table->timestamps(); // Timestamps (created_at e updated_at)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pontuacao');
    }
}
