<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{
    /**
     * Listar todos los productos
     */
    public function index()
    {
        Log::info('Listando productos');

        $productos = Producto::with('categoria')
                             ->orderBy('created_at', 'desc')
                             ->get();

        return view('productos', compact('productos'));
    }

    /**
     * Mostrar formulario de creación
     */
    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
        return view('crear-producto', compact('categorias'));
    }

    /**
     * Guardar producto en base de datos
     */
    public function store(Request $request)
    {
        Log::info('POST /productos recibido', [
            'ip' => $request->ip(),
            'datos' => $request->only('nombre', 'precio', 'categoria_id'),
        ]);

        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $producto = Producto::create($validated);

        Log::info('Producto creado en BD', [
            'id' => $producto->id,
            'nombre' => $producto->nombre,
        ]);

        return redirect()
            ->route('productos')
            ->with('status', "¡El producto '{$producto->nombre}' fue creado correctamente!");
    }

    /**
     * Mostrar un producto específico
     */
    public function show(Producto $producto)
    {
        return view('detalle-producto', compact('producto'));
    }

    /**
     * Eliminar producto
     */
    public function destroy(Producto $producto)
    {
        Log::info('Producto eliminado', [
            'id' => $producto->id,
            'nombre' => $producto->nombre,
        ]);

        $nombre = $producto->nombre;
        $producto->delete();

        return redirect()
            ->route('productos')
            ->with('status', "El producto '{$nombre}' fue eliminado.");
    }
}