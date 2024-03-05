<div class="container">
    <h2 class="display-4 mb-4">@yield('titulo')</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio del KG</th>
                <th scope="col">Descripción</th>
                <th scope="col">Origen</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Fecha de Compra</th>
                <th scope="col">Categoría</th>
                <th scope="col">Cocido</th>
                <th scope="col">Proveedor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mariscos as $marisco)
            <tr>
                <td>{{ $marisco->id }}</td>
                <td>{{ $marisco->nombre }}</td>
                <td>{{ $marisco->precioKG }}</td>
                <td>{{ $marisco->descripcion }}</td>
                <td>{{ $marisco->origen }}</td>
                <td>{{ $marisco->cantidad }}</td>
                <td>{{ $marisco->fechaCompra }}</td>
                <td>{{ $marisco->categoria }}</td>
                <td>{{ $marisco->cocido ? 'Sí' : 'No' }}</td>
                <td>{{ $marisco->proveedor->nombre }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
