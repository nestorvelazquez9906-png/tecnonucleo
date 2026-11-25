<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Models\Producto;

// ==========================================
// RUTAS DE AUTENTICACIÓN
// ==========================================
require __DIR__.'/auth.php'; 

// ==========================================
// RUTAS PÚBLICAS (Cualquiera puede ver)
// ==========================================
Route::get('/', function () {
    $productos = Producto::with('categoria')->latest()->take(4)->get();
    return view('home', compact('productos'));
})->name('home');

Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

// Catálogo
Route::get('/productos', [ProductoController::class, 'index'])->name('productos');


// Categorías
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias');


// ==========================================
// RUTAS PROTEGIDAS (Solo Administradores)
// ==========================================
Route::middleware(['auth', 'admin'])->group(function () {
    
    // ¡IMPORTANTE! La ruta de crear DEBE ir antes que la de show
    Route::get('/productos/crear', [ProductoController::class, 'create'])->name('productos.crear');
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store');
    
    Route::get('/productos/{producto}/editar', [ProductoController::class, 'edit'])->name('productos.edit');
    Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update');
    
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
    
});


// ==========================================
// RUTA DE DETALLE (Debe ir al final para no chocar con /crear)
// ==========================================
Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show');