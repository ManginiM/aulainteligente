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
    
    
    public function disponibilidad()
    {   
        return $this->hasOne(Disponibilidad::class);
    }

    public function cortina()
    {
        return $this->hasOne(Cortina::class);
    }

    public function mueble()
    {   
        return $this->hasOne(Mueble::class);
    }

    public function aireAcondicionado()
    {
        return $this->hasOne(AireAcondicionado::class);
    }

    public function focos()
    {
        return $this->hasMany(Foco::class);
    }

    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    use HasFactory;

}
