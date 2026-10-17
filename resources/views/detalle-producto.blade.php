@extends('layouts.app')

@section('title', $producto->nombre . ' - TecnoNúcleo')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <a href="{{ route('productos') }}" class="text-blue-600 hover:underline font-semibold">← Volver a productos</a>

        <div class="grid md:grid-cols-2 gap-10 mt-6">
            <div class="bg-gradient-to-br from-slate-100 to-gray-200 rounded-2xl h-96 flex items-center justify-center text-9xl shadow-md">
                📦
            </div>

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