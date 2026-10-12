@extends('layouts.app')

@section('title', 'Contacto - TecnoNúcleo')

@section('content')
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-md p-8">
        <h1 class="text-3xl font-bold mb-4">Contáctanos</h1>
        <p class="text-gray-600 mb-6">
            ¿Tienes dudas o sugerencias? Escríbenos y te responderemos lo antes posible.
        </p>

        <div class="space-y-3">
            <p><span class="font-semibold">📧 Email:</span> contacto@tecnonucleo.com</p>
            <p><span class="font-semibold">📞 Teléfono:</span> +52 55 1234 5678</p>
            <p><span class="font-semibold">📍 Dirección:</span> CDMX, México</p>
        </div>
    </div>
@endsection