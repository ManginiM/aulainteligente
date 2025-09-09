@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 py-10 px-6 sm:px-10">
    <div class="text-center mb-10">
        <h1 class="text-3xl font-extrabold text-blue-900">Gestión de Docentes</h1>
        <p class="text-blue-700 mt-1">Listado de docentes registrados</p>
    </div>

    <div class="max-w-4xl mx-auto">
        <!-- Botón Crear -->
        <div class="mb-6 text-right">
            <a href="{{ route('docentes.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg shadow inline-flex items-center">
                <i class="fas fa-plus-circle mr-2"></i> Nuevo Docente
            </a>
        </div>

        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Tabla -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-600 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-bold uppercase">Nombre</th>
                        <th class="px-6 py-3 text-left text-sm font-bold uppercase">Especialidad</th>
                        <th class="px-6 py-3 text-right text-sm font-bold uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($docentes as $docente)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $docente->nombre }}</td>
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $docente->especialidad }}</td>
                            <td class="px-6 py-4 text-right space-x-2 text-sm">
                                <a href="{{ route('docentes.edit', $docente) }}" class="text-yellow-600 hover:text-yellow-800">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('docentes.destroy', $docente) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('¿Estás seguro de eliminar este docente?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    
                    @if ($docentes->isEmpty())
                        <tr>
                            <td colspan="3" class="text-center px-6 py-6 text-blue-500">No hay docentes registrados.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Paginación -->
        <div class="mt-6">
            {{ $docentes->links() }}
        </div>
    </div>
</div>
@endsection