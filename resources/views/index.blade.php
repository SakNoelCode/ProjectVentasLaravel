<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="Sitio web de la página Minersa S.R.L" />
  <meta name="author" content="Arcangel" />
  <title>@yield('title','Inicio')</title>
  <!-- Font Awesome Icons -->
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <!----Importación para BootStrap CSS-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  @yield('styles')
  <link href="{{ asset('css/index.css') }}" rel="stylesheet" />
</head>

<body class="sb-nav-fixed">
  <!---//Si está autenticado---->
  @auth
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{route('panel')}}">Minersa S.R.L</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
      @csrf
      <div class="input-group">
        <input class="form-control" type="text" placeholder="Buscar..." aria-label="Buscar..." aria-describedby="btnNavbarSearch" />
        <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
      </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="#">Configuraciones</a></li>
          <li><a class="dropdown-item" href="#">Registro de actividades</a></li>
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a class="dropdown-item" href="{{ route('logout') }}">Cerrar sesión</a></li>
        </ul>
      </li>
    </ul>
  </nav>

  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading">Inicio</div>
            <a class="nav-link" href="{{route('panel')}}">
              <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
              Panel de Control
            </a>

            <!-----Encabezado Bloque-->
            <div class="sb-sidenav-menu-heading">Módulos</div>

            <!-----Bloque Ventas-->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseVentas" aria-expanded="false" aria-controls="collapseVentas">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-cash-register"></i></div>
              Ventas
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseVentas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="{{route('ventas.index')}}">Nuevo registro</a>
                <a class="nav-link" href="#">Buscar</a>
              </nav>
            </div>

            <!-----Bloque Clientes-->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-people-group"></i></div>
              Clientes
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="{{route('clientes.index')}}">Nuevo registro</a>
                <a class="nav-link" href="#">Buscar</a>
              </nav>
            </div>

            <!-----Bloque Productos-->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsProduct" aria-expanded="false" aria-controls="collapseLayoutsProduct">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-dolly"></i></div>
              Productos
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayoutsProduct" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="{{route('productos.index')}}">Nuevo registro</a>
                <a class="nav-link" href="#">Buscar</a>
              </nav>
            </div>

            <!-----Bloque Categorías-->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsCategory" aria-expanded="false" aria-controls="collapseLayoutsCategory">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-book"></i></div>
              Categorías
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayoutsCategory" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="{{route('categorias.index')}}">Nuevo registro</a>
                <a class="nav-link" href="#">Buscar</a>
              </nav>
            </div>

            <!-----Bloque Unidades Medidas-->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsUnidadesMedida" aria-expanded="false" aria-controls="collapseLayoutsUnidadesMedida">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-box-open"></i></div>
              U. de Medida
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayoutsUnidadesMedida" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="{{route('unidadesMedidas.index')}}">Nuevo registro</a>
                <a class="nav-link" href="#">Buscar</a>
              </nav>
            </div>

            <!-----Bloque Presentaciones-->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsPresentacion" aria-expanded="false" aria-controls="collapseLayoutsPresentacion">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
              Presentaciones
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayoutsPresentacion" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="{{route('presentaciones.index')}}">Nuevo registro</a>
                <a class="nav-link" href="{{route('presentaciones-search')}}">Buscar</a>
              </nav>
            </div>


            <!-----Bloque Usuarios-->
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
              Usuarios
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
              <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                  Autenticación
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                  <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href="{{ route('register-show') }}">Nuevo Usuario</a>
                  </nav>
                </div>
              </nav>
            </div>

            <!-----encabezado reportes-->
            <div class="sb-sidenav-menu-heading">Reportes</div>

            <a class="nav-link" href="#">
              <div class="sb-nav-link-icon"><i class="fa-solid fa-user-group"></i></div>
              Clientes
            </a>

            <a class="nav-link" href="#">
              <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
              Ventas
            </a>

          </div>
        </div>


        <div class="sb-sidenav-footer">
          <div class="small">Sesión iniciada como:</div>
          <!-----Nombre de usuario-->
          <span>{{ Auth()->user()->name }}</span>
        </div>
      </nav>
    </div>

    <!-----Contenido Main-->
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4 text-center">@yield('h1_title','Inicio')</h1>
          <!--ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active text-center"></li>
          </ol-->

          @yield('content')


        </div>
      </main>

      <!-----Pie de página-->
      @yield('footer')
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
          <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Minersa S.R.L 2022</div>
            <div>
              <a href="#">Políticas de privacidad</a>
              &middot;
              <a href="#">Terminos &amp; Condiciones</a>
            </div>
          </div>
        </div>
      </footer>

    </div>
    <!-----Fin de contenido main-->

  </div>

  <!---Importación JavaScript Bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

  <!--JS MAIN-->
  <script src="{{ asset('js/index.js') }}" type="text/javascript"></script>

  @yield('scripts')

  @endauth

  <!---Si no esta autenticado--->
  @guest
  <h4 class="text-center m-4">Accede al contenido <a href="{{ route('login-show') }}">Iniciando Sesión</a></h4>
  @endguest
</body>

</html>