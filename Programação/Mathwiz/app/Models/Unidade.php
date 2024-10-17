<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    use HasFactory;

    // Permitir que o campo 'nome' seja preenchido automaticamente
    protected $fillable = ['nome', 'materia_id'];
    public function materia()
{
    return $this->belongsTo(Materia::class);
}

}