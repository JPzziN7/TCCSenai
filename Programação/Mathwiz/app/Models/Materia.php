<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

    // Permitir atribuição em massa para o campo 'nome'
    protected $fillable = ['nome'];

    // Relacionamento com a tabela 'unidades'
    public function unidades()
    {
        return $this->hasMany(Unidade::class);
    }
}
