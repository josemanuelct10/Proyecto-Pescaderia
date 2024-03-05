@extends('layouts.landingClientes')

@section('title', 'Tienda de Pescados')

@section('content')
<style>
    .empty-message {
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>

<div class="container">
    <div class="row">
        @if($pescados->isEmpty())
            <div class="col-md-12 empty-message">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">¡Lo sentimos!</h5>
                        <p class="card-text">No hay pescados disponibles en este momento. ¡Vuelve pronto para ver nuestras deliciosas opciones!</p>
                    </div>
                </div>
            </div>
        @else
            @foreach($pescados as $pescado)
                <div class="col-md-4 mb-4">
                    @include('layouts._partials.seccionesProductos', [
                        'image' => asset('storage/images/' . basename($pescado->imagen)),
                        'alt' => $pescado->nombre,
                        'title' => $pescado->nombre,
                        'precio' => number_format($pescado->precioKG, 2) . "€",
                        'cantidadDisponible' => number_format($pescado->cantidad, 2). " KG",
                        'route' => route('clientes.pescadoDetails', ['pescado' => $pescado->id])
                    ])
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
