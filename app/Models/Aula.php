<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    protected $fillable = [
        'nombre',
        'capacidad',
        'temperatura',
        'posicion_cortinas',
        'stock_roto',
        'mesas_disponibles',
        'sillas_disponibles',
        'intensidad_luz',
        'estado_proyector',
    ];
    
    // Un Aula puede ser reservada por muchas Materias
    public function materias()
    {
        return $this->hasMany(Materia::class);
    }
    use HasFactory;

}
