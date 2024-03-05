<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProveedorRequest;
use App\Models\Proveedor;
use App\Models\Pescado;
use App\Models\Marisco;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    // Método para mostrar el formulario de agregar un nuevo proveedor
    public function add(){
        return view('proveedor.addProveedor');
    }

    // Método para gestionar la adición de un nuevo proveedor
    public function gestionAdd(ProveedorRequest $request){
        // Crear un nuevo proveedor con los datos del formulario
        Proveedor::create([
            'nombre' => $request->input('nombre'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'categoria' => $request->input('categoria'),
            'cif' => $request->input('cif')
        ]);

        // Redirigir a la ruta 'showProveedor'
        return redirect()->route('showProveedor');
    }

    // Método para mostrar todos los proveedores
    public function show (Proveedor $proveedor){
        // Obtener todos los proveedores
        $proveedores = Proveedor::all();

        // Mostrar la vista 'proveedor.show' con los proveedores obtenidos
        return view('proveedor.show', compact('proveedores'));
    }

    // Método para mostrar el formulario de edición de proveedores
    public function edit(){
        // Obtener todos los proveedores
        $proveedores = Proveedor::all();

        // Mostrar la vista 'proveedor.edit' con los proveedores obtenidos
        return view('proveedor.edit', compact('proveedores'));
    }

    // Método para actualizar proveedores seleccionados
    public function update(Request $request){
        // Iterar sobre los proveedores seleccionados
        foreach($request->proveedores as $id =>$data){
            $proveedor = Proveedor::findOrFail($id);
            $proveedor->update($data);
        }

        // Redirigir a la ruta 'showProveedor'
        return redirect()->route('showProveedor');
    }

    // Método para mostrar el formulario de eliminación de proveedores
    public function rm(){
        // Obtener todos los proveedores
        $proveedores = Proveedor::all();

        // Mostrar la vista 'proveedor.rm' con los proveedores obtenidos
        return view('proveedor.rm', compact('proveedores'));
    }

    // Método para eliminar proveedores seleccionados

    public function delete(Request $request)
    {
        if ($request->has('proveedor')) {
            foreach ($request->proveedor as $id => $data) {
                if (isset($data['eliminar'])) {
                    $proveedor = Proveedor::findOrFail($id);

                    // Comprobar si hay algún pescado asociado a este proveedor
                    $pescadosAsociados = Pescado::where('proveedor_id', $proveedor->id)->exists();
                    // Comprobar si hay algún marisco asociado a este proveedor
                    $mariscosAsociados = Marisco::where('proveedor_id', $proveedor->id)->exists();

                    // Si hay pescados o mariscos asociados al proveedor, mostrar un mensaje de error y evitar la eliminación
                    if ($pescadosAsociados || $mariscosAsociados) {
                        return redirect()->back()->with('error', 'No se puede eliminar el proveedor, hay pescados o mariscos asociados a el.');
                    }

                    // Si no hay pescados o mariscos asociados, proceder con la eliminación del proveedor
                    $proveedor->delete();
                }
            }
        }

        // Redirigir a la ruta 'showProveedor'
        return redirect()->route('showProveedor');
    }
}
