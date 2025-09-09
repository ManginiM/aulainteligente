<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Aula Inteligente</title>

    <!-- Tailwind CSS desde CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Alpine.js para dropdowns -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    <style>
        /* Estilos para el dropdown */
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="font-sans antialiased bg-blue-50 min-h-screen">
    <!-- Barra de navegación -->
    <nav class="bg-blue-600 border-b border-blue-800 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ url('/home') }}" class="flex items-center">
                        <span class="text-white text-lg font-bold">Aula Inteligente</span>
                    </a>
                </div>

                <!-- Menú de usuario -->
                @if (Auth::check())
                    <div class="flex items-center sm:ml-6" x-data="{ open: false }">
                        <button @click="open = !open" class="inline-flex items-center px-3 py-2 text-sm text-white hover:text-blue-200 focus:outline-none">
                            {{ Auth::user()->name }}
                            <svg class="ml-2 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>

                        <!-- Dropdown Menu -->
                        <div x-show="open" @click.away="open = false" class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50" style="display: none;">
                            <div class="py-1" role="menu" aria-orientation="vertical">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem">
                                        {{ __('Cerrar sesión') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </nav>

    <!-- Contenido principal - SIN CONTENEDOR ESTRECHO -->
    <main class="flex-1">
        @yield('content')
    </main>
</body>
</html>