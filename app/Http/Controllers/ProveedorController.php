<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProveedorRequest;
use App\Models\Proveedor;

use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function add(){
        return view('proveedor.addProveedor');
    }

    public function gestionAdd(ProveedorRequest $request){
        Proveedor::create([
            'nombre' => $request->input('nombre'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'categoria' => $request->input('categoria'),
            'cif' => $request->input('cif')
        ]);
        return redirect()->route('showProveedor');
    }

    public function show (Proveedor $proveedor){
        $proveedores = Proveedor::all();
        return view('proveedor.show', compact('proveedores'));
    }

    public function edit(){
        $proveedores = Proveedor::all();
        return view('proveedor.edit', compact('proveedores'));
    }

    public function update(Request $request){
        foreach($request->proveedores as $id =>$data){
            $proveedor = Proveedor::findOrFail($id);
            $proveedor->update($data);
        }
        return redirect()->route('showProveedor');
    }

    public function rm(){
        $proveedores = Proveedor::all();
        return view('proveedor.rm', compact('proveedores'));
    }

    public function delete(Request $request){
        if ($request->has('proveedor')) {
            foreach ($request->proveedor as $id => $data){
                if (isset($data['eliminar'])){
                    $proveedor = Proveedor::findOrFail($id);
                    $proveedor->delete();
                }
            }
        }

        return redirect()->route('showProveedor');
    }

}
