<?php

namespace App\Http\Controllers;

use App\Http\Requests\MariscoRequest;
use Illuminate\Http\Request;
use App\Models\marisco;
use Illuminate\Support\Facades\Storage;
use App\Models\proveedor;




class MariscoController extends Controller
{
    public function add(){
        $proveedores = proveedor::all();
        return view('Marisco.addMarisco', compact('proveedores'));
    }

    public function gestionAdd(MariscoRequest $request)
    {
        // Guardar la imagen en el sistema de archivos y obtener el nombre del archivo
        $imagenNombre = $request->file('imagen')->store('public/images');

        // Crear un nuevo marisco con el nombre del archivo de imagen
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

        return redirect()->route('showMarisco')->with('success', "Marisco creado correctamente.");
    }


    public function show(Marisco $marisco){
        $mariscos = marisco::with('proveedor')->get();
        return view('marisco.show', compact('mariscos'));
    }

    public function rm(){
        $mariscos = Marisco::all();
        return view('marisco.rm', compact('mariscos'));
    }

    public function delete(Request $request){
        foreach ($request->mariscos as $id => $data) {
            if (isset($data['eliminar'])) {
                $marisco = Marisco::findOrFail($id);

                // Eliminar la imagen del sistema de archivos
                Storage::delete($marisco->imagen);

                // Eliminar el marisco de la base de datos
                $marisco->delete();
            }
        }
        return redirect()->route('showMarisco')->with('deleted', "Marisco eliminado correctamente.");
    }

    public function showMariscos(){
        $mariscos = Marisco::all();
        return view('Clientes.productos.mostrarMariscos', compact('mariscos'));
    }

    public function edit(Marisco $marisco){
        $mariscos = Marisco::all();
        return view('marisco.edit', compact('mariscos'));
    }

    public function update(Request $request){
        foreach ($request->mariscos as $id => $data) {
            $marisco = Marisco::findOrFail($id);

            // Verifica si el checkbox está marcado y ajusta el valor del campo cocido
            $data['cocido'] = isset($data['cocido']) && $data['cocido'] === 'on' ? true : false;

            $marisco->update($data);
        }

        return redirect()->route('showMarisco')->with('success', "Marisco actualizado correctamente.");
    }


    public function showMariscoDetails($mariscoId){
        $marisco = marisco::findOrFail($mariscoId);
        return view('Clientes.Productos.mostrarDetalleMariscos', compact('marisco'));
    }

}
