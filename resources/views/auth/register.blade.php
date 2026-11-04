@extends('layouts.app')

@section('title', 'Registrarse - TecnoNúcleo')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <div class="max-w-md mx-auto bg-white rounded-2xl shadow-xl p-8 mt-10">
            <h2 class="text-3xl font-black text-center mb-2">Regístrate</h2>
            <p class="text-gray-500 text-center mb-8">Únete a TecnoNúcleo</p>

            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf

                <!-- Name -->
                <div>
                    <label for="name" class="block font-bold mb-1">Nombre Completo</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Address -->
                <div>
                    <label for="email" class="block font-bold mb-1">Correo Electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block font-bold mb-1">Contraseña</label>
                    <input id="password" type="password" name="password" required
                           class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    @error('password')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block font-bold mb-1">Confirmar Contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required
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