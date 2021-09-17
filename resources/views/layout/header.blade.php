<header class="header col-9 col-sm-10 col-md-11 col-lg-9 d-flex justify-content-between align-items-center w-100" id="header">
  <div class="d-flex align-items-center">
    <div class="panel-btn hamburger hamburger--arrowalt d-none d-lg-flex align-items-center" aria-label="Dashboard">
      <div class="hamburger-box">
        <div class="hamburger-inner"></div>
      </div>
    </div>

    <span class="ms-3 ms-lg-2 fw-bolder fs-5">Dashboard</span>
  </div>

  <span class="header__admin">
    <img src="{{asset('img/avatars/avatar-2.jpg')}}" class="header__admin-img" alt="Carrillo">
    <span>{{Auth::user()->name}}</span><br>
    <small>Rol de Usuario</small>
    <i class="fas fa-chevron-down"></i>
  </span>
</header> 