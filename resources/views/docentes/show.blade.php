<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 py-10 px-6 sm:px-10">
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-blue-900">Detalles del Docente</h1>
            <p class="text-blue-700 mt-1">Información completa de "{{ $docente->nombre }}"</p>
        </div>

        <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-xl p-8">
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Nombre</label>
                <p class="mt-1 text-lg font-semibold text-gray-900">{{ $docente->nombre }}</p>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700">Especialidad</label>
                <p class="mt-1 text-lg font-semibold text-gray-900">{{ $docente->especialidad }}</p>
            </div>

            <div class="mt-8 flex justify-end space-x-4">
                <a href="{{ route('docentes.index') }}" class="text-gray-600 hover:underline">Volver</a>
                <a href="{{ route('docentes.edit', $docente) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg">Editar</a>
            </div>
        </div>
    </div>
</x-app-layout>