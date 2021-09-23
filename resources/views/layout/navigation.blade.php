  <nav class="nav col-2 col-sm-2 col-md-1 col-lg-3 h-100 justify-content-center p-0 overflow-auto" id="nav">
    <div class="nav__content w-75">
      <div class="nav__logo d-flex flex-nowrap justify-content-center d-lg-block my-2 py-lg-4 py-md-3 text-center">
        <i class="fab fa-buysellads display-1 my-3 me--lg-2 my-lg-0 text-white"></i>
        <span class="span-logo fs-1 fw-bolder text-white d-none d-md-none d-lg-block">Excel</span>
      </div>

      <ul class="nav__menu list-group w-100">
        <li class="nav__list w-100 my-2">
          <a href="{{ route('inicio.index') }}" class="nav__link d-flex flex-nowrap justify-content-center justify-content-sm-center justify-content-lg-start align-items-center">
            <i class="fas fa-home fs-2 d-block text-white p-2 p-lg-3"></i>
            <span class="nav__span fs-6 d-none d-sm-none d-md-none d-lg-block ps-lg-2 text-white">Inicio</span>
          </a>
        </li>
        <li class="nav__list w-100 my-2">
          <a href="{{ route('medicamentos.index') }}" class="nav__link d-flex flex-nowrap justify-content-center justify-content-sm-center justify-content-lg-start align-items-center">
            <i class="fas fa-capsules fs-2 d-block text-white p-2 p-lg-3"></i>
            <span class="nav__span fs-6 d-none d-sm-none d-md-none d-lg-block ps-lg-2 text-white">Medicamento</span>
          </a>
        </li>
        <li class="nav__list w-100 my-2">
          <a href="{{ route('articles.index') }}" class="nav__link d-flex flex-nowrap justify-content-center justify-content-sm-center justify-content-lg-start align-items-center">
            <i class="fas fa-archive fs-2 d-block text-white p-2 p-lg-3"></i>
            <span class="nav__span fs-6 d-none d-sm-none d-md-none d-lg-block ps-lg-2 text-white">Articulos</span>
          </a>
        </li>
        <li class="nav__list w-100 my-2">
          <a href="{{ route('stock.index') }}" class="nav__link d-flex flex-nowrap justify-content-center justify-content-sm-center justify-content-lg-start align-items-center">
            <i class="fas fa-layer-group fs-2 d-block text-white p-2 p-lg-3"></i>
            <span class="nav__span fs-6 d-none d-sm-none d-md-none d-lg-block ps-lg-2 text-white">Stocks</span>
          </a>
        </li>
        <li class="nav__list w-100 my-2">
          <a href="{{ route('ventas.index') }}" class="nav__link d-flex flex-nowrap justify-content-center justify-content-sm-center justify-content-lg-start align-items-center">
            <i class="fas fa-shopping-basket fs-2 d-block text-white p-2 p-lg-3"></i>
            <span class="nav__span fs-6 d-none d-sm-none d-md-none d-lg-block ps-lg-2 text-white">Ventas</span>
          </a>
        </li>
        <li class="nav__list w-100 my-2">
          <a href="{{ route('reportes.index') }}" class="nav__link d-flex flex-nowrap justify-content-center justify-content-sm-center justify-content-lg-start align-items-center">
            <i class="fas fa-file-alt fs-2 d-block text-white p-2 p-lg-3"></i>
            <span class="nav__span fs-6 d-none d-sm-none d-md-none d-lg-block ps-lg-2 text-white">Reportes</span>
          </a>
      </div>
    </div>
  </nav>
