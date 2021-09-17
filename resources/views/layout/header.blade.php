<header class="header col-9 col-sm-10 col-md-11 col-lg-9 d-flex justify-content-end justify-content-lg-between align-items-center w-100" id="header">
  <div class="panel-btn hamburger hamburger--arrowalt d-none d-lg-block">
    <div class="hamburger-box">
      <div class="hamburger-inner"></div>
    </div>
  </div>

  <span class="header__admin">
    <img src="{{asset('img/avatars/avatar-2.jpg')}}" class="header__admin-img" alt="Carrillo">
    <span>{{Auth::user()->name}}</span><br>
    <small>Rol de Usuario</small>
    <i class="fas fa-chevron-down"></i>
  </span>
</header> 