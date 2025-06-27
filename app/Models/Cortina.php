<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cortina extends Model
{   // Ejemplo: app/Models/Disponibilidad.php
    public function aula()
    {
        return $this->belongsTo(Aula::class);
    }
    
    use HasFactory;
}
