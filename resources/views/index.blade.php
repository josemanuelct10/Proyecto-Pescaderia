@extends('layouts.landing')

@section('title', 'Inicio')

@section('content')
<div class="container">
    <div class="row justify-content-center"> <!-- Centramos horizontalmente las columnas -->
        <div class="col-md-6"> <!-- Usamos la mitad del ancho en dispositivos medianos -->
            @include('layouts._partials.secciones', [
                'image' => asset('assets/pescado2.png'),
                'alt' => "Imagen de pescado",
                'title'=> "Pescado",
                'description' => "Manipulacion de Pescados",
                'route' => route('pescado')
            ])
        </div>
        <div class="col-md-6"> <!-- Usamos la mitad del ancho en dispositivos medianos -->
            @include('layouts._partials.secciones', [
                'image' => asset('assets/marisco2.png'),
                'alt' => "Imagen de marisco",
                'title'=> "Marisco",
                'description' => "Manipulacion de Mariscos",
                'route' => route('marisco')
            ])
        </div>
    </div>
</div>
@endsection
