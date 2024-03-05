<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pescado;
use App\Models\marisco;



class ProductoController extends Controller
{
    public function show(Pescado $pescado){
        $pescados = Pescado::all();
        $mariscos = Marisco::all();
        return view('productos', compact('pescados', 'mariscos'));
    }}
