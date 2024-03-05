<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Pescadería</title>
    <link rel="icon" type="image/png" href="{{asset('assets/logo.png')}}" />
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light"> <!-- Añadimos una clase de fondo de color claro -->
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white"> <!-- Ajustamos el encabezado del formulario -->
                        <h4 class="mb-0">Registrarse</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('gestionRegistro')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}">
                                @error('name')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{old('email')}}">
                                @error('email')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="dni">DNI</label>
                                <input type="text" class="form-control @error('dni') is-invalid @enderror" id="dni" name="dni" value="{{old('dni')}}">
                                @error('dni')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
                                @error('password')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="fecha_nacimiento ">Fecha de Nacimiento</label>
                                <input type="date" class="form-control @error('fecha_nacimiento') is-invalid @enderror" id="fecha_nacimiento" value="{{old('fecha_nacimiento')}}" name="fecha_nacimiento" >
                                @error('fecha_nacimiento')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="telefono">Teléfono</label>
                                <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{old('telefono')}}">
                                @error('telefono')
                                <p style="color: red;">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="form-group">
                                <label for="direccion">Dirección</label>
                                <input type="text" class="form-control @error('direccion') is-invalid @enderror" id="direccion" value="{{old('direccion')}}" name="direccion" >
                                @error('direccion')
                                <p style="color: red;">{{$message}}</p>
                            @enderror

                                <input type="hidden" class="form-control" name="categoria_usuario_id" id="categoria_usuario_id" value="2" >
                            </div>

                            <input type="submit" class="btn btn-primary" value="Registrarse">
                        </form>
                    </div>
                </div>
                <div class="mt-3">
                    <p>¿Ya tienes una cuenta? <a href="{{route('inicio')}}">Inicia Sesión aquí</a>.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
