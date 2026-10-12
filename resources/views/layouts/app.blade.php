<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'TecnoNúcleo')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

    {{-- ============ HEADER ============ --}}
    <header class="bg-slate-900 text-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold tracking-tight">
                ⚡ Tecno<span class="text-cyan-400">Núcleo</span>
            </a>

            <nav class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="hover:text-cyan-400 transition">Inicio</a>
                <a href="{{ route('productos') }}" class="hover:text-cyan-400 transition">Productos</a>
                <a href="{{ route('contacto') }}" class="hover:text-cyan-400 transition">Contacto</a>
                <a href="{{ route('productos.crear') }}" class="bg-cyan-500 hover:bg-cyan-600 px-4 py-2 rounded-lg font-semibold transition">
                    + Nuevo Producto
                </a>
            </nav>
        </div>
    </header>

    {{-- ============ CONTENIDO ============ --}}
    <main class="container mx-auto px-6 py-10 flex-grow">
        @yield('content')
    </main>

    {{-- ============ FOOTER ============ --}}
    <footer class="bg-slate-900 text-gray-400 py-6 mt-10">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2026 <span class="text-cyan-400 font-semibold">TecnoNúcleo</span> — El núcleo de tu tecnología</p>
        </div>
    </footer>

</body>
</html>