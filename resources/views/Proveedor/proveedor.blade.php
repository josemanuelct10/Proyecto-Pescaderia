@extends('layouts.landing')

@section('title', 'Proveedores')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Centramos horizontalmente las columnas -->
        <div class="col-md-3 mb-4">
            @include('layouts._partials.secciones', [
                'image' => asset('assets/add.png'),
                'alt' => "Imagen de Insertar",
                'title'=> "Añadir",
                'description' => "Inserción de Proveedor",
                'route' => route('addProveedor')
            ])
        </div>
        <div class="col-md-3 mb-4">
            @include('layouts._partials.secciones', [
                'image' => asset('assets/rm.png'),
                'alt' => "Eliminación de Proveedor",
                'title'=> "Eliminar",
                'description' => "Eliminación de Proveedor",
                'route' => route('rmProveedor')
            ])
        </div>
        <div class="col-md-3 mb-4">
            @include('layouts._partials.secciones', [
                'image' => asset('assets/update.png'),
                'alt' => "Actualización de Proveedor",
                'title'=> "Actualización",
                'description' => "Actualización de Proveedor",
                'route' => route('editProveedor')
            ])
        </div>
        <div class="col-md-3 mb-4">
            @include('layouts._partials.secciones', [
                'image' => asset('assets/proveedor.png'),
                'alt' => "Mostrar Proveedores",
                'title'=> "Mostrar",
                'description' => "Mostrar Proveedores",
                'route' => route('showProveedor')
            ])
        </div>
    </div>
</div>
@endsection
