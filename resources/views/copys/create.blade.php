<x-app-layout>
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white shadow-lg rounded-xl p-6">
                <h1 class="text-2xl font-bold text-gray-900 mb-6">Crear Nueva materia</h1>

                <form action="{{ route('materia.store') }}" method="POST">
                    @csrf

                    <!-- Carrera -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Carrera</label>
                        <select name="carrera" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            @foreach($carreras as $carrera)
                                <option value="{{ $carrera }}">{{ $carrera }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Nombre -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                        <input type="text" name="nombre" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Año -->
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Año</label>
                        <input type="number" name="año" min="1" max="5" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Tipo de Cursada -->
                    <div class="mb-6">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tipo de Cursada</label>
                        <select name="tipoCursada" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            @foreach($tiposCursada as $tipo)
                                <option value="{{ $tipo }}">{{ $tipo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Botones -->
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('materia.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                            Cancelar
                        </a>
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                            Guardar materia
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>