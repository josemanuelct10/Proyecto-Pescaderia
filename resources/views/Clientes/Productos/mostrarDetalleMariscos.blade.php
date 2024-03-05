@extends('layouts.landingClientes')

@section('title', $marisco->nombre)

@section('content')

    @include('layouts._partials.mariscoDetails', [
        'image' => asset('storage/images/' . basename($marisco->imagen)),
        'title' => $marisco->nombre,
        'precio' => number_format($marisco->precioKG, 2) . "€",
        'origen' => $marisco->origen,
        'categoria' => $marisco->categoria,
        'cocido' => $marisco->cocido ? 'Sí' : 'No',
        'route' => route('gestionCarrito')
    ])

@endsection
