<nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="{{ asset('assets/logo.png') }}" alt="Logo de Pescados Cañete Trillo" width="100" height="100" class="d-inline-block align-top" loading="lazy">
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route("clientes.inicio")}}" style="color: white;">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('clientes.pescado')}}" style="color: white;">Pescado</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('clientes.marisco')}}" style="color: white;">Marisco</a>
          </li>
        </ul>
        <form class="d-flex" action="{{route('buscador')}}" method="POST">
            @csrf
            <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search" id="buscador" name="buscador" style="color: black;">
            <button class="btn btn-outline-light" type="submit" style="color: black;">Buscar</button>
        </form>
        <!-- Menú de ajustes -->
        <div class="dropdown">
          <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ asset('assets/ajustes.png') }}" alt="Icono de ajustes" width="20" height="20">
          </button>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
            <li><a class="dropdown-item" href="{{route('facturas')}}" style="color: black;">Facturas</a></li>
            <li><a class="dropdown-item" href="{{route('perfil')}}" style="color: black;">Perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item" style="color: black;">Cerrar Sesión</button>
              </form>
            </li>
          </ul>
        </div>
        <!-- Fin del menú de ajustes -->
        <a class="nav-link" href="{{ route('carrito.mostrar') }}" style="color: white;">
          <img src="{{ asset('assets/carrito.png') }}" alt="Carrito de compras" width="30" height="30" class="d-inline-block align-top" loading="lazy">
        </a>
      </div>
    </div>
  </nav>
