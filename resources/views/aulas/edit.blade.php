<x-app-layout>
    <!-- Estilos -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 py-10 px-6 sm:px-10">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-blue-900">Editar Aula</h1>
            <p class="text-blue-700 mt-1">Modificá los datos del aula "{{ $aula->nombre }}"</p>
        </div>

        <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-xl p-8">
            <form action="{{ route('aulas.update', $aula) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Mostrar errores si hay -->
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-100 border border-red-300 text-red-700 rounded-lg">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Nombre -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" name="nombre" value="{{ old('nombre', $aula->nombre) }}" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <!-- Capacidad -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Capacidad</label>
                    <input type="number" name="capacidad" value="{{ old('capacidad', $aula->capacidad) }}" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                </div>

                <!-- Temperatura -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Temperatura (°C)</label>
                    <input type="number" name="temperatura" step="0.1" value="{{ old('temperatura', $aula->temperatura) }}"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                </div>

                <!-- Posición cortinas -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Posición Cortinas</label>
                    <input type="text" name="posicion_cortinas" value="{{ old('posicion_cortinas', $aula->posicion_cortinas) }}"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                </div>

                <!-- Stock roto -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Stock Roto</label>
                    <input type="number" name="stock_roto" value="{{ old('stock_roto', $aula->stock_roto) }}"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                </div>

                <!-- Mesas disponibles -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Mesas Disponibles</label>
                    <input type="number" name="mesas_disponibles" value="{{ old('mesas_disponibles', $aula->mesas_disponibles) }}"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                </div>

                <!-- Sillas disponibles -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Sillas Disponibles</label>
                    <input type="number" name="sillas_disponibles" value="{{ old('sillas_disponibles', $aula->sillas_disponibles) }}"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                </div>

                <!-- Intensidad luz -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Intensidad de Luz</label>
                    <input type="number" min="1" max="10" required name="intensidad_luz" value="{{ old('intensidad_luz', $aula->intensidad_luz) }}"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                </div>

                <!-- Estado proyector -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Estado del Proyector</label>
                    <input type="text" name="estado_proyector" value="{{ old('estado_proyector', $aula->estado_proyector) }}"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm">
                </div>

                <!-- Botones -->
                <div class="flex justify-between items-center mt-6">
                    <a href="{{ route('aulas.index') }}"
                       class="text-blue-600 hover:underline text-sm flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i> Volver al listado
                    </a>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow">
                        <i class="fas fa-save mr-2"></i> Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>