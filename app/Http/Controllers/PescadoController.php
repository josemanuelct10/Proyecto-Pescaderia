<?php

namespace App\Http\Controllers;

use App\Models\Pescado;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PescadoRequest;

class PescadoController extends Controller
{
    // Método para mostrar el formulario de agregar un nuevo pescado
    public function add(){
        // Obtener todos los proveedores
        $proveedores = Proveedor::all();

        // Mostrar la vista 'pescado.addPescado' con los proveedores obtenidos
        return view('pescado.addPescado', compact('proveedores'));
    }

    // Método para gestionar la adición de un nuevo pescado
    public function gestionAdd(PescadoRequest $request)
    {
        // Guardar la imagen en el sistema de archivos y obtener el nombre del archivo
        $imagenNombre = $request->file('imagen')->store('public/images');

        // Crear un nuevo pescado con los datos del formulario
        Pescado::create([
            'nombre' => $request->input('nombre'),
            'descripcion' => $request->input('descripcion'),
            'origen' => $request->input('origen'),
            'precioKG' => $request->input('precioKG'),
            'cantidad' => $request->input('cantidad'),
            'fechaCompra' => $request->input('fechaCompra'),
            'categoria' => $request->input('categoria'),
            'imagen' => $imagenNombre, // Guardar solo el nombre del archivo de imagen
            'user_id' => $request->input('creador'), // Obtener el ID del usuario creador
            'proveedor_id' => $request->input('proveedor')
        ]);

        // Redirigir a la ruta 'showPescado' con un mensaje de éxito
        return redirect()->route('showPescado')->with('success', "Pescado añadido correctamente.");
    }

    // Método para mostrar todos los pescados
    public function show(Pescado $pescado) {
        // Obtener todos los pescados con sus proveedores
        $pescados = Pescado::with('proveedor')->get();

        // Mostrar la vista 'pescado.show' con los pescados obtenidos
        return view('pescado.show', compact('pescados'));
    }

    // Método para mostrar el formulario de edición de un pescado
    public function edit(){
        // Obtener todos los pescados
        $pescados = Pescado::all();

        // Mostrar la vista 'pescado.edit' con los pescados obtenidos
        return view('pescado.edit', compact('pescados'));
    }

    // Método para actualizar pescados seleccionados
    public function update(Request $request){
        // Iterar sobre los pescados seleccionados
        foreach ($request->pescados as $id => $data) {
            $pescado = Pescado::findOrFail($id);
            $pescado->update($data);
        }

        // Redirigir a la ruta 'showPescado' con un mensaje de éxito
        return redirect()->route('showPescado')->with('success', "Pescado actualizado correctamente.");
    }

    // Método para mostrar el formulario de eliminación de pescados
    public function rm(){
        // Obtener todos los pescados
        $pescados = Pescado::all();

        // Mostrar la vista 'pescado.rm' con los pescados obtenidos
        return view('pescado.rm', compact('pescados'));
    }

    // Método para eliminar pescados seleccionados
    public function delete(Request $request){
        // Iterar sobre los pescados seleccionados
        foreach ($request->pescados as $id => $data) {
            if (isset($data['eliminar'])) {
                $pescado = Pescado::findOrFail($id);

                // Eliminar la imagen del sistema de archivos
                Storage::delete($pescado->imagen);

                // Eliminar el pescado de la base de datos
                $pescado->delete();
            }
        }

        // Redirigir a la ruta 'showPescado' con un mensaje de éxito
        return redirect()->route('showPescado')->with('deleted', "Pescado eliminado correctamente.");
    }

    // Método para mostrar todos los pescados para los clientes
    public function showPescados(){
        // Obtener todos los pescados
        $pescados = Pescado::all();

        // Mostrar la vista 'Clientes.productos.mostrarPescados' con los pescados obtenidos
        return view('Clientes.productos.mostrarPescados', compact('pescados'));
    }

    // Método para mostrar los detalles de un pescado para los clientes
    public function showPescadoDetails($pescadoId){
        // Obtener el pescado por su ID
        $pescado = Pescado::findOrFail($pescadoId);

        // Mostrar la vista 'Clientes.Productos.mostrarDetallePescados' con el pescado obtenido
        return view('Clientes.Productos.mostrarDetallePescados', compact('pescado'));
    }
}
