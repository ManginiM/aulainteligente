<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{   protected $fillable = ['nombre'];

    // Un Curso tiene muchas materia
    public function materia()
    {
        return $this->hasMany(materia::class);
    }
    use HasFactory;
}
