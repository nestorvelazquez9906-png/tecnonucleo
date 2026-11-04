@extends('layouts.app')

@section('title', 'Iniciar Sesión - TecnoNúcleo')

@section('content')
    <div class="container mx-auto px-6 py-12">
        <div class="max-w-md mx-auto bg-white rounded-2xl shadow-xl p-8 mt-10">
            <h2 class="text-3xl font-black text-center mb-2">Iniciar Sesión</h2>
            <p class="text-gray-500 text-center mb-8">Ingresa a tu cuenta de TecnoNúcleo</p>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600 bg-green-50 p-3 rounded-lg">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block font-bold mb-1">Correo Electrónico</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
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

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">Recordarme</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-600 hover:underline" href="{{ route('password.request') }}">
                            ¿Olvidaste tu contraseña?
                        </a>
                    @endif
                </div>

                <button type="submit" class="w-full bg-slate-900 hover:bg-blue-600 text-white py-3 rounded-xl font-bold transition shadow-lg mt-6">
                    Iniciar Sesión
                </button>

                <p class="text-center text-sm text-gray-600 mt-6">
                    ¿No tienes una cuenta? 
                    <a href="{{ route('register') }}" class="text-blue-600 font-bold hover:underline">Regístrate aquí</a>
                </p>
            </form>
        </div>
    </div>
@endsection