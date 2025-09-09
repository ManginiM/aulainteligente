@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 py-10 px-6 sm:px-10">
    <!-- Encabezado -->
    <div class="text-center mb-10">
        <h1 class="text-3xl font-extrabold text-blue-900">Gestión de Aulas</h1>
        <p class="text-blue-700 mt-1">Listado de aulas registradas</p>
    </div>
    
    <div class="flex justify-between items-center mb-8">
        <a href="{{ route('aulas.create') }}"
           class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700">
            <i class="fas fa-plus mr-2"></i> Nueva Aula
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabla -->
    <div class="overflow-x-auto bg-white rounded-2xl shadow-md">
        <table class="min-w-full text-sm text-left text-gray-800">
            <thead class="bg-blue-700 text-white text-xs uppercase">
                <tr>
                    <th class="px-4 py-3 text-left">Nombre</th>
                    <th class="px-4 py-3 text-left">Capacidad</th>
                    <th class="px-4 py-3 text-left">Temperatura</th>
                    <th class="px-4 py-3 text-left">Cortinas</th>
                    <th class="px-4 py-3 text-left">Stock roto</th>
                    <th class="px-4 py-3 text-left">Mesas</th>
                    <th class="px-4 py-3 text-left">Sillas</th>
                    <th class="px-4 py-3 text-left">Luz</th>
                    <th class="px-4 py-3 text-left">Proyector</th>
                    <th class="px-4 py-3 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-blue-100">
                @foreach ($aulas as $aula)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $aula->nombre }}</td>
                        <td class="px-6 py-4">{{ $aula->capacidad }}</td>
                        <td class="px-6 py-4">{{ $aula->temperatura ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ $aula->posicion_cortinas ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ $aula->stock_roto ?? '0' }}</td>
                        <td class="px-6 py-4">{{ $aula->mesas_disponibles ?? '0' }}</td>
                        <td class="px-6 py-4">{{ $aula->sillas_disponibles ?? '0' }}</td>
                        <td class="px-6 py-4">{{ $aula->intensidad_luz ?? 'N/A' }}</td>
                        <td class="px-6 py-4">{{ $aula->estado_proyector ?? 'N/A' }}</td>
                        <td class="px-4 py-4 text-center space-x-2">
                            <a href="{{ route('aulas.edit', $aula) }}" class="text-yellow-600 hover:text-yellow-800" title="Editar">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('aulas.destroy', $aula) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800" title="Eliminar" onclick="return confirm('¿Estás seguro de eliminar esta aula?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                
                @if ($aulas->isEmpty())
                    <tr>
                        <td colspan="10" class="text-center px-6 py-6 text-blue-500">No hay aulas registradas.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-6">
        {{ $aulas->links() }}
    </div>
</div>
@endsection