<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Models\Producto;

// ==========================================
// RUTAS PÚBLICAS (Cualquiera puede ver)
// ==========================================
require __DIR__.'/auth.php'; 
Route::get('/', function () {
    $productos = Producto::with('categoria')->latest()->take(4)->get();
    return view('home', compact('productos'));
})->name('home');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

// Catálogo y detalle de producto (Accesibles sin iniciar sesión)
Route::get('/productos', [ProductoController::class, 'index'])->name('productos');
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');

// Categorías y API JSON
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias');
Route::get('/api/productos', function () {
    return response()->json([
        'success' => true,
        'data' => Producto::with('categoria')->get(),
    ]);
})->name('api.productos');


// ==========================================
// RUTAS PROTEGIDAS (Solo Administradores)
// ==========================================
// Requieren estar logueado ('auth') y ser administrador ('admin')

Route::middleware(['auth', 'admin'])->group(function () {
    
    // Rutas de Creación
    Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.crear');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    
    // Rutas de Edición
    Route::get('/productos/{producto}/editar', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
    
    // Ruta de Eliminación
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
    
});


// ==========================================
// RUTAS DE AUTENTICACIÓN (Laravel Breeze)
// ==========================================
// Estas rutas las crea Breeze automáticamente. 
// Si Breeze te pidió agregar esta línea al final, déjala:
require __DIR__.'/auth.php';