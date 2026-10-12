@extends('layouts.app')

@section('title', 'Crear Producto - TecnoNúcleo')

@section('content')
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md p-8">
        <h1 class="text-3xl font-bold mb-6">Registrar Nuevo Producto</h1>

        {{-- Errores de validación --}}
        @if ($errors->any())
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('productos.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="nombre" class="block font-semibold mb-1">Nombre del Producto</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                       placeholder="Ej. Laptop HP Pavilion">
            </div>

            <div>
                <label for="precio" class="block font-semibold mb-1">Precio (MXN)</label>
                <input type="number" name="precio" id="precio" step="0.01" value="{{ old('precio') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                       placeholder="15000.00">
            </div>

            <div>
                <label for="descripcion" class="block font-semibold mb-1">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4"
                          class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500"
                          placeholder="Características del producto...">{{ old('descripcion') }}</textarea>
            </div>

            <div class="flex gap-3">
                <button type="submit"
                        class="bg-cyan-500 hover:bg-cyan-600 text-white px-6 py-2 rounded-lg font-semibold transition">
                    Guardar Producto
                </button>
                <a href="{{ route('productos') }}"
                   class="bg-gray-200 hover:bg-gray-300 px-6 py-2 rounded-lg font-semibold transition">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
@endsection