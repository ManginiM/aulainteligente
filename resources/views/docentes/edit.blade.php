<x-app-layout>
    <!-- Incluir Tailwind CSS y Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 py-10 px-6 sm:px-10">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-blue-900">Editar Materia</h1>
            <p class="text-blue-700 mt-1">Modificá los datos de "{{ $materia->nombre }}"</p>
        </div>

        <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-xl p-8">
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100 border border-red-300 text-red-700 rounded-lg">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('materia.update', $materia) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nombre -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" name="nombre" value="{{ old('nombre', $materia->nombre) }}" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('nombre')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Carrera -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Carrera</label>
                    <select name="carrera" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @foreach($carreras as $carrera)
                            <option value="{{ $carrera }}" {{ $materia->carrera == $carrera ? 'selected' : '' }}>
                                {{ $carrera }}
                            </option>
                        @endforeach
                    </select>
                    @error('carrera')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Año -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Año</label>
                    <input type="number" name="año" value="{{ old('año', $materia->año) }}" min="1" max="5" required
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                    @error('año')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tipo de Cursada -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Tipo de Cursada</label>
                    <select name="tipoCursada" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        @foreach($tiposCursada as $tipo)
                            <option value="{{ $tipo }}" {{ $materia->tipoCursada == $tipo ? 'selected' : '' }}>
                                {{ $tipo }}
                            </option>
                        @endforeach
                    </select>
                    @error('tipoCursada')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Docente -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Docente</label>
                    <select name="docente_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Seleccionar docente...</option>
                        @foreach($docentes as $docente)
                            <option value="{{ $docente->id }}" {{ $materia->docente_id == $docente->id ? 'selected' : '' }}>
                                {{ $docente->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('docente_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Botones -->
                <div class="flex justify-between items-center mt-6">
                    <a href="{{ route('materia.index') }}"
                       class="text-blue-600 hover:underline text-sm flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i> Volver al listado
                    </a>
                    <div class="space-x-3">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow flex items-center">
                            <i class="fas fa-save mr-2"></i> Actualizar Materia
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>