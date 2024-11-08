<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlunoQuestao extends Model
{
    use HasFactory;

    protected $table = 'aluno_questao';
    protected $fillable = ['aluno_id', 'questao_id'];
}
