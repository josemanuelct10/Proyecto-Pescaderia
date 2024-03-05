<?php

namespace App\Http\Controllers;

use App\Http\Requests\MariscoRequest;
use Illuminate\Http\Request;
use App\Models\Marisco;
use Illuminate\Support\Facades\Storage;
use App\Models\Proveedor;

class MariscoController extends Controller
{
    // Método para mostrar el formulario de agregar un nuevo marisco
    public function add(){
        // Obtener todos los proveedores
        $proveedores = Proveedor::all();

        // Mostrar la vista 'Marisco.addMarisco' con los proveedores obtenidos
        return view('Marisco.addMarisco', compact('proveedores'));
    }

    // Método para gestionar la adición de un nuevo marisco
    public function gestionAdd(MariscoRequest $request)
    {
        // Guardar la imagen en el sistema de archivos y obtener el nombre del archivo
        $imagenNombre = $request->file('imagen')->store('public/images');

        // Crear un nuevo marisco con los datos del formulario
        Marisco::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'origen' => $request->input('origen'),
            'precioKG' => $request->input('precioKG'),
            'cantidad' => $request->input('cantidad'),
            'categoria' => $request->input('categoria'),
            'cocido' => $request->has('cocido'),
            'fechaCompra' => $request->input('fechaCompra'),
            'imagen' => $imagenNombre, // Guardar solo el nombre del archivo de imagen
            'user_id' => $request->input('creador'), // Obtener el ID del usuario creador
            'proveedor_id' => $request->input('proveedor')
        ]);

        // Redirigir a la ruta 'showMarisco' con un mensaje de éxito
        return redirect()->route('showMarisco')->with('success', "Marisco creado correctamente.");
    }

    // Método para mostrar todos los mariscos
    public function show(Marisco $marisco){
        // Obtener todos los mariscos con sus proveedores
        $mariscos = Marisco::with('proveedor')->get();

        // Mostrar la vista 'marisco.show' con los mariscos obtenidos
        return view('marisco.show', compact('mariscos'));
    }

    // Método para mostrar el formulario de eliminación de mariscos
    public function rm(){
        // Obtener todos los mariscos
        $mariscos = Marisco::all();

        // Mostrar la vista 'marisco.rm' con los mariscos obtenidos
        return view('marisco.rm', compact('mariscos'));
    }

    // Método para eliminar mariscos seleccionados
    public function delete(Request $request){
        // Iterar sobre los mariscos seleccionados
        foreach ($request->mariscos as $id => $data) {
            if (isset($data['eliminar'])) {
                $marisco = Marisco::findOrFail($id);

                // Eliminar la imagen del sistema de archivos
                Storage::delete($marisco->imagen);

                // Eliminar el marisco de la base de datos
                $marisco->delete();
            }
        }

        // Redirigir a la ruta 'showMarisco' con un mensaje de éxito
        return redirect()->route('showMarisco')->with('deleted', "Marisco eliminado correctamente.");
    }

    // Método para mostrar todos los mariscos para los clientes
    public function showMariscos(){
        // Obtener todos los mariscos
        $mariscos = Marisco::all();

        // Mostrar la vista 'Clientes.productos.mostrarMariscos' con los mariscos obtenidos
        return view('Clientes.productos.mostrarMariscos', compact('mariscos'));
    }

    // Método para mostrar el formulario de edición de un marisco
    public function edit(Marisco $marisco){
        // Obtener todos los mariscos
        $mariscos = Marisco::all();

        // Mostrar la vista 'marisco.edit' con los mariscos obtenidos
        return view('marisco.edit', compact('mariscos'));
    }

    // Método para actualizar mariscos seleccionados
    public function update(Request $request){
        // Iterar sobre los mariscos seleccionados
        foreach ($request->mariscos as $id => $data) {
            $marisco = Marisco::findOrFail($id);

            // Verificar si el checkbox está marcado y ajustar el valor del campo cocido
            $data['cocido'] = isset($data['cocido']) && $data['cocido'] === 'on' ? true : false;

            // Actualizar el marisco con los datos del formulario
            $marisco->update($data);
        }

        // Redirigir a la ruta 'showMarisco' con un mensaje de éxito
        return redirect()->route('showMarisco')->with('success', "Marisco actualizado correctamente.");
    }

    // Método para mostrar los detalles de un marisco para los clientes
    public function showMariscoDetails($mariscoId){
        // Obtener el marisco por su ID
        $marisco = Marisco::findOrFail($mariscoId);

        // Mostrar la vista 'Clientes.Productos.mostrarDetalleMariscos' con el marisco obtenido
        return view('Clientes.Productos.mostrarDetalleMariscos', compact('marisco'));
    }
}
