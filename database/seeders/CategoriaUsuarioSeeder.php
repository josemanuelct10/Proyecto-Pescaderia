<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoriaUsuario;
class CategoriaUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoriaUsuario::create(['descripcion' => 'Categoría 1']);
        CategoriaUsuario::create(['descripcion' => 'Categoría 2']);
    }
}
