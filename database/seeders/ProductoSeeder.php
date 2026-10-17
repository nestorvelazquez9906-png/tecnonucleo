<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $productos = [
            [
                'nombre' => 'Laptop Gamer ASUS ROG',
                'descripcion' => 'Ryzen 7, 16GB RAM, RTX 4060',
                'precio' => 25000.00,
                'stock' => 8,
                'categoria_id' => 2, // Laptops
            ],
            [
                'nombre' => 'iPhone 15 Pro Max',
                'descripcion' => '256GB, Titanio Natural',
                'precio' => 18000.00,
                'stock' => 12,
                'categoria_id' => 1, // Celulares
            ],
            [
                'nombre' => 'Audífonos Sony WH-1000XM5',
                'descripcion' => 'Cancelación de ruido, 30h batería',
                'precio' => 6500.00,
                'stock' => 20,
                'categoria_id' => 3, // Audífonos
            ],
            [
                'nombre' => 'Cargador USB-C 65W',
                'descripcion' => 'Carga rápida GaN',
                'precio' => 450.00,
                'stock' => 50,
                'categoria_id' => 4, // Accesorios
            ],
            [
                'nombre' => 'Samsung Galaxy S24 Ultra',
                'descripcion' => '512GB, S-Pen incluido',
                'precio' => 22000.00,
                'stock' => 6,
                'categoria_id' => 1,
            ],
            [
                'nombre' => 'MacBook Air M3',
                'descripcion' => '13", 8GB RAM, 256GB SSD',
                'precio' => 28000.00,
                'stock' => 5,
                'categoria_id' => 2,
            ],
        ];

        foreach ($productos as $prod) {
            Producto::create($prod);
        }
    }
}