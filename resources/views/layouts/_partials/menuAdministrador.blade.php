<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('inicioAdmin')}}">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo de Pescados Cañete Trillo" width="100" height="100" class="d-inline-block align-top" loading="lazy">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('inicioAdmin')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('productos')}}">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('pescado')}}">Pescado</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('marisco')}}">Marisco</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('proveedor')}}">Proveedores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('facturas.admin')}}">Facturas</a>
                    </li>
                </ul>
                @auth
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('assets/ajustes.png') }}" alt="Icono de ajustes" width="20" height="20">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{route('perfil')}}">Perfil</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @endauth
            </div>
        </div>
    </nav>
</header>
