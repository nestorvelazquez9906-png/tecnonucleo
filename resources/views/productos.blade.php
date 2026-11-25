@extends('layouts.app')

@section('title', 'Productos - TecnoNúcleo')

@section('content')
    <div class="container mx-auto px-6 py-12">
        
        {{-- Encabezado --}}
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-4xl font-black">Nuestros Productos</h1>
                <p class="text-gray-500 mt-1">{{ $productos->total() }} productos encontrados</p>
            </div>
            
            {{-- SOLO EL ADMINISTRADOR VE EL BOTÓN DE AGREGAR --}}
            @if(auth()->check() && auth()->user()->rol === 'admin')
                <a href="{{ route('productos.crear') }}"
                   class="bg-slate-900 hover:bg-blue-600 text-white px-6 py-3 rounded-xl font-bold transition shadow-lg">
                    + Agregar Producto
                </a>
            @endif
        </div>

        {{-- Mensaje de éxito --}}
        @if (session('status'))
            <div class="bg-green-50 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-8 flex items-center gap-3">
                <span class="text-2xl">✅</span>
                <span class="font-semibold">{{ session('status') }}</span>
            </div>
        @endif

        {{-- ========================================== --}}
        {{-- BARRA DE BÚSQUEDA Y FILTRO                 --}}
        {{-- ========================================== --}}
        <form action="{{ route('productos') }}" method="GET" class="bg-white p-4 rounded-xl shadow-sm mb-8 flex flex-col md:flex-row gap-4">
            <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="Buscar producto por nombre..." 
                   class="flex-1 border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
            
            <select name="categoria" class="border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                <option value="">Todas las categorías</option>
                @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}" {{ request('categoria') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nombre }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg font-bold transition">
                Buscar
            </button>
            
            @if(request('buscar') || request('categoria'))
                <a href="{{ route('productos') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-lg font-bold transition text-center">
                    Limpiar
                </a>
            @endif
        </form>

        {{-- Si no hay resultados --}}
        @if($productos->isEmpty())
            <div class="bg-white rounded-2xl shadow-md p-12 text-center">
                <div class="text-6xl mb-4">🔍</div>
                <h3 class="text-2xl font-bold mb-2">No se encontraron productos</h3>
                <p class="text-gray-500 mb-6">Intenta con otra búsqueda o filtro.</p>
                <a href="{{ route('productos') }}"
                   class="bg-gray-900 hover:bg-gray-700 text-white px-6 py-3 rounded-xl font-bold transition">
                    Ver todos los productos
                </a>
            </div>
        @else
            {{-- Grid de productos --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($productos as $producto)
                    <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-2xl hover:-translate-y-1 transition-all duration-300">
                        <div class="relative bg-gradient-to-br from-slate-100 to-gray-200 h-56 flex items-center justify-center p-4">
                                @php
    // Mapeo de imágenes según el nombre del producto
    $imagen = 'default.png';
    $nombreLower = strtolower($producto->nombre);
    
    // Si el nombre contiene "laptop", usará la imagen asus-rog.png
    if (str_contains($nombreLower, 'laptop') || str_contains($nombreLower, 'asus') || str_contains($nombreLower, 'rog')) {
        $imagen = 'laptop.png'; 
    }
    elseif (str_contains($nombreLower, 'iphone') || str_contains($nombreLower, 'celular')) {
        $imagen = 'celular.png'; // O 'iphone-15.png' si así se llama tu archivo
    }
    elseif (str_contains($nombreLower, 'sony') || str_contains($nombreLower, 'audifonos')) {
        $imagen = 'sony-xm5.png';
    }
    elseif (str_contains($nombreLower, 'cargador')) {
        $imagen = 'cargador-usb.png'; // Nota: en tu carpeta se llama cargador-usb, no cargador-usbc
    }
    elseif (str_contains($nombreLower, 'samsung') || str_contains($nombreLower, 's24')) {
        $imagen = 'samsung-s24.png';
    }
    elseif (str_contains($nombreLower, 'macbook')) {
        $imagen = 'macbook-air.png';
    }
@endphp
                            
                            <img src="{{ asset('images/productos/' . $imagen) }}" 
                                 alt="{{ $producto->nombre }}" 
                                 class="h-full w-auto object-contain hover:scale-110 transition-transform duration-300">
                            
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
                                
                                {{-- SOLO EL ADMINISTRADOR VE ESTOS BOTONES --}}
                                @if(auth()->check() && auth()->user()->rol === 'admin')
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
                                @endif
                                {{-- FIN DE LA VALIDACIÓN --}}

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
            {{-- Paginación --}}
            <div class="mt-10">
                {{ $productos->links() }}
            </div>
        @endif
    </div>
@endsection