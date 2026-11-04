<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Crear el usuario Administrador
        User::create([
            'name' => 'Administrador TecnoNúcleo',
            'email' => 'admin@tecnonucleo.com',
            'password' => Hash::make('password123'),
            'rol' => 'admin',
        ]);

        // 2. Crear un usuario Cliente de prueba (opcional, pero útil para probar permisos)
        User::create([
            'name' => 'Cliente de Prueba',
            'email' => 'cliente@tecnonucleo.com',
            'password' => Hash::make('password123'),
            'rol' => 'cliente',
        ]);

        // 3. Crear las Categorías
        $categorias = [
            ['nombre' => 'Celulares', 'descripcion' => 'Smartphones y accesorios'],
            ['nombre' => 'Laptops', 'descripcion' => 'Computadoras portátiles'],
            ['nombre' => 'Audífonos', 'descripcion' => 'Audífonos y auriculares'],
            ['nombre' => 'Accesorios', 'descripcion' => 'Cargadores, cables y más'],
        ];

        foreach ($categorias as $cat) {
            Categoria::create($cat);
        }

        // 4. Crear los Productos de prueba
        $productos = [
            ['nombre' => 'Laptop Gamer', 'descripcion' => 'Laptop de alto rendimiento para gaming', 'precio' => 15000.00, 'stock' => 10, 'categoria_id' => 2],
            ['nombre' => 'iPhone 15 Pro', 'descripcion' => 'Smartphone de última generación', 'precio' => 18000.00, 'stock' => 15, 'categoria_id' => 1],
            ['nombre' => 'Audífonos Sony', 'descripcion' => 'Audífonos inalámbricos con cancelación de ruido', 'precio' => 2500.00, 'stock' => 20, 'categoria_id' => 3],
            ['nombre' => 'Samsung Galaxy S24', 'descripcion' => 'Smartphone Android de gama alta', 'precio' => 16500.00, 'stock' => 8, 'categoria_id' => 1],
            ['nombre' => 'MacBook Air', 'descripcion' => 'Laptop ultraligera de Apple', 'precio' => 22000.00, 'stock' => 5, 'categoria_id' => 2],
            ['nombre' => 'Cargador USB-C', 'descripcion' => 'Cargador rápido de 65W', 'precio' => 450.00, 'stock' => 50, 'categoria_id' => 4],
        ];

        foreach ($productos as $prod) {
            Producto::create($prod);
        }
    }
}