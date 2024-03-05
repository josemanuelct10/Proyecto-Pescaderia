<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pescado;
use App\Models\Marisco;

class ProductoController extends Controller
{
    // Método para mostrar todos los productos (pescados y mariscos)
    public function show(Pescado $pescado){
        // Obtener todos los pescados y mariscos
        $pescados = Pescado::all();
        $mariscos = Marisco::all();

        // Mostrar la vista 'productos' con los pescados y mariscos obtenidos
        return view('productos', compact('pescados', 'mariscos'));
    }
}
