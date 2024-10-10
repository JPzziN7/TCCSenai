<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlunoLicao extends Model
{
    use HasFactory;

    protected $fillable = ['aluno_id', 'licao_id', 'completa', 'liberada']; // Adicione os campos que podem ser preenchidos

    public function aluno()
    {
        return $this->belongsTo(Aluno::class); // Relacionamento com a model Aluno
    }

    public function licao()
    {
        return $this->belongsTo(Licao::class); // Relacionamento com a model Licao
    }
}
