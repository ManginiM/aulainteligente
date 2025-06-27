<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{   public function materias()
    {
        return $this->hasMany(Materia::class);
    }
    
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
    
    use HasFactory;
}
