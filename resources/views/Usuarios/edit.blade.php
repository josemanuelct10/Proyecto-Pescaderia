@extends('layouts.landing')

@section('title', 'Actualizar Usuario')

@section('content')
    <h1>Actualizar Usuario</h1>
    <form method="post" action="{{ route('usuarios.update') }}" class="update">
        @csrf
        @method('put')

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Categoria de Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr>
                        <td><input type="text" class="form-control" name="usuarios[{{ $usuario->id }}][id]" value="{{ $usuario->id }}" readonly></td>
                        <td><input type="text" class="form-control" name="usuarios[{{ $usuario->id }}][nombre]" value="{{ $usuario->name }}" readonly></td>
                        <td><input type="text" class="form-control" name="usuarios[{{ $usuario->id }}][dni]" value="{{ $usuario->dni }}" readonly></td>
                        <td>
                            <select class="form-select" name="usuarios[{{$usuario->id}}][categoria_usuario_id]">
                                @foreach($categoriasUsuarios as $categoriaUsuario)
                                    <option value="{{ $categoriaUsuario->id }}" {{ $usuario->categoria_usuario_id == $categoriaUsuario->id ? 'selected' : '' }}>
                                        {{ $categoriaUsuario->descripcion }}
                                    </option>
                                @endforeach
                            </select>
                        </td>

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

    <br><br><br><br><br><br><br><br><br>
@endsection
