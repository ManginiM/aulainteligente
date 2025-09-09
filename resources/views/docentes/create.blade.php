<x-app-layout>
    <!-- CDNs sin espacios (¡importante!) -->
    
    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 py-10 px-6 sm:px-10">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-blue-900">Agregar Docente</h1>
            <p class="text-blue-700 mt-1">Completa los campos para registrar un nuevo docente</p>
        </div>

        <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-xl p-8">
            <!-- Mostrar errores si hay -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 border border-red-300 text-red-700 rounded-lg">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif old

            <!-- Formulario de creación -->
            <form action="{{ route('docentes.store') }}" method="POST">
                @csrf

                <!-- Nombre -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Especialidad</label>
                    <select name="especialidad" required class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled {{ old('especialidad') == '' ? 'selected' : '' }}>
                            Selecciona una especialidad
                        </option>
                        @foreach($especialidades as $value => $label)
                            <option value="{{ $value }}" {{ old('especialidad') == $value ? 'selected' : '' }}>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- Botones -->
                <div class="flex justify-between items-center mt-6">
                    <a href="{{ route('docentes.index') }}"
                       class="text-blue-600 hover:underline text-sm flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i> Volver al listado
                    </a>
                    <button type="submit"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow flex items-center">
                        <i class="fas fa-save mr-2"></i> Guardar Docente
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>