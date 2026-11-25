<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Creamos los roles. Usamos findOrCreate para evitar errores si ya existen.
        Role::findOrCreate('admin', 'web');
        Role::findOrCreate('vendedor', 'web');
        Role::findOrCreate('cliente', 'web');
    }
}