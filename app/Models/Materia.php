<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{   
    protected $fillable = [
        'nombre',
        'profesor',
        'aula_id',
        'curso_id',
    ];
    

    // Materia "reserva" un Aula
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }

    // Materia pertenece a un Curso
    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
    use HasFactory;
}
