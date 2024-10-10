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
            $table->foreignId('unidade_id')->constrained('unidades')->onDelete('cascade'); // Relaciona a unidade
            $table->timestamps();
        });

    }

    public function down()
    {
        Schema::dropIfExists('licoes');
    }
};
