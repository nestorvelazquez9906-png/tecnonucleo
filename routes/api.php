<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Producto;

Route::get('/productos', function () {
    return response()->json([
        'success' => true,
        'data' => Producto::with('categoria')->get(),
    ]);
});