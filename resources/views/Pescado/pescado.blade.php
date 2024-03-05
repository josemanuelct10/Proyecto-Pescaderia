@extends('layouts.landing')

@section('title', 'Pescado')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Centramos horizontalmente las columnas -->
        <div class="col-md-3 mb-4">
            @include('layouts._partials.secciones', [
                'image' => asset('assets/add.png'),
                'alt' => "Imagen de Insertar",
                'title'=> "Añadir",
                'description' => "Inserción de Pescado",
                'route' => route('addPescado')
            ])
        </div>
        <div class="col-md-3 mb-4">
            @include('layouts._partials.secciones', [
                'image' => asset('assets/rm.png'),
                'alt' => "Eliminación de Pescado",
                'title'=> "Eliminar",
                'description' => "Eliminación de Pescado",
                'route' => route('rmPescado')
            ])
        </div>
        <div class="col-md-3 mb-4">
            @include('layouts._partials.secciones', [
                'image' => asset('assets/update.png'),
                'alt' => "Actualización de Pescado",
                'title'=> "Actualización",
                'description' => "Actualización de Pescado",
                'route' => route('editPescado')
            ])
        </div>
        <div class="col-md-3 mb-4">
            @include('layouts._partials.secciones', [
                'image' => asset('assets/pescado2.png'),
                'alt' => "Mostrar Pescado",
                'title'=> "Mostrar",
                'description' => "Mostrar Pescado",
                'route' => route('showPescado')
            ])
        </div>
    </div>
</div>
<br><br><br>
@endsection
