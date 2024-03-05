@extends('layouts.landing')

@section('title', 'Eliminar - Proveedores')

@section('content')
    <h1>Listado de Proveedores</h1>
    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <form method="POST" action="{{ route('deleteProveedor') }}" class="update">
        @csrf
        @method('PUT')

        <table class="table">
            <thead>
                <tr>
                    <th>Eliminar</th>
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
                        <td><input type="checkbox" name="proveedor[{{ $proveedor->id }}][eliminar]"></td>
                        <td>{{ $proveedor->id }}</td>
                        <td>{{ $proveedor->nombre }}</td>
                        <td>{{ $proveedor->direccion }}</td>
                        <td>{{ $proveedor->telefono }}</td>
                        <td>{{ $proveedor->cif }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table class="table">
            <tr>
                <td colspan="7"></td>
                <td><input class="update btn btn-danger" type="submit" id="eliminar" name="eliminar" value="Eliminar" /></td>
            </tr>
        </table>

    </form>

    <script>
        document.getElementById('eliminar').addEventListener('click', function(event) {
            // Mostrar el cuadro de diálogo de confirmación antes de enviar el formulario
            if (!confirm('¿Estás seguro de que deseas eliminar el pescado seleccionado?')) {
                event.preventDefault(); // Evitar que el formulario se envíe si el usuario cancela
            }
        });
    </script>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

@endsection
