@extends('layouts.landing')

@section('title', 'Trabajadores')

@section('content')
    <div class="section-container">
        @include('layouts._partials.section', [
            'enlace' => route('addTrabajadores'),
            'enlaceImagen' => asset('assets/add.png'),
            'texto' => 'Añadir',
        ])

        @include('layouts._partials.section', [
            'enlace' => route('rmTrabajadores'),
            'enlaceImagen' => asset('assets/rm.png'),
            'texto' => 'Eliminar',
        ])

        @include('layouts._partials.section', [
            'enlace' => route('updateTrabajadores'),
            'enlaceImagen' => asset('assets/update.png'),
            'texto' => 'Actualizar',
        ])
        @include('layouts._partials.section', [
            'enlace' => route('mostrarTrabajadores'),
            'enlaceImagen' => asset('assets/trabajador.png'),
            'texto' => 'Mostrar',
        ])
    </div>
@endsection

