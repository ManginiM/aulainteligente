<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{   public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
    
    public function horario()
    {
        return $this->belongsTo(Horario::class);
    }
    
    public function docente()
    {
        return $this->belongsTo(Docente::class);
    }
    
    use HasFactory;
}
