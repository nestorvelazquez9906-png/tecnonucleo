@extends('layouts.app')

@section('title', 'Registrarse - TecnoNúcleo')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <div class="max-w-md mx-auto bg-white rounded-2xl shadow-xl p-8 mt-10">
            <h2 class="text-3xl font-black text-center mb-2">Regístrate</h2>
            <p class="text-gray-500 text-center mb-8">Únete a TecnoNúcleo</p>

            {{-- BLOQUE DE ERRORES GENERALES --}}
            @if ($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-lg">
                    <p class="font-bold mb-2">Por favor, corrige los siguientes errores:</p>
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block font-bold mb-1">Nombre Completo</label>
                    {{-- QUITAMOS EL required --}}
                    <input id="name" type="text" name="name" value="{{ old('name') }}" autofocus
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block font-bold mb-1">Correo Electrónico</label>
                    {{-- QUITAMOS EL required --}}
                    <input id="email" type="email" name="email" value="{{ old('email') }}"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block font-bold mb-1">Contraseña</label>
                    {{-- QUITAMOS EL required --}}
                    <input id="password" type="password" name="password"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block font-bold mb-1">Confirmar Contraseña</label>
                    {{-- QUITAMOS EL required --}}
                    <input id="password_confirmation" type="password" name="password_confirmation"
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <button type="submit" class="w-full bg-cyan-500 hover:bg-cyan-600 text-slate-900 py-3 rounded-xl font-bold transition shadow-lg mt-6">
                    Registrarse
                </button>

                <p class="text-center text-sm text-gray-600 mt-6">
                    ¿Ya tienes una cuenta? 
                    <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline">Inicia sesión</a>
                </p>
            </form>
        </div>
    </div>
@endsection