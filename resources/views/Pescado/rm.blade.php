@extends('layouts.landing')

@section('title', 'Eliminar - Pescado')

@section('content')
    <h1>Listado de Pescados</h1>
    <form method="POST" action="{{ route('deletePescado') }}" class="update" id="formEliminarPescado">
        @csrf
        @method('DELETE')
        <table class="table">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Origen</th>
                    <th>Precio del KG</th>
                    <th>Cantidad</th>
                    <th>Fecha de Compra</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pescados as $pescado)
                    <tr>
                        <td><input type="checkbox" name="pescados[{{ $pescado->id }}][eliminar]"></td>
                        <td>{{ $pescado->nombre }}</td>
                        <td>{{ $pescado->descripcion }}</td>
                        <td>{{ $pescado->origen }}</td>
                        <td>{{ $pescado->precioKG }}</td>
                        <td>{{ $pescado->cantidad }}</td>
                        <td>{{ $pescado->fechaCompra }}</td>
                        <td>{{ $pescado->categoria }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <button class="btn btn-danger" id="btnEliminarPescado">Eliminar</button>
    </form>

    <script>
        document.getElementById('btnEliminarPescado').addEventListener('click', function(event) {
            // Mostrar el cuadro de diálogo de confirmación antes de enviar el formulario
            if (!confirm('¿Estás seguro de que deseas eliminar el pescado seleccionado?')) {
                event.preventDefault(); // Evitar que el formulario se envíe si el usuario cancela
            }
        });
    </script>
@endsection
