<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="{{asset('assets/logo.png')}}" />
    <!--<link rel="stylesheet" type="text/css" href="{{asset('assets/css/styleMenu.css')}}"/>-->
    <!-- CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">


    <!-- Script de Bootstrap (incluyendo el script de popper.js para los desplegables) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        #wrapper {
            min-height: calc(100% - 100px); /* Ajustar en función de la altura del footer */
            position: relative;
        }

        footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: center; /* Centrar el contenido del footer */
}
</style>
</head>
<body>
    <div id="wrapper">
        @include('layouts._partials.menuClientes')

        @yield('content')
    </div>

    <footer>
        @include('layouts._partials.footer')
    </footer>
</body>
</html>
