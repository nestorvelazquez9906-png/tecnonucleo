<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TecnoNúcleo') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Google Fonts Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;900&display=swap" rel="stylesheet">
    <style>body { font-family: 'Inter', sans-serif; }</style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-900 min-h-screen flex flex-col">

    {{-- ============ HEADER PERSONALIZADO (AHORA BLANCO) ============ --}}
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            
            {{-- LOGO EXTENDIDO EN EL HEADER --}}
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ asset('images/logo-horizontal.png') }}" 
                     alt="TecnoNúcleo" 
                     class="h-12 w-auto object-contain transition-transform hover:scale-105">
            </a>

            <nav class="hidden md:flex items-center space-x-6">
                {{-- Enlaces de navegación con texto oscuro --}}
                <a href="{{ route('home') }}" class="text-gray-700 font-semibold hover:text-blue-600 transition">Inicio</a>
                <a href="{{ route('productos') }}" class="text-gray-700 font-semibold hover:text-blue-600 transition">Productos</a>
                <a href="{{ route('contacto') }}" class="text-gray-700 font-semibold hover:text-blue-600 transition">Contacto</a>
                
                @auth
                    @if(auth()->user()->rol === 'admin')
                        <a href="{{ route('productos.crear') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg font-semibold transition">
                            + Nuevo Producto
                        </a>
                    @endif
                    
                    {{-- Menú de Usuario Logueado --}}
                    <div class="flex items-center gap-4 ml-6 border-l border-gray-300 pl-6">
                        <span class="text-sm font-bold text-blue-600">👤 {{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-gray-500 hover:text-red-500 transition font-semibold">Cerrar Sesión</button>
                        </form>
                    </div>
                @else
                    {{-- Botones de Invitado --}}
                    <div class="flex items-center gap-4 ml-6 border-l border-gray-300 pl-6">
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 hover:text-blue-600 transition font-semibold">Iniciar Sesión</a>
                        <a href="{{ route('register') }}" class="bg-slate-900 text-white hover:bg-slate-800 px-4 py-2 rounded-lg font-bold transition">Registrarse</a>
                    </div>
                @endauth
            </nav>
        </div>
    </header>

    {{-- ============ CONTENIDO DE LA PÁGINA ============ --}}
    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- ============ FOOTER PERSONALIZADO ============ --}}
    {{-- Dejamos el footer oscuro para que haga contraste con la página --}}
    <footer class="bg-slate-900 text-gray-400 py-10 mt-20">
        <div class="container mx-auto px-6 grid md:grid-cols-3 gap-8">
            <div>
                {{-- Para el footer, si el logo es azul oscuro, no se verá bien. 
                     Podrías poner una versión blanca del logo aquí, o dejarlo así si el fondo es claro --}}
                <div class="mb-4 bg-white inline-block p-2 rounded-lg">
                    <img src="{{ asset('images/logo-horizontal.png') }}" 
                         alt="TecnoNúcleo" 
                         class="h-10 w-auto object-contain">
                </div>
                <p class="text-sm mt-2">El núcleo de tu tecnología. Los mejores productos electrónicos al mejor precio.</p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-3">Categorías</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-cyan-400 transition">Celulares</a></li>
                    <li><a href="#" class="hover:text-cyan-400 transition">Laptops</a></li>
                    <li><a href="#" class="hover:text-cyan-400 transition">Audífonos</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-3">Contacto</h4>
                <p class="text-sm">contacto@tecnonucleo.com</p>
                <p class="text-sm">+52 55 1234 5678</p>
            </div>
        </div>
        <div class="border-t border-slate-800 mt-8 pt-6 text-center text-sm">
            © 2026 TecnoNúcleo — Todos los derechos reservados
        </div>
    </footer>

</body>
</html>