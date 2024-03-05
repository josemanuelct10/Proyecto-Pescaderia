<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Linea;

class FacturaController extends Controller
{
    // Método para mostrar todas las facturas
    public function mostrarFacturas()
    {
        // Obtener todas las facturas
        $facturas = Factura::all();

        // Mostrar la vista 'FacturasAdmin' con las facturas obtenidas
        return view('FacturasAdmin', ['facturas' => $facturas]);
    }

    // Método para mostrar los detalles de una factura específica
    public function detalleFactura($id)
    {
        // Obtener la factura y sus líneas asociadas
        $factura = Factura::findOrFail($id);
        $lineas = Linea::where('factura_id', $id)->get();

        // Mostrar la vista 'Clientes.detalleFactura' con los detalles obtenidos
        return view('Clientes.detalleFactura', ['factura' => $factura], ['lineas' => $lineas]);
    }

    // Método para eliminar una factura
    public function rmFactura($id)
    {
        // Encontrar la factura por su ID y eliminarla
        $factura = Factura::findOrFail($id);
        $factura->delete();

        // Redirigir a la página de administración de facturas con un mensaje de éxito
        return redirect()->route('facturas.admin')->with('success', "Factura eliminada correctamente.");
    }
}
