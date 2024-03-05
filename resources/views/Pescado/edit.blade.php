@extends('layouts.landing')

@section('title', 'Actualizar Pescado')

@section('content')
    <h1>Actualizar Pescado</h1>
    <form method="post" action="{{ route('updatePescado') }}" class="update">
        @csrf
        @method('put')

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Origen</th>
                    <th>Precio del KG</th>
                    <th>Cantidad</th>
                    <th>Fecha de Compra</th>
                    <th>Categoría</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pescados as $pescado)
                    <tr>
                        <td><input type="text" class="form-control" name="pescados[{{ $pescado->id }}][id]" value="{{ $pescado->id }}" readonly></td>
                        <td><input type="text" class="form-control" name="pescados[{{ $pescado->id }}][nombre]" value="{{ $pescado->nombre }}"></td>
                        <td><textarea class="form-control" name="pescados[{{ $pescado->id }}][descripcion]">{{ $pescado->descripcion }}</textarea></td>
                        <td><input type="text" class="form-control" name="pescados[{{ $pescado->id }}][origen]" value="{{ $pescado->origen }}"></td>
                        <td><input type="number" class="form-control" name="pescados[{{ $pescado->id }}][precioKG]" value="{{ $pescado->precioKG }}" step="0.01"></td>
                        <td><input type="number" class="form-control" name="pescados[{{ $pescado->id }}][cantidad]" value="{{ $pescado->cantidad }}"></td>
                        <td><input type="date" class="form-control" name="pescados[{{ $pescado->id }}][fechaCompra]" value="{{ $pescado->fechaCompra }}"></td>
                        <td><input type="text" class="form-control" name="pescados[{{ $pescado->id }}][categoria]" value="{{ $pescado->categoria }}"></td>
                        <td>
                            <!-- Botón para actualizar un pescado específico -->
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Botón para actualizar todos los pescados a la vez -->
        <button type="submit" class="btn btn-primary">Actualizar Todos</button>
        <br><br>
    </form>
    <br><br><br><br><br><br><br><br><br><br>

@endsection
