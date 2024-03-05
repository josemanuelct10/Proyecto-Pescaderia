<?php

namespace App\Http\Controllers;

use App\Models\CategoriaUsuario;
use App\Models\User;

use Illuminate\Http\Request;

class CategoriasUsuarioController extends Controller
{
    // Método para mostrar todas las categorías de usuario
    public function show()
    {
        // Obtener todas las categorías de usuario
        $categorias = CategoriaUsuario::all();

        // Mostrar la vista 'CategoriasUsuarios.show' con las categorías obtenidas
        return view('CategoriasUsuarios.show', compact('categorias'));
    }

    // Método para mostrar el formulario de agregar una nueva categoría de usuario
    public function add()
    {
        // Mostrar la vista 'CategoriasUsuarios.add' para agregar una nueva categoría
        return view('CategoriasUsuarios.add');
    }

    // Método para gestionar la adición de una nueva categoría de usuario
    public function gestionAdd(Request $request)
    {
        // Crear una nueva categoría de usuario con los datos del formulario
        CategoriaUsuario::create($request->all());

        // Redirigir a la página de inicio del administrador con un mensaje de éxito
        return redirect()->route('categorias.show')->with('success', 'Categoría creada exitosamente.');
    }

    // Método para mostrar todas las categorías de usuario con la opción de eliminar
    public function rm()
    {
        // Obtener todas las categorías de usuario
        $categorias = CategoriaUsuario::all();

        // Mostrar la vista 'CategoriasUsuarios.rm' con las categorías obtenidas
        return view('CategoriasUsuarios.rm', compact('categorias'));
    }

    // Método para eliminar una o varias categorías de usuario seleccionadas
    public function delete(Request $request)
    {
        // Verificar si se han seleccionado categorías para eliminar
        if ($request->has('categoria')) {
            foreach ($request->categoria as $id => $data) {
                if (isset($data['eliminar'])) {
                    // Verificar si hay usuarios asociados a esta categoría
                    $usuariosAsociados = User::where('categoria_usuario_id', $id)->exists();

                    if ($usuariosAsociados) {
                        // Si hay usuarios asociados, mostrar un mensaje de error y no eliminar la categoría
                        return redirect()->back()->with('error', 'No se puede eliminar la categoría, hay usuarios asociados a ella.');
                    } else {
                        // Si no hay usuarios asociados, eliminar la categoría
                        $categoria = CategoriaUsuario::findOrFail($id);
                        $categoria->delete();
                    }
                }
            }
        }

        // Redirigir de vuelta a la página de mostrar categorías
        return redirect()->route('categorias.show');
    }
}
