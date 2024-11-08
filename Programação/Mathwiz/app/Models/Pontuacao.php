<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pontuacao extends Model
{
    use HasFactory;

    // Define o nome da tabela (se for diferente da convenção pluralizada)
    protected $table = 'pontuacao';

    // Define os campos que podem ser atribuídos em massa
    protected $fillable = [
        'aluno_id',
        'pontuacao',
    ];

    // Relacionamento com o aluno
    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }
}
