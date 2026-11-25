@extends('layouts.app')

@section('title', $producto->nombre . ' - TecnoNúcleo')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <a href="{{ route('productos') }}" class="text-blue-600 hover:underline font-semibold">← Volver a productos</a>

        <div class="grid md:grid-cols-2 gap-10 mt-6">
            
            {{-- CONTENEDOR DE LA IMAGEN --}}
            <div class="bg-gradient-to-br from-slate-100 to-gray-200 rounded-2xl h-96 flex items-center justify-center p-8 shadow-md">
                @php
                    // Mapeo de imágenes según el nombre del producto
                    $imagen = 'default.png';
                    $nombreLower = strtolower($producto->nombre);
                    
                    if (str_contains($nombreLower, 'laptop') || str_contains($nombreLower, 'asus') || str_contains($nombreLower, 'rog')) $imagen = 'laptop.png';
                    elseif (str_contains($nombreLower, 'iphone') || str_contains($nombreLower, 'celular')) $imagen = 'celular.png';
                    elseif (str_contains($nombreLower, 'sony') || str_contains($nombreLower, 'audifonos')) $imagen = 'sony-xm5.png';
                    elseif (str_contains($nombreLower, 'cargador')) $imagen = 'cargador-usb.png';
                    elseif (str_contains($nombreLower, 'samsung') || str_contains($nombreLower, 's24')) $imagen = 'samsung-s24.png';
                    elseif (str_contains($nombreLower, 'macbook')) $imagen = 'macbook-air.png';
                @endphp

                <img src="{{ asset('images/productos/' . $imagen) }}" 
                     alt="{{ $producto->nombre }}" 
                     class="h-full w-auto object-contain hover:scale-105 transition-transform duration-300">
            </div>

            {{-- INFORMACIÓN DEL PRODUCTO --}}
            <div>
                <p class="text-cyan-600 font-bold uppercase text-sm mb-2">
                    {{ $producto->categoria->nombre }}
                </p>
                <h1 class="text-4xl font-black">{{ $producto->nombre }}</h1>

                <p class="text-3xl font-black text-slate-900 mt-4">
                    ${{ number_format($producto->precio, 2) }}
                    <span class="text-base text-gray-400 font-normal">MXN</span>
                </p>

                <p class="text-gray-600 mt-6">{{ $producto->descripcion }}</p>

                <div class="mt-6 flex items-center gap-3">
                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-bold">
                        Stock: {{ $producto->stock }} unidades
                    </span>
                    <span class="text-gray-400 text-sm">
                        Registrado: {{ $producto->created_at->format('d/m/Y') }}
                    </span>
                </div>

                <button class="mt-8 w-full bg-slate-900 hover:bg-cyan-500 hover:text-slate-900 text-white py-4 rounded-xl font-bold transition text-lg">
                    🛒 Agregar al carrito
                </button>
            </div>
        </div>
    </div>
@endsection