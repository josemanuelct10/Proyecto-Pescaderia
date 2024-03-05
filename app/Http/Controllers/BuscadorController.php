<?php

namespace App\Http\Controllers;

use App\Models\marisco;
use App\Models\pescado;
use Illuminate\Http\Request;

class BuscadorController extends Controller{

    /**
     * Recibe el Request desde un formulario
     * Devuelve una vista con los arrays de pescados y mariscos
     */
    public function buscar(Request $request){
        $nombreBuscado = $request->input('buscador');

        $pescados = Pescado::where('nombre', 'like', '%'.$nombreBuscado.'%')->get();
        $mariscos = Marisco::where('nombre', 'like', '%'.$nombreBuscado.'%')->get();

        return view('Clientes.buscador', compact('pescados', 'mariscos'));

    }
}
