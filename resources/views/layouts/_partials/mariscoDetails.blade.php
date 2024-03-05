<!-- partials/secciones.blade.php -->

<div class="product-details-container">
    <div class="product-image">
        <img src="{{ $image }}" class="product-image" alt="{{ $title }}" style="max-width: 550px;">
    </div>
    <div class="product-details">
        <h2 class="product-title">{{ $title }}</h2>
        <p class="product-price">Precio: {{ $precio }}</p>
        <p class="product-price">Origen: {{ $origen }}</p>
        <p class="product-price">Categoría: {{ $categoria }}</p>
        <p class="product-price">Cocido: {{ $cocido }}</p>


        <form action="{{$route}}" method="POST">
            @csrf <!-- Agrega el token CSRF para protección -->
            <!-- Campo oculto para el ID del producto -->
            <input type="hidden" name="producto_id" value="{{ $marisco->id }}">
            <input type="hidden" name="tipo" id="tipo" value="marisco">


            <div class="form-group">
                <label for="cantidad" class="form-label">Cantidad: </label>
                <input type="number" class="form-input" id="cantidad" name="cantidad" placeholder="Cantidad en KG" step="0.001">
            </div>

            <input type="submit" class="btn-add-to-cart" value="Agregar al carrito">
        </form>

    </div>
</div>

<style>
    .product-details-container {
        display: flex;
        align-items: center; /* Centrar verticalmente */
    }

    .product-image {
        flex: 0 0 40%; /* 40% de la anchura */
        margin-right: 100px; /* Margen derecho mayor */
        margin-left: 20px; /* Margen izquierdo añadido */
    }

    .product-image img {
        width: 100%;
    }

    .product-details {
        flex: 0 0 60%; /* 60% de la anchura */
    }

    .product-title {
        font-size: 28px; /* Tamaño del título aumentado */
        margin-bottom: 20px; /* Espacio inferior aumentado */
    }

    .product-price {
        font-size: 18px; /* Tamaño del precio aumentado */
        margin-bottom: 15px; /* Espacio inferior aumentado */
    }

    .form-group {
        margin-bottom: 25px; /* Espacio inferior aumentado */
    }

    .form-label {
        display: block; /* Mostrar como bloque */
        margin-bottom: 5px; /* Espacio inferior */
    }

    .form-input {
        width: 500px; /* Ancho del input */
        padding: 8px; /* Relleno */
    }

    .btn-add-to-cart {
        background-color: #007bff; /* Color de fondo */
        color: #fff; /* Color del texto */
        border: none; /* Sin borde */
        padding: 12px 24px; /* Relleno aumentado */
        cursor: pointer; /* Cambiar cursor al pasar por encima */
        border-radius: 5px; /* Bordes redondeados */
    }

    .btn-add-to-cart:hover {
        background-color: #0056b3; /* Cambiar color de fondo al pasar por encima */
    }
</style>
