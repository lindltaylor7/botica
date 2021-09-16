<nav class="nav" id="nav">
    <div class="nav__content">
      <div class="nav__logo">
        Botica
      </div>

      <ul class="nav__menu">
        {{-- <li class="nav__list-title">Páginas</li> --}}
        <li class="nav__list">
            <a href="{{route('inicio.index')}}" class="nav__link {{ request()->routeIs('inicio.*') ? 'link--active' : '' }}">
                <i class="fas fa-home"></i>
                <span class="nav__link-text">Inicio</span>
            </a>
        </li>
        <li class="nav__list">
            <a href="{{route('medicamentos.index')}}" class="nav__link {{ request()->routeIs('medicamentos.*') ? 'link--active' : '' }}">
                <i class="fas fa-pills"></i>
                <span class="nav__link-text">Medicamento</span>
            </a>
        </li>
        <li class="nav__list">
            <a href="{{route('articulos.index')}}" class="nav__link {{ request()->routeIs('articulos.*') ? 'link--active' : '' }}">
                <i class="fas fa-shopping-cart"></i>
                <span class="nav__link-text">Articulos</span>
            </a>
        </li>
        <li class="nav__list">
            <a href="{{route('stock.index')}}" class="nav__link {{ request()->routeIs('stock.*') ? 'link--active' : '' }}">
                <i class="fas fa-cube"></i>
                <span class="nav__link-text">Stocks</span>
            </a>
        </li>
        <li class="nav__list">
            <a href="{{route('ventas.index')}}" class="nav__link {{ request()->routeIs('ventas.*') ? 'link--active' : '' }}">
                <i class="fas fa-dollar-sign"></i>
                <span class="nav__link-text">Ventas</span>
            </a>
        </li>
        <li class="nav__list">
            <a  href="{{route('reportes.index')}}" class="nav__link {{ request()->routeIs('reportes.*') ? 'link--active' : '' }}">
                <i class="fas fa-file-alt"></i>
                <span class="nav__link-text">Reportes</span>
            </a>
        </li>
      </ul>
    </div>
  </nav>
