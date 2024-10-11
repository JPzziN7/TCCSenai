<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        if (!Schema::hasTable('unidades')) {
            Schema::create('unidades', function (Blueprint $table) {
                $table->id();
                $table->string('nome');
                $table->unsignedBigInteger('materia_id')->default(1);
                $table->foreign('materia_id')->references('id')->on('materias')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

   
    public function down(): void
    {
        Schema::dropIfExists('unidades');
    }
};
