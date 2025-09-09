<x-app-layout>
    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white shadow-lg rounded-xl p-6">
                <div class="flex justify-between items-start mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">{{ $materia->nombre }}</h1>
                        <p class="text-gray-600">{{ $materia->carrera }}</p>
                    </div>
                    <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm">
                        {{ $materia->tipoCursada }}
                    </span>
                </div>

                <div class="space-y-4">
                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Año</h3>
                        <p class="mt-1 text-gray-900">{{ $materia->año }}° año</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Fecha de creación</h3>
                        <p class="mt-1 text-gray-900">{{ optional($materia->created_at)->format('d/m/Y H:i') ?? 'No disponible' }}</p>
                    </div>

                    <div>
                        <h3 class="text-sm font-medium text-gray-500">Última actualización</h3>
                        <p class="mt-1 text-gray-900">{{ $materia->updated_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>

                <div class="mt-8 flex justify-end space-x-3">
                    <a href="{{ route('materia.edit', $materia) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                        Editar
                    </a>
                    <form action="{{ route('materia.destroy', $materia) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700" onclick="return confirm('¿Estás seguro de eliminar esta materia?')">
                            Eliminar
                        </button>
                    </form>
                    <a href="{{ route('materia.index') }}" class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        Volver al listado
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>