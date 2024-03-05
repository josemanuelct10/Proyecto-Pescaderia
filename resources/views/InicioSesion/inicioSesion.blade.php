<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{asset('assets/logo.png')}}" />
    <title>Iniciar Sesión - Pescadería</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light"> <!-- Añadimos una clase de fondo de color claro -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white"> <!-- Ajustamos el encabezado del formulario -->
                        <img src="{{ asset('assets/logo.png') }}" alt="Logo de Pescadería" class="mb-2" width="100px"> <!-- Agregar el logo aquí -->
                        <h4 class="mb-0">Iniciar Sesión</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first('error') }}
                            </div>
                        @endif
                        <form action="{{ route('gestionInicioSesion') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Iniciar Sesión</button> <!-- Cambiamos el color del botón -->
                        </form>
                    </div>
                </div>
                <div class="mt-3">
                    <p>¿No tienes una cuenta? <a href="{{ route('registro') }}">Regístrate aquí</a>.</p>
                </div>

            </div>
        </div>
    </div>

</body>
</html>
