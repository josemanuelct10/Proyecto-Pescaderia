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
