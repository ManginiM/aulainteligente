<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Materia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'carrera',
        'año',
        'tipoCursada',
        'docente_id'
    ];

    public function docente(): BelongsTo
    {
        return $this->belongsTo(Docente::class);
    }
}