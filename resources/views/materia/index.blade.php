@extends('layouts.app')

@section('content')
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 py-10 px-6 sm:px-10">
            <div class="text-center mb-10">
                <h1 class="text-3xl font-extrabold text-blue-900">Gestión de Materias</h1>
                <p class="text-blue-700 mt-1">Listado de materias registradas</p>
            </div>
            <div class="flex justify-between items-center mb-8">
                <a href="{{ route('materia.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700">
                    <i class="fas fa-plus mr-2"></i> Nueva Materia
                </a>
            </div>

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto bg-white rounded-2xl shadow-md">
                <table class="min-w-full text-sm text-left text-gray-800">
                    <thead class="bg-blue-700 text-xs uppercase">
                        <tr class="text-white">
                            <th class="px-4 py-3">Nombre</th>
                            <th class="px-4 py-3">Carrera</th>
                            <th class="px-2 py-3">Año</th>
                            <th class="px-4 py-3">Tipo de Cursada</th>
                            <th class="px-4 py-3">Docente</th>
                            <th class="px-4 py-3 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($materias as $materia)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <td class="px-4 py-4">{{ $materia->nombre }}</td>
                            <td class="px-4 py-4">{{ $materia->carrera }}</td>
                            <td class="px-4 py-4">{{ $materia->año }}</td>
                            <td class="px-4 py-4">{{ $materia->tipoCursada }}</td>
                            <td class="px-4 py-4">{{ $materia->docente->nombre ?? 'Sin asignar' }}</td>
                            <td class="px-4 py-4 text-center">
                                <a href="{{ route('materia.show', $materia) }}" class="text-blue-600 hover:text-blue-800 mr-3" title="Ver">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('materia.edit', $materia) }}" class="text-yellow-600 hover:text-yellow-800 mr-3" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('materia.destroy', $materia) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar esta materia?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $materias->links() }}
            </div>
        </div>
    </div>
    @endsection
