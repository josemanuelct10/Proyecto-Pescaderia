@extends('layouts.landingClientes')
@section('title', 'Confirmacion')

@section('content')
<style>
    /* Estilos personalizados para centrar la tarjeta */
    .card {
        margin-top: 50px; /* Espacio superior */
        margin-bottom: 100px; /* Espacio inferior */
    }

    @media (min-width: 576px) {
        .card {
            margin-top: 100px; /* Espacio superior en pantallas pequeñas */
            margin-bottom: 100px; /* Espacio inferior en pantallas pequeñas */
        }
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">Confirmación de Compra</div>

                <div class="card-body">
                    <p class="lead">Su compra ha sido procesada con éxito. Gracias por su pedido.</p>
                    <hr>
                    <p><strong>Número de factura:</strong> {{ $factura->id }}</p>
                    <p><strong>Precio Total:</strong> {{ $factura->precioFinal }}</p>
                    <p><strong>Hora de Recogida:</strong> {{$factura->horaRecogida}}</p>
                    <p><strong>Método de Pago:</strong> {{ $factura->metodoPago }}</p>
                </div>
            </div>
        </div>
    </div>
</div>

<br><br><br>
@endsection
