@extends('layouts.app')

@section('content')
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 py-10 px-6 sm:px-10">
                <div class="text-center mb-10">
                    <h1 class="text-3xl font-extrabold text-blue-900">Editar Materia</h1>
                    <p class="text-blue-700 mt-1">Modifique los datos de la materia</p>
                </div>

                <div class="bg-white rounded-2xl shadow-md p-6 md:p-8 max-w-2xl mx-auto">
                    <form action="{{ route('materia.update', $materia) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $materia->nombre) }}" 
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('nombre') border-red-500 @enderror"
                                    required>
                                @error('nombre')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="carrera" class="block text-sm font-medium text-gray-700 mb-1">Carrera</label>
                                <select name="carrera" id="carrera" 
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('carrera') border-red-500 @enderror" required>
                                    <option value="">Seleccione una carrera</option>
                                    <option value="Ciclo Basico" {{ old('carrera', $materia->carrera) == 'Ciclo Basico' ? 'selected' : '' }}>Ciclo Básico</option>
                                    <option value="Ciclo Orientado" {{ old('carrera', $materia->carrera) == 'Ciclo Orientado' ? 'selected' : '' }}>Ciclo Orientado</option>
                                </select>
                                @error('carrera')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="año" class="block text-sm font-medium text-gray-700 mb-1">Año</label>
                                <input type="number" name="año" id="año" value="{{ old('año', $materia->año) }}" min="1" max="6"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('año') border-red-500 @enderror"
                                    required>
                                @error('año')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div>
                                <label for="tipoCursada" class="block text-sm font-medium text-gray-700 mb-1">Tipo de Cursada</label>
                                <select name="tipoCursada" id="tipoCursada" 
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('tipoCursada') border-red-500 @enderror" required>
                                    <option value="">Seleccione tipo de cursada</option>
                                    <option value="Presencial" {{ old('tipoCursada', $materia->tipoCursada) == 'Presencial' ? 'selected' : '' }}>Presencial</option>
                                    <option value="Virtual" {{ old('tipoCursada', $materia->tipoCursada) == 'Virtual' ? 'selected' : '' }}>Virtual</option>
                                    <option value="Híbrida" {{ old('tipoCursada', $materia->tipoCursada) == 'Híbrida' ? 'selected' : '' }}>Híbrida</option>
                                </select>
                                @error('tipoCursada')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="md:col-span-2">
                                <label for="docente_id" class="block text-sm font-medium text-gray-700 mb-1">Docente</label>
                                <select name="docente_id" id="docente_id" 
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('docente_id') border-red-500 @enderror" required>
                                    <option value="">Seleccione un docente</option>
                                    @foreach($docentes as $docente)
                                        <option value="{{ $docente->id }}" {{ old('docente_id', $materia->docente_id) == $docente->id ? 'selected' : '' }}>
                                            {{ $docente->nombre }} {{ $docente->apellido }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('docente_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mt-8 flex justify-end space-x-4">
                            <a href="{{ route('materia.index') }}" 
                                class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400 transition duration-200">
                                Cancelar
                            </a>
                            <button type="submit" 
                                class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                                Actualizar Materia
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection