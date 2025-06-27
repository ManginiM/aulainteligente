<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialFoco extends Model
{   public function foco()
    {
        return $this->belongsTo(Foco::class);
    }
    
    use HasFactory;
}
