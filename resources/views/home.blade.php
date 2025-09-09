@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 py-10 px-4 sm:px-6 lg:px-8">
    <!-- Encabezado -->
    <div class="text-center mb-12">
        <h1 class="text-4xl font-extrabold text-blue-900 drop-shadow-sm">Aula Inteligente</h1>
        <p class="text-blue-700 mt-2 text-lg">Sistema de gestión integral</p>
    </div>

    <!-- Tarjetas de módulos -->
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @php
            $modulos = [
                'Aulas' => ['icono' => 'door-open', 'ruta' => 'aulas.index'],
                'Docentes' => ['icono' => 'chalkboard-teacher', 'ruta' => 'docentes.index'],
                'Materias' => ['icono' => 'book', 'ruta' => 'materia.index'],
                'Reservas' => ['icono' => 'calendar-alt', 'ruta' => 'reservas.index'],
                'Cortinas' => ['icono' => 'window-restore', 'ruta' => 'cortinas.index'],
                'Focos' => ['icono' => 'lightbulb', 'ruta' => 'focos.index'],
                'Aires' => ['icono' => 'snowflake', 'ruta' => 'aireacondicionado.index'],
                'Muebles' => ['icono' => 'chair', 'ruta' => 'muebles.index'],
                'Disponibilidad' => ['icono' => 'calendar-check', 'ruta' => 'disponibilidad.index'],
                'Horarios' => ['icono' => 'clock', 'ruta' => 'horarios.index'],
            ];
        @endphp

        @foreach($modulos as $nombre => $modulo)
            <div class="bg-white border border-blue-100 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 p-6 transform hover:-translate-y-1">
                <div class="flex items-center gap-4 mb-4">
                    <div class="bg-blue-100 p-4 rounded-full shadow-inner">
                        <i class="fas fa-{{ $modulo['icono'] }} text-blue-600 text-2xl"></i>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-blue-900">{{ $nombre }}</h3>
                    </div>
                </div>
                <div class="mt-4">
                    <a href="{{ route($modulo['ruta']) }}"
                       class="w-full flex items-center justify-center gap-2 px-4 py-3 text-base font-medium text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 rounded-xl shadow-md transition-all duration-200 transform hover:scale-105">
                        Acceder <i class="fas fa-arrow-right text-sm"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pie de página -->
    <footer class="mt-16 text-center text-gray-600">
        <p class="text-sm">© {{ date('Y') }} Aula Inteligente — Proyecto Laravel®</p>
        <p class="mt-1 text-xs text-gray-400">Ministerio de Educación</p>
    </footer>
</div>
@endsection
