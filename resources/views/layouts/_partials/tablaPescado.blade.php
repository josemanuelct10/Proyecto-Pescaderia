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
                <th scope="col">Proveedor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pescados as $pescado)
            <tr>
                <td>{{ $pescado->id }}</td>
                <td>{{ $pescado->nombre }}</td>
                <td>{{ $pescado->precioKG }}€</td>
                <td>{{ $pescado->descripcion }}</td>
                <td>{{ $pescado->origen }}</td>
                <td>{{ $pescado->cantidad }}</td>
                <td>{{ $pescado->fechaCompra }}</td>
                <td>{{ $pescado->categoria }}</td>
                <td>{{ $pescado->proveedor->nombre }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
