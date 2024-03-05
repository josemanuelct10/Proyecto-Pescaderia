@extends('layouts.landing')

@section('title', 'Marisco')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Centramos horizontalmente las columnas -->
        <div class="col-md-3 mb-4">
            @include('layouts._partials.secciones', [
                'image' => asset('assets/add.png'),
                'alt' => "Imagen de Insertar",
                'title'=> "Añadir",
                'description' => "Inserción de Marisco",
                'route' => route('addMarisco')
            ])
        </div>
        <div class="col-md-3 mb-4">
            @include('layouts._partials.secciones', [
                'image' => asset('assets/rm.png'),
                'alt' => "Eliminación de Marisco",
                'title'=> "Eliminar",
                'description' => "Eliminación de Marisco",
                'route' => route('rmMarisco')
            ])
        </div>
        <div class="col-md-3 mb-4">
            @include('layouts._partials.secciones', [
                'image' => asset('assets/update.png'),
                'alt' => "Actualización de Marisco",
                'title'=> "Actualización",
                'description' => "Actualización de Marisco",
                'route' => route('editMarisco')
            ])
        </div>
        <div class="col-md-3 mb-4">
            @include('layouts._partials.secciones', [
                'image' => asset('assets/marisco2.png'),
                'alt' => "Mostrar Marisco",
                'title'=> "Mostrar",
                'description' => "Mostrar Marisco",
                'route' => route('showMarisco')
            ])
        </div>
    </div>
</div>

<br><br><br>

@endsection
