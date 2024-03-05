@extends('layouts.landing')

@section('title', 'Productos')


@section('content')
    <h1>Listado de Pescados</h1>
    @include('layouts._partials.tablaPescado')

    <h1>Listado de Marisco</h1>
    @include('layouts._partials.tablaMarisco')
@endsection
