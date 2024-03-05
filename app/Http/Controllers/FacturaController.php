<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Linea;


class FacturaController extends Controller
{
    public function mostrarFacturas()
    {
        $facturas = Factura::all();

        return view('FacturasAdmin', ['facturas' => $facturas]);
    }

    public function detalleFactura($id){
        $factura = Factura::findOrFail($id);
        $lineas = Linea::where('factura_id', $id)->get();

        return view('Clientes.detalleFactura', ['factura' => $factura], ['lineas' => $lineas]);
    }

    public function rmFactura($id){
        $factura = Factura::findOrFail($id);
        $factura->delete();

        return redirect()->route('facturas.admin')->with('success', "Factura eliminado correctamente.");

    }
}
