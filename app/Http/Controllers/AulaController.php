<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use Illuminate\Http\Request;

class AulaController extends Controller
{
    public function index()
    {
        $aulas = Aula::paginate(10);
        return view('aulas.index', compact('aulas'));
    }

    public function create()
    {
        return view('aulas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'capacidad' => 'required|integer|min:1',
            'temperatura' => 'nullable|integer',
            'posicion_cortinas' => 'nullable|string|max:255',
            'stock_roto' => 'nullable|integer|min:0',
            'mesas_disponibles' => 'nullable|integer|min:0',
            'sillas_disponibles' => 'nullable|integer|min:0',
            'intensidad_luz' => 'nullable|integer|min:0|max:100',
            'estado_proyector' => 'nullable|string|max:255',
        ]);

        Aula::create($request->all()); // ✅ Una sola vez

        return redirect()->route('aulas.index')->with('success', 'Aula creada correctamente.');
    }

    public function edit(Aula $aula)
    {
        return view('aulas.edit', compact('aula'));
    }
    
    public function show(Aula $aula)
{
    return view('aulas.show', compact('aula'));
}
    public function update(Request $request, Aula $aula)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'capacidad' => 'required|integer|min:1',
            'temperatura' => 'nullable|integer',
            'posicion_cortinas' => 'nullable|string|max:255',
            'stock_roto' => 'nullable|integer|min:0',
            'mesas_disponibles' => 'nullable|integer|between:0,10',
            'sillas_disponibles' => 'nullable|integer|min:0',
            'intensidad_luz' => 'nullable|integer|between:1,10',
            'estado_proyector' => 'nullable|string|max:255',
        ]);

        // ✅ Eliminado el create() incorrecto
        $aula->update($request->all());

        return redirect()->route('aulas.index')->with('success', 'Aula actualizada correctamente.');
    }

    public function destroy(Aula $aula)
    {
        $aula->delete();
        return redirect()->route('aulas.index')->with('success', 'Aula eliminada correctamente.');
    }
}