@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 py-10 px-6 sm:px-10">
    <div class="text-center mb-10">
        <h1 class="text-3xl font-extrabold text-blue-900">Detalles de la Materia</h1>
        <p class="text-blue-700 mt-1">Información completa de la materia</p>
    </div>

    <div class="bg-white rounded-2xl shadow-md p-6 md:p-8 max-w-2xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <h2 class="text-xl font-semibold text-blue-800 mb-2">{{ $materia->nombre }}</h2>
                <div class="border-t border-gray-200 pt-4 mt-4"></div>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Carrera</label>
                <p class="text-gray-800">{{ $materia->carrera }}</p>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Año</label>
                <p class="text-gray-800">{{ $materia->año }}</p>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Tipo de Cursada</label>
                <p class="text-gray-800">{{ $materia->tipoCursada }}</p>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Docente</label>
                <p class="text-gray-800">{{ $materia->docente->nombre ?? 'Sin asignar' }} {{ $materia->docente->apellido ?? '' }}</p>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Creado</label>
                <p class="text-gray-800">
                    {{ $materia->created_at ? $materia->created_at->format('d/m/Y H:i') : 'N/A' }}
                </p>
            </div>
            
            <div>
                <label class="block text-sm font-medium text-gray-500 mb-1">Actualizado</label>
                <p class="text-gray-800">
                    {{ $materia->updated_at ? $materia->updated_at->format('d/m/Y H:i') : 'N/A' }}
                </p>
            </div>
        </div>
        
        <div class="mt-8 flex justify-end space-x-4">
            <a href="{{ route('materia.index') }}" 
                class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-200">
                Volver al listado
            </a>
            <a href="{{ route('materia.edit', $materia) }}" 
                class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition duration-200">
                Editar
            </a>
        </div>
    </div>
</div>
@endsection