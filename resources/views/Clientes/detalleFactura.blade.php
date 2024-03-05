@extends(Auth::user()->categoria_usuario_id == 0 ? 'layouts.landing' : 'layouts.landingClientes')

@section('title', 'Factura ' . $factura->id)

@section('content')
    <div class="container">
        <h1>Detalle de Factura</h1>
        <p><strong>ID de Factura:</strong> {{ $factura->id }}</p>
        <p><strong>Fecha y Hora:</strong> {{ $factura->created_at }}</p>
        <p><strong>Precio Total:</strong> {{ number_format($factura->precioFinal, 2) }}€</p>
        <p><strong>Hora de Recogida:</strong> {{ $factura->horaRecogida }}</p>
        <p><strong>Método de Pago:</strong> {{ $factura->metodoPago }}</p>

        <h2>Productos de la Factura</h2>
        <ul>
            @foreach ($lineas as $linea)
                <li>
                    @if (!is_null($linea->pescado_id))
                        Producto: {{ $linea->pescado->nombre }}
                    @elseif (!is_null($linea->marisco_id))
                        Producto: {{ $linea->marisco->nombre }}
                    @endif
                    <br>
                    Cantidad: {{ $linea->cantidad }}
                    <br>
                    Precio por unidad: {{ number_format($linea->precioFila, 2) }}€
                </li>
            @endforeach
        </ul>

      <br><br>
    </div>
@endsection
