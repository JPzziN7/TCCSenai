<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licao extends Model
{
    use HasFactory;

    protected $table = 'licoes'; // Confirme se este nome está correto
    protected $fillable = ['nome', 'unidade_id','materia_id'];
    public function unidade()
    {
        return $this->belongsTo(Unidade::class); // Relaciona a lição à unidade
    }
    public function materia()
    {
    return $this->belongsTo(Materia::class);
    }
}
