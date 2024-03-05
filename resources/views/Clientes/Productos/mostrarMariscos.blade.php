@extends('layouts.landingClientes')

@section('title', 'Tienda de mariscos')

@section('content')
<style>
    .empty-message {
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>

<div class="container">
    <div class="row">
        @if($mariscos->isEmpty())
            <div class="col-md-12 empty-message">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">¡Lo sentimos!</h5>
                        <p class="card-text">No hay mariscos disponibles en este momento. ¡Vuelve pronto para ver nuestras deliciosas opciones!</p>
                    </div>
                </div>
            </div>
        @else
            @foreach($mariscos as $marisco)
                <div class="col-md-4 mb-4">
                    @include('layouts._partials.seccionesProductos', [
                        'image' => asset('storage/images/' . basename($marisco->imagen)),
                        'alt' => $marisco->nombre,
                        'title' => $marisco->nombre,
                        'precio' => number_format($marisco->precioKG, 2) . "€",
                        'cantidadDisponible' => number_format($marisco->cantidad, 2). " KG",
                        'route' => route('clientes.mariscoDetails', ["marisco" => $marisco->id])
                    ])
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
