<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categorias = [
            ['nombre' => 'Celulares', 'descripcion' => 'Smartphones y accesorios móviles'],
            ['nombre' => 'Laptops', 'descripcion' => 'Computadoras portátiles'],
            ['nombre' => 'Audífonos', 'descripcion' => 'Audio profesional y personal'],
            ['nombre' => 'Accesorios', 'descripcion' => 'Cables, cargadores y más'],
        ];

        foreach ($categorias as $cat) {
            Categoria::create($cat);
        }
    }
}