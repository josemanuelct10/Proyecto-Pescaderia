@extends(Auth::user()->categoriaUsuario->descripcion === 'Administrador' ? 'layouts.landing' : 'layouts.landingClientes')

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
        <table class="table">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio por unidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lineas as $linea)
                    <tr>
                        <td>
                            @if (!is_null($linea->pescado_id))
                                <img src="{{ asset('storage/images/' . basename($linea->pescado->imagen))}}" alt="{{ $linea->pescado->nombre }}" style="max-width: 100px;">
                            @elseif (!is_null($linea->marisco_id))
                                <img src="{{ asset('storage/images/' . basename($linea->marisco->imagen))}}" alt="{{ $linea->marisco->nombre }}" style="max-width: 100px;">
                            @endif
                        </td>
                        <td>
                            @if (!is_null($linea->pescado_id))
                                {{ $linea->pescado->nombre }}
                            @elseif (!is_null($linea->marisco_id))
                                {{ $linea->marisco->nombre }}
                            @endif
                        </td>
                        <td>{{ $linea->cantidad }}</td>
                        <td>{{ number_format($linea->precioFila, 2) }}€</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
