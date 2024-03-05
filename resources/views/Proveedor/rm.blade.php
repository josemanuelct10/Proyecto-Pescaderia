@extends('layouts.landing')

@section('title', 'Eliminar - Proveedores')

@section('content')
    <h1>Listado de Proveedores</h1>
    <form method="POST" action="{{ route('deleteProveedor') }}" class="update">
        @csrf
        @method('PUT')

        @include('layouts._partials.formProveedorRm')
    </form>
@endsection
