@extends('layouts.landingClientes')

@section('title', 'Buscar Producto')

@section('content')
<div class="container">
    <div class="row">
        @if($pescados->isEmpty() && $mariscos->isEmpty())
            <div class="col-md-12 text-center">
                <div class="alert alert-warning" role="alert">
                    <strong>¡Lo sentimos!</strong> No se han encontrado productos con ese nombre. Por favor, prueba con otro término de búsqueda.
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

            @foreach($mariscos as $marisco)
            <div class="col-md-4 mb-4">
                @include('layouts._partials.seccionesProductos', [
                    'image' => asset('storage/images/' . basename($marisco->imagen)),
                    'alt' => $marisco->nombre,
                    'title' => $marisco->nombre,
                    'precio' => number_format($marisco->precioKG, 2) . "€",
                    'cantidadDisponible' => number_format($marisco->cantidad, 2). " KG",
                    'route' => route('clientes.mariscoDetails', ['marisco' => $marisco->id])
                ])
            </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
