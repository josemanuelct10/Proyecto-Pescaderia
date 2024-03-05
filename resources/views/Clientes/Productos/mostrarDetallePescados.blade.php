@extends('layouts.landingClientes')

@section('title', $pescado->nombre)

@section('content')

    @include('layouts._partials.pescadoDetails', [
        'image' => asset('storage/images/' . basename($pescado->imagen)),
        'title' => $pescado->nombre,
        'precio' => number_format($pescado->precioKG, 2) . "€",
        'origen' => $pescado->origen,
        'cantidadRestante' => number_format($pescado->cantidad, 2) . " KG",
        'route' => route('gestionCarrito')
    ])

@endsection
