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
    

    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    use HasFactory;
}
