@extends('layouts.landing')

@section('title', "Facturas")

@section('content')
<br><br>
    <div class="container">
        <h1>Facturas</h1>
        @if($facturas->isEmpty())
            <p>No tienes facturas aún.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Cliente</th>
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
                            <td>{{$factura->user->name}}</td>
                            <td>{{ $factura->created_at }}</td>
                            <td>{{ number_format($factura->precioFinal, 2) }}€</td>
                            <td>{{ $factura->metodoPago }}</td>
                            <td>{{$factura->horaRecogida}}</td>

                            <td>
                                <form action="{{ route('factura.detalle', ['factura' => $factura->id]) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Ver Detalles</button>
                                </form>
                                <br>
                                <form action="{{ route('factura.rm', ['factura' => $factura->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <br><br><br><br><br><br>    <br><br><br>
    <br><br><br>



@endsection
