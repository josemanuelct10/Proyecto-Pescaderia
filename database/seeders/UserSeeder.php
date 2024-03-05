<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\CategoriaUsuario;
use Illuminate\Support\Facades\DB;




class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {/*
        $categorias = CategoriaUsuario::all();

        // Crear algunos usuarios de ejemplo y asignarlos a una categoría
        User::create([
            'name' => 'Usuario 1',
            'email' => 'usuario1@example.com',
            'password' => bcrypt('password1'),
            'dni' => '12345678',
            'fecha_nacimiento' => '1990-01-01',
            'telefono' => '123456789',
            'direccion' => 'Dirección 1',
            'categoria_usuario_id' => $categorias->random()->id,
        ]);

        User::create([
            'name' => 'Usuario 2',
            'email' => 'usuario2@example.com',
            'password' => bcrypt('password2'),
            'dni' => '87654321',
            'fecha_nacimiento' => '1995-01-01',
            'telefono' => '987654321',
            'direccion' => 'Dirección 2',
            'categoria_usuario_id' => $categorias->random()->id,
        ]);
        */
        DB::table('factura_user')-> insert([
            'factura_id'=>1,
            'user_id'=>1,
            'added_by'=>'ana'
        ]);
        DB::table('factura_user')-> insert([
            'factura_id'=>2,
            'user_id'=>1,
            'added_by'=>'pepe'
        ]);
        DB::table('factura_user')-> insert([
            'factura_id'=>2,
            'user_id'=>5,
            'added_by'=>'jose manuel'
        ]);
    }
}
