<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoLicaoTable extends Migration
{
    public function up()
    {
        Schema::create('aluno_licao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('aluno_id')->constrained()->onDelete('cascade');
            $table->foreignId('licao_id')->constrained('licoes')->onDelete('cascade'); // Use 'licoes' aqui
            $table->boolean('completa')->default(false);
            $table->boolean('liberada')->default(false);
            $table->timestamps();
        });        
    }

    public function down()
    {
        Schema::dropIfExists('aluno_licao');
    }
}
