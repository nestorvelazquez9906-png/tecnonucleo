<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Models\Producto;

// Home
Route::get('/', function () {
    $productos = Producto::with('categoria')->latest()->take(4)->get();
    return view('home', compact('productos'));
})->name('home');

// Productos (CRUD completo)
Route::get('/productos', [ProductoController::class, 'index'])->name('productos');
Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.crear');
Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');
Route::get('/productos/{producto}/editar', [ProductoController::class, 'edit'])->name('productos.edit');
Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

// Categorías
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias');

// Contacto
Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

// API JSON
Route::get('/api/productos', function () {
    return response()->json([
        'success' => true,
        'data' => Producto::with('categoria')->get(),
    ]);
})->name('api.productos');