<table class="table">
    <thead>
        <tr>
            <th>Eliminar</th>
            <th>Id</th>
            <th>Descripcion</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categorias as $categoria)
            <tr>
                <td><input type="checkbox" name="categoria[{{ $categoria->id }}][eliminar]"></td>
                <td>{{ $categoria->id }}</td>
                <td>{{ $categoria->descripcion }}</td>
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
