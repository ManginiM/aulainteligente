<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horario extends Model
{   public function materia()
    {
        return $this->belongsTo(materia::class);
    }
    
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }
    
    use HasFactory;
}
