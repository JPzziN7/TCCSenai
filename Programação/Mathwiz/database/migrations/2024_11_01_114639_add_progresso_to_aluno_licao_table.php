<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProgressoToAlunoLicaoTable extends Migration
{
    public function up()
    {
        Schema::table('aluno_licao', function (Blueprint $table) {
            $table->integer('progresso')->default(0);
        });
    }

    public function down()
    {
        Schema::table('aluno_licao', function (Blueprint $table) {
            $table->dropColumn('progresso');
        });
    }
}
