@extends('layouts.landing')

@section('title', 'Usuarios')

@section('content')
    <div class="container">
        <h1 class="mb-4">Listado de Usuarios</h1>
        <h2 class="display-4 mb-4">@yield('titulo')</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Direccion</th>
                    <th scope="col">Tipo de Usuario</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->dni }}</td>
                    <td>{{ $usuario->direccion }}</td>
                    <td>{{ $usuario->categoriaUsuario->descripcion}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection
