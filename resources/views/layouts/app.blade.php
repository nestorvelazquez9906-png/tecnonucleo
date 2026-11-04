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

    {{-- ============ HEADER PERSONALIZADO ============ --}}
    <header class="bg-slate-900 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="flex items-center gap-2 text-2xl font-black tracking-tight">
                <span class="bg-gradient-to-br from-cyan-400 to-blue-600 text-white p-2 rounded-xl">⚡</span>
                Tecno<span class="text-cyan-400">Núcleo</span>
            </a>

            <nav class="hidden md:flex items-center space-x-6">
                <a href="{{ route('home') }}" class="hover:text-cyan-400 transition">Inicio</a>
                <a href="{{ route('productos') }}" class="hover:text-cyan-400 transition">Productos</a>
                <a href="{{ route('contacto') }}" class="hover:text-cyan-400 transition">Contacto</a>
                
                @auth
                    @if(auth()->user()->rol === 'admin')
                        <a href="{{ route('productos.crear') }}" class="bg-cyan-500 hover:bg-cyan-600 px-4 py-2 rounded-lg font-semibold transition">
                            + Nuevo Producto
                        </a>
                    @endif
                    
                    {{-- Menú de Usuario Logueado --}}
                    <div class="flex items-center gap-4 ml-6 border-l border-slate-700 pl-6">
                        <span class="text-sm font-semibold text-cyan-400">👤 {{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-sm text-gray-300 hover:text-red-400 transition">Cerrar Sesión</button>
                        </form>
                    </div>
                @else
                    {{-- Botones de Invitado --}}
                    <div class="flex items-center gap-4 ml-6 border-l border-slate-700 pl-6">
                        <a href="{{ route('login') }}" class="text-sm text-gray-300 hover:text-cyan-400 transition font-semibold">Iniciar Sesión</a>
                        <a href="{{ route('register') }}" class="bg-white text-slate-900 hover:bg-gray-200 px-4 py-2 rounded-lg font-bold transition">Registrarse</a>
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
    <footer class="bg-slate-900 text-gray-400 py-10 mt-20">
        <div class="container mx-auto px-6 grid md:grid-cols-3 gap-8">
            <div>
                <div class="flex items-center gap-2 text-white text-xl font-black mb-3">
                    <span class="bg-gradient-to-br from-cyan-400 to-blue-600 p-1.5 rounded-lg">⚡</span>
                    TecnoNúcleo
                </div>
                <p class="text-sm">El núcleo de tu tecnología. Los mejores productos electrónicos al mejor precio.</p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-3">Categorías</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#" class="hover:text-cyan-400">Celulares</a></li>
                    <li><a href="#" class="hover:text-cyan-400">Laptops</a></li>
                    <li><a href="#" class="hover:text-cyan-400">Audífonos</a></li>
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