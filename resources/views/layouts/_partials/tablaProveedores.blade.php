<div class="container">
    <h1 class="mb-4">Lista de Proveedores</h1>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Dirección</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Categoría</th>
                <th scope="col">CIF</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedor)
            <tr>
                <td>{{ $proveedor->id }}</td>
                <td>{{ $proveedor->nombre }}</td>
                <td>{{ $proveedor->direccion }}</td>
                <td>{{ $proveedor->telefono }}</td>
                <td>{{ $proveedor->categoria }}</td>
                <td>{{ $proveedor->cif }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
