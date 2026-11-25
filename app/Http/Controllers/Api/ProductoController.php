<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // GET /api/productos (Listar todos)
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        return response()->json([
            'success' => true,
            'data' => $productos
        ], 200);
    }

    // GET /api/productos/{id} (Ver uno solo)
    public function show($id)
    {
        $producto = Producto::with('categoria')->find($id);

        if (!$producto) {
            return response()->json([
                'success' => false,
                'message' => 'Producto no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $producto
        ], 200);
    }
}