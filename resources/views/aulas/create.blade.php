@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 py-10 px-6 sm:px-10">
    <div class="text-center mb-10">
        <h1 class="text-3xl font-extrabold text-blue-900">Agregar Nueva Aula</h1>
        <p class="text-blue-700 mt-1">Completá los siguientes campos para registrar un aula</p>
    </div>

    <!-- Formulario -->
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-8">
        <form action="{{ route('aulas.store') }}" method="POST">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nombre -->
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" name="nombre" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Capacidad -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Capacidad</label>
                    <input type="number" name="capacidad" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                </div>

                <!-- Temperatura -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Temperatura (°C)</label>
                    <input type="number" name="temperatura" step="0.1"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                </div>

                <!-- Posición cortinas -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Posición Cortinas</label>
                    <input type="text" name="posicion_cortinas"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                </div>

                <!-- Stock roto -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Stock Roto</label>
                    <input type="number" name="stock_roto"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                </div>

                <!-- Mesas disponibles -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Mesas Disponibles</label>
                    <input type="number" name="mesas_disponibles"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                </div>

                <!-- Sillas disponibles -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Sillas Disponibles</label>
                    <input type="number" name="sillas_disponibles"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                </div>

                <!-- Intensidad luz -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Intensidad de Luz</label>
                    <input type="number" min="1" max="10" name="intensidad_luz"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                </div>

                <!-- Estado proyector -->
                <div>
                    <label class="block text-sm font-medium text-gray-700">Estado del Proyector</label>
                    <input type="text" name="estado_proyector"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                </div>
            </div>

            <!-- Botones -->
            <div class="flex justify-between items-center mt-6">
                <a href="{{ route('aulas.index') }}"
                   class="text-blue-600 hover:underline text-sm flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Volver al listado
                </a>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow">
                    <i class="fas fa-save mr-2"></i> Guardar Aula
                </button>
            </div>
        </form>
    </div>
</div>
@endsection