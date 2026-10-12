@extends('layouts.app')

@section('title', 'TecnoNúcleo - Inicio')

@section('content')

    {{-- HERO --}}
    <section class="relative bg-slate-900 text-white overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-blue-600 via-slate-900 to-cyan-600 opacity-90"></div>
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 20% 50%, rgba(34,211,238,0.3) 0%, transparent 50%);"></div>

        <div class="container mx-auto px-6 py-24 relative z-10">
            <div class="max-w-2xl">
                <span class="inline-block bg-cyan-400/20 text-cyan-300 text-xs font-bold px-4 py-1.5 rounded-full mb-6 uppercase tracking-wider">
                    🚀 Nueva colección 2026
                </span>
                <h1 class="text-5xl md:text-7xl font-black mb-6 leading-tight">
                    La tecnología que <span class="text-cyan-400">impulsa</span> tu mundo
                </h1>
                <p class="text-xl text-gray-300 mb-8">
                    Descubre laptops, celulares, audífonos y más con envío gratis a todo México.
                </p>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('productos') }}"
                       class="bg-cyan-500 hover:bg-cyan-400 text-slate-900 px-8 py-4 rounded-xl font-bold transition shadow-xl shadow-cyan-500/30">
                        Explorar Productos →
                    </a>
                    <a href="{{ route('contacto') }}"
                       class="border-2 border-white/30 hover:bg-white/10 px-8 py-4 rounded-xl font-bold transition">
                        Contáctanos
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- BENEFICIOS --}}
    <section class="container mx-auto px-6 -mt-12 relative z-20">
        <div class="grid md:grid-cols-3 gap-6">
            @foreach ([
                ['🚚', 'Envío Gratis', 'En compras mayores a $999'],
                ['🛡️', 'Garantía', '12 meses en todos los productos'],
                ['💳', 'Pago Seguro', 'Múltiples métodos de pago']
            ] as $b)
                <div class="bg-white rounded-2xl shadow-lg p-6 flex items-center gap-4 hover:shadow-xl transition">
                    <div class="text-4xl">{{ $b[0] }}</div>
                    <div>
                        <h3 class="font-bold">{{ $b[1] }}</h3>
                        <p class="text-sm text-gray-500">{{ $b[2] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- CATEGORÍAS --}}
    <section class="container mx-auto px-6 mt-20">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h2 class="text-3xl font-black">Categorías</h2>
                <p class="text-gray-500">Explora por tipo de producto</p>
            </div>
            <a href="{{ route('productos') }}" class="text-blue-600 font-semibold hover:underline">Ver todas →</a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach ([
                ['📱', 'Celulares', 'from-blue-500 to-blue-700'],
                ['💻', 'Laptops', 'from-cyan-500 to-cyan-700'],
                ['🎧', 'Audífonos', 'from-purple-500 to-purple-700'],
                ['⌨️', 'Accesorios', 'from-orange-500 to-orange-700']
            ] as $c)
                <div class="group cursor-pointer">
                    <div class="bg-gradient-to-br {{ $c[2] }} rounded-2xl h-40 flex items-center justify-center text-6xl shadow-lg group-hover:scale-105 transition-transform">
                        {{ $c[0] }}
                    </div>
                    <h3 class="font-bold mt-3 text-center">{{ $c[1] }}</h3>
                </div>
            @endforeach
        </div>
    </section>

    {{-- CTA FINAL --}}
    <section class="container mx-auto px-6 mt-20">
        <div class="bg-gradient-to-r from-slate-900 to-blue-900 rounded-3xl p-12 text-center text-white shadow-2xl">
            <h2 class="text-4xl font-black mb-4">¿Listo para renovar tu equipo?</h2>
            <p class="text-gray-300 mb-6 text-lg">Encuentra las mejores ofertas en TecnoNúcleo</p>
            <a href="{{ route('productos') }}"
               class="bg-cyan-500 hover:bg-cyan-400 text-slate-900 px-8 py-4 rounded-xl font-bold transition inline-block">
                Ver Catálogo Completo
            </a>
        </div>
    </section>

@endsection