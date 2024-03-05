<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{asset('assets/logo.png')}}" />
    <title>Cambio de Contraseña - Pescadería</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light"> <!-- Añadimos una clase de fondo de color claro -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white"> <!-- Ajustamos el encabezado del formulario -->
                        <h4 class="mb-0">Cambio de Contraseña</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                {{ $errors->first('error') }}
                            </div>
                        @endif
                        <form action="{{route('actualizar.password')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="password">Nueva Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="password2">Repite la contraseña</label>
                                <input type="password" class="form-control" id="password2" name="password2" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Cambiar Contraseña</button> <!-- Cambiamos el color del botón -->
                        </form>
                    </div>
                </div>
                <div class="mt-3">
                    <p>¿No tienes una cuenta? <a href="{{ route('registro') }}">Regístrate aquí</a>.</p>
                </div>
                <div class="mt-3">
                    <p>¿Tienes Cuenta? <a href="{{route('inicio')}}">Inicia sesión aquí</a>.</p>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
