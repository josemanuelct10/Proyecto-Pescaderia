<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Factura;
use App\Models\Linea;
use App\Models\marisco;
use App\Models\pescado;
use Illuminate\Http\Request;
use App\Http\Requests\CarritoRequest;


class CarritoController extends Controller
{
    public function gestionCarrito(Request $request)
{
    $producto_id = $request->input('producto_id');
    $tipo = $request->input('tipo');
    $cantidad = $request->input('cantidad');

    // Obtener el carrito actual de la sesión o crear uno vacío
    $carrito = session()->get('carrito', []);

    // Agregar el producto al carrito con su identificador único
    if ($tipo === 'pescado') {
        $producto = Pescado::findOrFail($producto_id);
        $precio_total = $producto->precioKG * $cantidad;
        $carrito[] = [
            'tipo' => $tipo,
            'imagen' => $producto->imagen,
            'pescado_id' => $producto_id,
            'nombre' => $producto->nombre,
            'cantidad' => $cantidad,
            'precioKg' => $producto->precioKG,
            'precio_total' => $precio_total,
            'preparacion' => $request->input('preparacion')
        ];
    } elseif ($tipo === 'marisco') {
        $producto = Marisco::findOrFail($producto_id);
        $cocido = $producto->cocido;
        $precio_total = $producto->precioKG * $cantidad;
        $carrito[] = [
            'tipo' => $tipo,
            'marisco_id' => $producto_id,
            'nombre' => $producto->nombre,
            'cantidad' => $cantidad,
            'precioKg' => $producto->precioKG,
            'precio_total' => $precio_total,
            'preparacion' => $cocido
        ];
    } else {
        // Aquí puedes manejar algún tipo de error o situación inesperada
    }

    // Guardar el carrito actualizado en la sesión
    session()->put('carrito', $carrito);

    return redirect()->route('carrito.mostrar');
}


    public function mostrarCarrito()
    {
        // Obtener el carrito de la sesión
        $carrito = session()->get('carrito', []);

        return view('Clientes.Carrito', ['carrito' => $carrito]);
    }

    public function mostrarFacturas()
    {
        $userId = Auth::id();

        $facturas = Factura::where('user_id', $userId)->get();

        return view('Clientes.facturas', ['facturas' => $facturas]);
    }

    public function detalleFactura($id){
        $factura = Factura::findOrFail($id);
        $lineas = Linea::where('factura_id', $id)->get();

        return view('Clientes.detalleFactura', ['factura' => $factura], ['lineas' => $lineas]);
    }


    public function finalizarCompra(CarritoRequest $request)
    {
        // Recuperar el carrito de la sesión
        $carrito = session()->get('carrito');

        // Calcular el precio final sumando los precios totales de cada producto en el carrito

        $precioFinal = 0;

        if (!empty($carrito)) {
            foreach ($carrito as $item) {
                $precioFinal += $item['precio_total'];
            }
        }



        // Obtener el usuario actual que está finalizando la compra
        $user = Auth::user();

        // Crear la factura con el precio final, el método de pago y el user_id del usuario actual
        $factura = Factura::create([
            'precioFinal' => $precioFinal,
            'metodoPago' => 'contrareembolso',
            'horaRecogida' => $request->horaRecogida,
            'user_id' => $user->id,
        ]);


// Comprobar si el carrito no está vacío
if (!empty($carrito)) {
    foreach ($carrito as $item) {
        // Restar la cantidad vendida del inventario del producto
        if ($item['tipo'] === 'pescado') {
            $producto = Pescado::find($item['pescado_id']);
                Linea::create([
                'factura_id' => $factura->id,
                'pescado_id' => $producto->id,
                'cantidad' => $item['cantidad'],
                'preparacion' => $item['preparacion'],
                'precioFila' => $item['precio_total'],
            ]);

        } elseif ($item['tipo'] === 'marisco') {
            $producto = Marisco::find($item['marisco_id']);
            Linea::create([
                'factura_id' => $factura->id,
                'marisco_id' => $producto->id,
                'cantidad' => $item['cantidad'],
                'preparacion' => $item['preparacion'],
                'precioFila' => $item['precio_total'],
            ]);
        }

        if ($producto) {
            $producto->cantidad -= $item['cantidad'];
            $producto->save();
        }
    }
}
        // Limpiar el carrito de la sesión
        session()->forget('carrito');

        // Redirigir a alguna página de confirmación o a donde desees
        return redirect()->route('confirmacion', ['factura' => $factura->id]);
    }


    public function eliminarProductoCarrito(Request $request){

        $producto_id = $request->input('producto_id');

        // Obtener el carrito actual de la sesión
        $carrito = session()->get('carrito', []);

        // Verificar si el producto existe en el carrito y eliminarlo
        if (array_key_exists($producto_id, $carrito)) {
            unset($carrito[$producto_id]);
            session()->put('carrito', $carrito);
        }

        // Redirigir de vuelta al carrito después de eliminar el producto
        return redirect()->route('carrito.mostrar');
    }

    public function mostrarConfirmacion($facturaId)
{
    // Obtener la factura correspondiente al ID proporcionado
    $factura = Factura::findOrFail($facturaId);

    // Retornar la vista de confirmación con los detalles de la factura
    return view('Clientes.Confirmacion', compact('factura'));
}



}
