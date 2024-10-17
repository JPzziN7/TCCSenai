<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlunoLicao extends Model
{
    use HasFactory;

    use HasFactory;

    // Defina o nome correto da tabela para evitar o problema de pluralização
    protected $table = 'aluno_licao';

    // Adicione os campos que podem ser preenchidos
    protected $fillable = ['aluno_id', 'licao_id', 'completa', 'liberada'];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class); // Relacionamento com a model Aluno
    }

    public function licao()
    {
        return $this->belongsTo(Licao::class); // Relacionamento com a model Licao
    }
}
