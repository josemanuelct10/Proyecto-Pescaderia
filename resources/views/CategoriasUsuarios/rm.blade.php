@extends('layouts.landing')

@section('title', 'Eliminar - Categorias')

@section('content')
    <h1>Listado de Categorias</h1>

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="{{ route('categorias.delete') }}" class="update">
        @csrf
        @method('PUT')

        @include('layouts._partials.formCategoriasRm')
    </form>




    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
