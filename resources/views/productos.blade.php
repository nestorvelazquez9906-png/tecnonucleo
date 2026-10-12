@extends('layouts.app')

@section('title', 'Productos - TecnoNúcleo')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-black">Nuestros Productos</h1>
                <p class="text-gray-500 mt-1">Encuentra lo mejor en tecnología</p>
            </div>
            <a href="{{ route('productos.crear') }}"
               class="bg-slate-900 hover:bg-blue-600 text-white px-6 py-3 rounded-xl font-bold transition shadow-lg">
                + Agregar Producto
            </a>
        </div>

        @if (session('status'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-8 flex items-center gap-3">
                <span class="text-2xl">✅</span>
                <span class="font-semibold">{{ session('status') }}</span>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @php
                $productos = [
                    ['nombre' => 'Laptop Gamer', 'precio' => 15000, 'icono' => '💻', 'rating' => 4, 'badge' => 'Nuevo'],
                    ['nombre' => 'iPhone 15 Pro', 'precio' => 18000, 'icono' => '📱', 'rating' => 5, 'badge' => 'Top'],
                    ['nombre' => 'Audífonos Sony', 'precio' => 2500, 'icono' => '🎧', 'rating' => 4, 'badge' => null],
                ];
            @endphp

            @foreach ($productos as $p)
                <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                    <div class="relative bg-gradient-to-br from-slate-100 to-gray-200 h-56 flex items-center justify-center text-7xl">
                        {{ $p['icono'] }}
                        @if($p['badge'])
                            <span class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                {{ $p['badge'] }}
                            </span>
                        @endif
                        <button class="absolute top-4 right-4 bg-white rounded-full w-9 h-9 flex items-center justify-center shadow hover:bg-red-50">
                            🤍
                        </button>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl">{{ $p['nombre'] }}</h3>
                        <div class="flex items-center gap-1 mt-1 text-yellow-500 text-sm">
                            {{ str_repeat('★', $p['rating']) . str_repeat('☆', 5 - $p['rating']) }}
                            <span class="text-gray-400 ml-1">({{ $p['rating'] }}.0)</span>
                        </div>
                        <p class="text-2xl font-black text-slate-900 mt-3">
                            ${{ number_format($p['precio'], 0) }}
                            <span class="text-sm text-gray-400 font-normal">MXN</span>
                        </p>
                        <button class="mt-5 w-full bg-slate-900 hover:bg-cyan-500 hover:text-slate-900 text-white py-3 rounded-xl font-bold transition">
                            🛒 Agregar al carrito
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection