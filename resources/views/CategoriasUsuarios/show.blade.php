@extends('layouts.landing')

@section('title', 'Categorias de Usuarios')

@section('content')
    <div class="container">
        <h1 class="mb-4">Listado de Categorias</h1>
        <h2 class="display-4 mb-4">@yield('titulo')</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Descripcion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->descripcion }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>






    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
