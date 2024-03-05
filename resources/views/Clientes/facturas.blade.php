@extends('layouts.landingClientes')

@section('content')
    <div class="container">
        <h1>Mis Facturas</h1>
        @if($facturas->isEmpty())
            <p>No tienes facturas aún.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha y Hora</th>
                        <th>Precio Total</th>
                        <th>Método de Pago</th>
                        <th>Hora de Recogida</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($facturas as $factura)
                        <tr>
                            <td>{{$factura->id}}</td>
                            <td>{{ $factura->created_at }}</td>
                            <td>{{ number_format($factura->precioFinal, 2) }}€</td>
                            <td>{{ $factura->metodoPago }}</td>
                            <td>{{$factura->horaRecogida}}</td>

                            <td>
                                <form action="{{ route('factura.detalle', ['factura' => $factura->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Ver Detalles</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
