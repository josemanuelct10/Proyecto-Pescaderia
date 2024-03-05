@extends('layouts.landing')

@section('title', 'Eliminar - Marisco')

@section('content')
    <h1>Listado de Marisco</h1>
    <form method="POST" action="{{ route('deleteMarisco') }}" class="update">
        @csrf
        @method('DELETE')

        <table class="table">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Nombre</th>
                    <th>Precio del KG</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Fecha de Compra</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mariscos as $marisco)
                    <tr>
                        <td><input type="checkbox" name="mariscos[{{ $marisco->id }}][eliminar]"></td>
                        <td>{{ $marisco->nombre }}</td>
                        <td>{{ $marisco->precioKG }}</td>
                        <td>{{ $marisco->descripcion }}</td>
                        <td>{{ $marisco->cantidad }}</td>
                        <td>{{ $marisco->fechaCompra }}</td>
                        <td>{{ $marisco->categoria }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table class="table">
            <tr>
                <td colspan="7"></td>
                <button class="btn btn-danger" id="btnEliminarMarisco">Eliminar</button>
            </tr>
        </table>

    </form>

    <script>
        document.getElementById('btnEliminarMarisco').addEventListener('click', function(event) {
            // Mostrar el cuadro de diálogo de confirmación antes de enviar el formulario
            if (!confirm('¿Estás seguro de que deseas eliminar el marisco seleccionado?')) {
                event.preventDefault(); // Evitar que el formulario se envíe si el usuario cancela
            }
        });
    </script>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

@endsection
