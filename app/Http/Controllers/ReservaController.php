<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\Aula;
use App\Models\Docente;

class ReservaController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function create()
{
    $aulas = Aula::all();      // Para el select de aulas
    $docentes = Docente::all(); // Para el select de docentes

    return view('reservas.create', compact('aulas', 'docentes'));
}
}


