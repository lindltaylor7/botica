<header class="header">
    <span class="header__btn-nav" id="btnNav">
      <i class="header__icon fas fa-arrow-right"></i>@yield('title')
    </span>

    <div class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
      <button class="btn btn-outline-warning" type="submit"><i class="fas fa-search"></i></button>
    </div>

    <div>
      <img class="header__admin-img" src="{{asset('img/avatars/avatar-2.jpg')}}">
      <span class="header__admin">
        <span>Nombre Usuario</span><br>
        <small>Rol de Usuario</small>
      </span>
      <i class="fas fa-chevron-down"></i>
    </div>

  </header>

