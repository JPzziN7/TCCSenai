<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questao extends Model
{
    use HasFactory;

    protected $table = 'questoes';
    protected $fillable = [
        'enunciado',
        'materia_id',
        'unidade_id',
        'opcao_a',
        'opcao_b',
        'opcao_c',
        'opcao_d',
        'resposta_correta',
    ];

    public function materia()
    {
        return $this->belongsTo(Materia::class);
    }

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }
}

