@extends('layouts.landing')

@section('title', 'Actualizar Proveedores')

@section('content')
    <h1>Actualizar Proveedores</h1>
    <form method="post" action="{{ route('updateProveedor') }}" class="update">
        @csrf
        @method('put')

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>CIF</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($proveedores as $proveedor)
                    <tr>
                        <td><input type="text" class="form-control" name="proveedores[{{ $proveedor->id }}][id]" value="{{ $proveedor->id }}" readonly></td>
                        <td><input type="text" class="form-control" name="proveedores[{{ $proveedor->id }}][nombre]" value="{{ $proveedor->nombre }}"></td>
                        <td><input type="text" class="form-control" name="proveedores[{{ $proveedor->id }}][direccion]" value="{{ $proveedor->direccion }}"></td>
                        <td><input type="text" class="form-control" name="proveedores[{{ $proveedor->id }}][telefono]" value="{{ $proveedor->telefono }}"</input></td>
                        <td><input type="text" class="form-control" name="proveedores[{{ $proveedor->id }}][cif]" value="{{ $proveedor->cif }}"></td>

                        <td>
                            <!-- Botón para actualizar un proveedor específico -->
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Botón para actualizar todos los proveedors a la vez -->
        <button type="submit" class="btn btn-primary">Actualizar Todos</button>
        <br><br>
    </form>
@endsection
