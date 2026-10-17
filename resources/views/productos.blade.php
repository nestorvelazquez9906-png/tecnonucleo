@extends('layouts.app')

@section('title', 'Productos - TecnoNúcleo')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-black">Nuestros Productos</h1>
                <p class="text-gray-500 mt-1">{{ $productos->count() }} productos disponibles</p>
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

        @if($productos->isEmpty())
            <div class="bg-white rounded-2xl shadow-md p-12 text-center">
                <div class="text-6xl mb-4">📦</div>
                <h3 class="text-2xl font-bold mb-2">No hay productos aún</h3>
                <p class="text-gray-500 mb-6">Comienza agregando tu primer producto</p>
                <a href="{{ route('productos.crear') }}"
                   class="bg-cyan-500 hover:bg-cyan-600 text-white px-6 py-3 rounded-xl font-bold transition">
                    Agregar Producto
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($productos as $producto)
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                        <div class="relative bg-gradient-to-br from-slate-100 to-gray-200 h-56 flex items-center justify-center text-7xl">
                            @php
                                $emoji = match($producto->categoria->nombre ?? '') {
                                    'Celulares' => '📱',
                                    'Laptops' => '💻',
                                    'Audífonos' => '🎧',
                                    'Accesorios' => '⌨️',
                                    default => '📦',
                                };
                            @endphp
                            {{ $emoji }}
                            @if($producto->stock <= 5)
                                <span class="absolute top-4 left-4 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full">
                                    ¡Últimas {{ $producto->stock }}!
                                </span>
                            @else
                                <span class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full">
                                    {{ $producto->categoria->nombre ?? 'Sin categoría' }}
                                </span>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="font-bold text-xl">{{ $producto->nombre }}</h3>
                            <p class="text-gray-500 text-sm mt-1 line-clamp-2">{{ $producto->descripcion }}</p>
                            <p class="text-2xl font-black text-slate-900 mt-3">
                                ${{ number_format($producto->precio, 0) }}
                                <span class="text-sm text-gray-400 font-normal">MXN</span>
                            </p>
                            <p class="text-xs text-gray-400 mt-1">Stock: {{ $producto->stock }} unidades</p>

                            <div class="flex gap-2 mt-5">
                                <a href="{{ route('productos.show', $producto) }}"
                                   class="flex-1 bg-slate-900 hover:bg-cyan-500 hover:text-slate-900 text-white py-3 rounded-xl font-bold transition text-center">
                                    Ver detalle
                                </a>
                                <a href="{{ route('productos.edit', $producto) }}"
                                   class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-3 rounded-xl font-bold transition">
                                    ✏️
                                </a>
                                <form action="{{ route('productos.destroy', $producto) }}" method="POST"
                                      onsubmit="return confirm('¿Eliminar {{ $producto->nombre }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-3 rounded-xl font-bold transition">
                                        🗑️
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection