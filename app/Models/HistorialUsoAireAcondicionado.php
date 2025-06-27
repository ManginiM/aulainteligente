<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialUsoAireAcondicionado extends Model
{   public function aireAcondicionado()
    {
        return $this->belongsTo(AireAcondicionado::class);
    }
    
    use HasFactory;
}
