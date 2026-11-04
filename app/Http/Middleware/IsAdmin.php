<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Si el usuario no está logueado o no es admin, lo pateamos
        if (auth()->check() && auth()->user()->rol !== 'admin') {
            Log::warning('Acceso denegado a ruta de admin', ['user_id' => auth()->id()]);
            abort(403, 'No tienes permisos para estar aquí.');
        }

        return $next($request);
    }
}