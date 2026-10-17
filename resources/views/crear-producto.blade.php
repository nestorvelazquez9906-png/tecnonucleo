@extends('layouts.app')

@section('title', 'Crear Producto - TecnoNúcleo')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <div class="max-w-2xl mx-auto">
            <div class="mb-8">
                <a href="{{ route('productos') }}" class="text-blue-600 hover:underline font-semibold">← Volver a productos</a>
                <h1 class="text-4xl font-black mt-2">Registrar Nuevo Producto</h1>
                <p class="text-gray-500">Completa los datos para agregarlo al catálogo</p>
            </div>

            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6">
                    <p class="font-bold mb-2">Corrige los siguientes errores:</p>
                    <ul class="list-disc list-inside space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white rounded-2xl shadow-md p-8">
                <form action="{{ route('productos.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <div>
                        <label for="nombre" class="block font-bold mb-2">Nombre del Producto *</label>
                        <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                               class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('nombre') border-red-500 @enderror"
                               placeholder="Ej. Laptop HP Pavilion">
                        @error('nombre')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="categoria_id" class="block font-bold mb-2">Categoría *</label>
                        <select name="categoria_id" id="categoria_id"
                                class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('categoria_id') border-red-500 @enderror">
                            <option value="">-- Selecciona una categoría --</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label for="precio" class="block font-bold mb-2">Precio (MXN) *</label>
                            <input type="number" name="precio" id="precio" step="0.01" value="{{ old('precio') }}"
                                   class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('precio') border-red-500 @enderror"
                                   placeholder="15000.00">
                            @error('precio')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="stock" class="block font-bold mb-2">Stock *</label>
                            <input type="number" name="stock" id="stock" value="{{ old('stock', 0) }}"
                                   class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500 @error('stock') border-red-500 @enderror"
                                   placeholder="10">
                            @error('stock')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="descripcion" class="block font-bold mb-2">Descripción</label>
                        <textarea name="descripcion" id="descripcion" rows="4"
                                  class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                  placeholder="Características del producto...">{{ old('descripcion') }}</textarea>
                    </div>

                    <div class="flex gap-3 pt-2">
                        <button type="submit"
                                class="bg-slate-900 hover:bg-blue-600 text-white px-8 py-3 rounded-xl font-bold transition shadow-lg">
                            Guardar Producto
                        </button>
                        <a href="{{ route('productos') }}"
                           class="bg-gray-100 hover:bg-gray-200 px-8 py-3 rounded-xl font-bold transition">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection