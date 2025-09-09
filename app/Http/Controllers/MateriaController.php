<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Docente;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index()
    {
        $materias = Materia::with('docente')->paginate(10);
        return view('materia.index', compact('materias')); // ✅ Corregido
    }

    public function create()
    {
        $docentes = Docente::all();
        return view('materia.create', compact('docentes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'carrera' => 'required|in:Ciclo Basico,Ciclo Orientado',
            'año' => 'required|integer|min:1|max:6',
            'tipoCursada' => 'required|in:Presencial,Virtual,Híbrida',
            'docente_id' => 'required|exists:docentes,id'
        ]);

        Materia::create($request->all());

        return redirect()->route('materia.index') 
            ->with('success', 'Materia creada exitosamente.');
    }

    public function show($id)
{
    $materia = Materia::with('docente')->findOrFail($id);
    return view('materia.show', compact('materia'));
}

    public function edit($id)
    {
        $materia = Materia::findOrFail($id);
        $docentes = Docente::all();
        return view('materia.edit', compact('materia', 'docentes'));
    }

    public function update(Request $request, $id)
    {
        $materia = Materia::findOrFail($id);
        
        $request->validate([
            'nombre' => 'required|string|max:255',
            'carrera' => 'required|in:Ciclo Basico,Ciclo Orientado',
            'año' => 'required|integer|min:1|max:6',
            'tipoCursada' => 'required|in:Presencial,Virtual,Híbrida',
            'docente_id' => 'required|exists:docentes,id'
        ]);
    
        $materia->update($request->all());
    
        return redirect()->route('materia.index')
            ->with('success', 'Materia actualizada exitosamente.');
    }

    public function destroy($id)
{
    $materia = Materia::findOrFail($id);
    $materia->delete();

    return redirect()->route('materia.index')
        ->with('success', 'Materia eliminada exitosamente.');
}
}