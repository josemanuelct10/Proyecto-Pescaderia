<?php

namespace App\Http\Controllers;

use App\Models\pescado;
use App\Models\proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PescadoRequest;


class PescadoController extends Controller
{
    public function add(){
        $proveedores = proveedor::all();
        return view('pescado.addPescado', compact('proveedores'));
    }
    public function gestionAdd(PescadoRequest $request)
    {
        // Guardar la imagen en el sistema de archivos y obtener el nombre del archivo
        $imagenNombre = $request->file('imagen')->store('public/images');

        // Crear un nuevo pescado con el nombre del archivo de imagen
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

        return redirect()->route('showPescado')->with('success', "Pescado añadido correctamente.");
    }

    public function show(Pescado $pescado) {
        $pescados = Pescado::with('proveedor')->get();

        return view('pescado.show', compact('pescados'));
    }


    public function edit(){
        $pescados = Pescado::all();
        return view('pescado.edit', compact('pescados'));
    }

    public function update(Request $request){
        foreach ($request->pescados as $id => $data) {
            $pescado = Pescado::findOrFail($id);
            $pescado->update($data);
        }

        return redirect()->route('showPescado')->with('success', "Pescado actualizado correctamente.");
    }

    public function rm(){
        $pescados = Pescado::all();
        return view('pescado.rm', compact('pescados'));
    }

    public function delete(Request $request){
        foreach ($request->pescados as $id => $data) {
            if (isset($data['eliminar'])) {
                $pescado = Pescado::findOrFail($id);

                // Eliminar la imagen del sistema de archivos
                Storage::delete($pescado->imagen);

                // Eliminar el pescado de la base de datos
                $pescado->delete();
            }
        }
        return redirect()->route('showPescado')->with('deleted', "Pescado eliminado correctamente.");
    }

    public function showPescados(){
        $pescados = Pescado::all();
        return view('Clientes.productos.mostrarPescados', compact('pescados'));
    }


    public function showPescadoDetails($pescadoId){
        $pescado = Pescado::findOrFail($pescadoId);
        return view('Clientes.Productos.mostrarDetallePescados', compact('pescado'));
    }
}
