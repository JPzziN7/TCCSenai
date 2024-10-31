<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('licoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('materia_id');
            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades')->onDelete('cascade');
            $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');        
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('licoes');
    }
};
