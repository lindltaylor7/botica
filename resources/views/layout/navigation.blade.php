{{-- <nav class="nav">
    <div class="nav__content">
      <div class="nav__logo">
        <img src="" alt="">
        Excelentemente
      </div>

      <ul class="nav__menu">
        <li class="nav__list {{ request()->routeIs('inicio.*') ? 'active' : '' }}">
          <a class="nav__link link--active" href="{{ route('inicio.index') }}">
            <span class="link-contain__icon"><i class="fas fa-info-circle" data-feather="box"></i></span> <span class="nav__link-text">Inicio</span>
          </a>
        </li>
        @can('admin.medicamentos')
        <li class="nav__list {{ request()->routeIs('medicamentos.*') ? 'active' : '' }}">
            <a class="nav__link" href="{{ route('medicamentos.index') }}">
                <span class="link-contain__icon"><i class="fas fa-info-circle" data-feather="box"></i></span> <span class="nav__link-text">Medicamentos</span>
            </a>
        </li>

        <li class="nav__list {{ request()->routeIs('articulos.*') ? 'active' : '' }}">
            <a class="nav__link" href="{{ route('articulos.index') }}">
                <span class="link-contain__icon"><i class="fas fa-info-circle" data-feather="box"></i></span> <span class="nav__link-text">Artículos</span>
            </a>
        </li>
        @endcan
        @can('admin.stocks')
        <li class="nav__list {{ request()->routeIs('stock.*') ? 'active' : '' }}">
            <a class="nav__link" href="{{ route('stock.index') }}">
                <span class="link-contain__icon"><i class="fas fa-info-circle" data-feather="bar-chart"></i></span> <span class="nav__link-text">Stocks</span>
            </a>
        </li>
        @endcan

        <li class="nav__list {{ request()->routeIs('ventas.*') ? 'active' : '' }}">
            <a class="nav__link" href="{{ route('ventas.index') }}">
                <span class="link-contain__icon"><i class="fas fa-info-circle" data-feather="dollar-sign"></i></span> <span class="nav__link-text">Ventas</span>
            </a>
        </li>

        <li class="nav__list {{ request()->routeIs('reportes.*') ? 'active' : '' }}">
            <a class="nav__link" href="{{ route('reportes.index') }}">
                <span class="link-contain__icon"><i class="fas fa-info-circle" data-feather="book"></i></span> <span class="nav__link-text">Reportes</span>
            </a>
        </li>
    
      </ul>
    </div>
  </nav> --}}


  <nav class="nav col-2 col-sm-2 col-md-1 col-lg-3 h-100 justify-content-center p-0 overflow-auto" id="nav">
    <div class="nav__content w-75">
      <div class="nav__logo d-flex flex-nowrap justify-content-center d-lg-block my-2 py-lg-4 py-md-3 text-center">
        <i class="fab fa-buysellads display-1 my-3 me--lg-2 my-lg-0 text-white"></i>
        <span class="span-logo fs-1 fw-bolder text-white d-none d-md-none d-lg-block">Excel</span>
      </div>
  
      <ul class="nav__menu list-group w-100">
        <li class="nav__list w-100 my-2">
          <a href="#" class="nav__link d-flex flex-nowrap justify-content-center justify-content-sm-center justify-content-lg-start align-items-center">
            <i class="fas fa-bars fs-2 d-block text-white p-2 p-lg-3"></i>
            <span class="nav__span fs-6 d-none d-sm-none d-md-none d-lg-block ps-lg-2 text-white">Inicio</span>
          </a>
        </li>
        <li class="nav__list w-100 my-2">
          <a href="#" class="nav__link d-flex flex-nowrap justify-content-center justify-content-sm-center justify-content-lg-start align-items-center">
            <i class="fas fa-bars fs-2 d-block text-white p-2 p-lg-3"></i>
            <span class="nav__span fs-6 d-none d-sm-none d-md-none d-lg-block ps-lg-2 text-white">Medicamento</span>
          </a>
        </li>
        <li class="nav__list w-100 my-2">
          <a href="#" class="nav__link d-flex flex-nowrap justify-content-center justify-content-sm-center justify-content-lg-start align-items-center">
            <i class="fas fa-bars fs-2 d-block text-white p-2 p-lg-3"></i>
            <span class="nav__span fs-6 d-none d-sm-none d-md-none d-lg-block ps-lg-2 text-white">Articulos</span>
          </a>
        </li>
        <li class="nav__list w-100 my-2">
          <a href="#" class="nav__link d-flex flex-nowrap justify-content-center justify-content-sm-center justify-content-lg-start align-items-center">
            <i class="fas fa-bars fs-2 d-block text-white p-2 p-lg-3"></i>
            <span class="nav__span fs-6 d-none d-sm-none d-md-none d-lg-block ps-lg-2 text-white">Stocks</span>
          </a>
        </li>
        <li class="nav__list w-100 my-2">
          <a href="#" class="nav__link d-flex flex-nowrap justify-content-center justify-content-sm-center justify-content-lg-start align-items-center">
            <i class="fas fa-bars fs-2 d-block text-white p-2 p-lg-3"></i>
            <span class="nav__span fs-6 d-none d-sm-none d-md-none d-lg-block ps-lg-2 text-white">Ventas</span>
          </a>
        </li>
        <li class="nav__list w-100 my-2">
          <a href="#" class="nav__link d-flex flex-nowrap justify-content-center justify-content-sm-center justify-content-lg-start align-items-center">
            <i class="fas fa-bars fs-2 d-block text-white p-2 p-lg-3"></i>
            <span class="nav__span fs-6 d-none d-sm-none d-md-none d-lg-block ps-lg-2 text-white">Reportes</span>
          </a>
        </li>
      </ul>
    </div>
  </nav>