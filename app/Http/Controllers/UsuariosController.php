<?php

namespace App\Http\Controllers;

use App\Models\CategoriaUsuario;
use App\Models\User;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    // Método para mostrar todos los usuarios
    public function show(){
        // Obtener todos los usuarios
        $usuarios = User::all();

        // Mostrar la vista 'Usuarios.show' con los usuarios obtenidos
        return view('Usuarios.show', compact('usuarios'));
    }

    // Método para mostrar el formulario de edición de usuarios
    public function edit (){
        // Obtener todos los usuarios y categorías de usuarios
        $usuarios = User::all();
        $categoriasUsuarios = CategoriaUsuario::all();

        // Mostrar la vista 'Usuarios.edit' con los usuarios y categorías obtenidos
        return view('Usuarios.edit', compact('usuarios', 'categoriasUsuarios'));
    }

    // Método para actualizar la categoría de los usuarios seleccionados
    public function update(Request $request){
        // Iterar sobre los usuarios seleccionados
        foreach ($request->usuarios as $id=>$datos){
            $usuario = User::findOrFail($id);
            $usuario->categoria_usuario_id = $datos['categoria_usuario_id'];
            $usuario->save();
        }

        return redirect()->route('usuarios.show')->with('success', 'Usuarios actualizados correctamente');
    }
}
