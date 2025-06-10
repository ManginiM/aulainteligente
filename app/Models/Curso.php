<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{   protected $fillable = ['nombre'];

    // Un Curso tiene muchas Materias
    public function materias()
    {
        return $this->hasMany(Materia::class);
    }
    use HasFactory;
}
