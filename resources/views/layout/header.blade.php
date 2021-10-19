<header class="header col-9 col-sm-10 col-md-11 col-lg-9 d-flex justify-content-between align-items-center w-100" id="header">
  <div class="d-flex align-items-center">
    <div class="panel-btn hamburger hamburger--arrowalt d-none d-lg-flex align-items-center" aria-label="Dashboard">
      <div class="hamburger-box">
        <div class="hamburger-inner"></div>
      </div>
    </div>
    <span class="ms-3 ms-lg-2 fw-bolder text-black" style="font-size:30px;">@yield('title')</span>
  </div>

  <span class="header__admin" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    <img src="{{asset('img/icons/logo-01.svg')}}" class="header__admin-img" alt="Icono de Usuario">
      <div class="header__admin-text">
        <span>{{Auth::user()->name}}</span>
        <small>Rol de Usuario</small>
      </div>
    <i class="fas fa-chevron-down"></i>
  </span>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="{{ route('logout') }}">Salir</a></li>
  </ul>
</header>
