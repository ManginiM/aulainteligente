<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index()
    {
        $docentes = Docente::paginate(10);
        return view('docentes.index', compact('docentes'));
    }

    public function create()
{
    $especialidades = [
        'Matematicas' => 'Matemáticas',
        'Lengua'    => 'Lengua',
        'Quimica'    => 'Quimica',
        'Fisica'    => 'Fisica',
        'Robotica'    => 'Robotica',
        'Historia'    => 'Historia',
        'Ingles'      => 'Inglés',
        'Educacion_fisica' => 'Educación Física',
    ];

    return view('docentes.create', compact('especialidades'));
}

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
        ]);

        Docente::create($request->all());

        return redirect()->route('docentes.index')->with('success', 'Docente creado correctamente.');
    }

    public function show(Docente $docente)
    {
        return view('docentes.show', compact('docente'));
    }

    public function edit(Docente $docente)
{
    return view('docentes.edit', compact('docente'));
}

    public function update(Request $request, Docente $docente)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
        ]);

        $docente->update($request->all());

        return redirect()->route('docentes.index')->with('success', 'Docente actualizado correctamente.');
    }

    public function destroy(Docente $docente)
    {
        $docente->delete();
        return redirect()->route('docentes.index')->with('success', 'Docente eliminado correctamente.');
    }
}