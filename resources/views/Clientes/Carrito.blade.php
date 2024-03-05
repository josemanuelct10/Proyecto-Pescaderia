@extends('layouts.landingClientes')

@section('title', 'Carrito de Compras')

@section('content')
<div class="container">
    <h2 class="display-4 mb-4">@yield('titulo')</h2>
    <form id="finalizarCompraForm" action="{{ route('finalizarCompra') }}" method="POST">
        @csrf
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Imagen</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Especificaciones</th>
                    <th scope="col">Precio KG</th>
                    <th scope="col">Precio Total</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($carrito as $producto_id => $datos)
                <tr>
                    <td>
                        <img src="{{asset('storage/images/' . basename($datos['imagen']))}}" style="max-width: 100px; max-height: 100px;">
                    </td>

                    <td>{{ $datos['tipo'] }}</td>
                    <td>{{ $datos['nombre'] }}</td>
                    <td>{{ $datos['cantidad'] }} KG </td>
                    <td>
                        @if ($datos['tipo'] === 'pescado')
                            {{ $datos['preparacion'] }}
                        @elseif ($datos['tipo'] === 'marisco')
                            {{ $datos['preparacion'] ? 'Cocido' : 'No Cocido' }}
                        @endif
                    </td>
                    <td>{{ number_format($datos['precioKg'], 2) }}€</td>
                    <td>{{ number_format($datos['precio_total'], 2) }}€</td>
                    <td>
                        <button type="button" class="btn btn-danger eliminarProducto" data-producto-id="{{ $producto_id }}">Eliminar</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6">No hay productos en el carrito.</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Campo de entrada para la hora de recogida -->
        <div class="mb-3">
            <label for="horaRecogida" class="form-label">Hora de recogida</label>
            <input type="time" id="horaRecogida" name="horaRecogida" class="form-control @error('horaRecogida') is-invalid @enderror">
            @error('horaRecogida')
                <p style="color: red;">{{$message}}</p>
            @enderror
        </div>

        <!-- Botón para finalizar la compra -->
        <div class="text-center">
            <button type="button" id="finalizarCompraBtn" class="btn btn-primary">Finalizar Compra</button>
        </div>
    </form>
</div>

<script>
    // Manejar el evento de clic en el botón "Eliminar"
    document.querySelectorAll('.eliminarProducto').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var productoId = this.getAttribute('data-producto-id');
            var form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route("carrito.rmProducto") }}';
            form.innerHTML = `
                @csrf
                <input type="hidden" name="producto_id" value="${productoId}">
            `;
            document.body.appendChild(form);
            form.submit();
        });
    });

    // Manejar el evento de clic en el botón "Finalizar Compra"
    document.getElementById('finalizarCompraBtn').addEventListener('click', function() {
        document.getElementById('finalizarCompraForm').submit();
    });
</script>
@endsection
