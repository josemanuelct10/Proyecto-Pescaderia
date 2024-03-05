@extends('layouts.landing')

@section('title', 'Actualizar Marisco')

@section('content')
    <h1>Actualizar Marisco</h1>
    <form method="post" action="{{ route('updateMarisco') }}" class="update">
        @csrf
        @method('put')

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Precio del KG</th>
                    <th>Descripción</th>
                    <th>Origen</th>
                    <th>Cantidad</th>
                    <th>Fecha de Compra</th>
                    <th>Categoría</th>
                    <th>Cocido</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mariscos as $marisco)
                    <tr>
                        <td><input type="text" class="form-control" name="mariscos[{{ $marisco->id }}][id]" value="{{ $marisco->id }}" readonly></td>
                        <td><input type="text" class="form-control" name="mariscos[{{ $marisco->id }}][nombre]" value="{{ $marisco->nombre }}"></td>
                        <td><input type="number" class="form-control" name="mariscos[{{ $marisco->id }}][precioKG]" value="{{ $marisco->precioKG }}" step="0.01"></td>
                        <td><textarea class="form-control" name="mariscos[{{ $marisco->id }}][descripcion]">{{ $marisco->descripcion }}</textarea></td>
                        <td><input type="text" class="form-control" name="mariscos[{{ $marisco->id }}][origen]" value="{{ $marisco->origen }}"></td>
                        <td><input type="number" class="form-control" name="mariscos[{{ $marisco->id }}][cantidad]" value="{{ $marisco->cantidad }}"></td>
                        <td><input type="date" class="form-control" name="mariscos[{{ $marisco->id }}][fechaCompra]" value="{{ $marisco->fechaCompra }}"></td>
                        <td><input type="text" class="form-control" name="mariscos[{{ $marisco->id }}][categoria]" value="{{ $marisco->categoria }}"></td>
                        <td><input type="checkbox" class="form-check-input" name="mariscos[{{ $marisco->id }}][cocido]" {{ $marisco->cocido ? 'checked' : '' }}></td>
                        <td>
                            <!-- Botón para actualizar un marisco específico -->
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Botón para actualizar todos los mariscos a la vez -->
        <button type="submit" class="btn btn-primary">Actualizar Todos</button>
        <br><br>
    </form>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

@endsection
