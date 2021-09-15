<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Página principal</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/estilos.css')}}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>

</head>
<body>
  <header class="header">
    <span class="header__btn-nav" id="btnNav">
      <i class="fas fa-bars"></i>
    </span>

    <span class="header__admin">
      <span>Admin</span>
      <i class="fas fa-chevron-down"></i>
    </span>
  </header>

  <nav class="nav" id="nav">
    <div class="nav__content">
      <div class="nav__logo">
        <img src="" alt="">
        Botica Excelentemente
      </div>

      <ul class="nav__menu">
        <li class="nav__list-title">Páginas</li>
        <li class="nav__list"><a href="#" class="nav__link link--active"><i class="fas fa-bars"></i><span class="nav__link-text">Inicio</span></a></li>
        <li class="nav__list"><a href="./page/medicamento.html" class="nav__link"><i class="fas fa-bars"></i><span class="nav__link-text">Medicamento</span></a></li>
        <li class="nav__list"><a href="#" class="nav__link"><i class="fas fa-bars"></i><span class="nav__link-text">Articulos</span></a></li>
        <li class="nav__list"><a href="#" class="nav__link"><i class="fas fa-bars"></i><span class="nav__link-text">Stocks</span></a></li>
        <li class="nav__list"><a href="#" class="nav__link"><i class="fas fa-bars"></i><span class="nav__link-text">Ventas</span></a></li>
        <li class="nav__list"><a href="#" class="nav__link"><i class="fas fa-bars"></i><span class="nav__link-text">Reportes</span></a></li>
      </ul>
    </div>
  </nav>

  <main class="main">
    <div class="">
      <h1><b>Action</b> Dashboard</h1>
      <div class="main__action">
        <a href="#" class="main__action-item">
          <div class="main__action-text">
            <h2>Stock</h2>
            <span>Agregar Stock</span>
          </div>
          <span class="main__action-icon"><i class="fab fa-stack-overflow"></i></span>
        </a>
        <a href="#" class="main__action-item">
          <div class="main__action-text">
            <h2>Añadir</h2>
            <span>Añadir medicamento</span>
          </div>
          <span class="main__action-icon"><i class="fab fa-stack-overflow"></i></span>
        </a>
        <a href="#" class="main__action-item">
          <div class="main__action-text">
            <h2>Generar</h2>
            <span>Nuevo reporte</span>
          </div>
          <span class="main__action-icon"><i class="fab fa-stack-overflow"></i></span>
        </a>
        <a href="#" class="main__action-item">
          <div class="main__action-text">
            <h2>Nuevo</h2>
            <span>Nueva venta</span>
          </div>
          <span class="main__action-icon"><i class="fab fa-stack-overflow"></i></span>
        </a>
      </div>
    </div>

    <div class="main-analytics">
      <h2><b>Analytics</b> Dashboard</h2>
      <div class="main__analytics">
        <div class="main__analytics-items">
          <div class="main__analytics-text">
            <h2>Ingreso</h2>
            <span>S/. 1500.00</span>
          </div>
          <span class="main__analytics-icon"><i class="fab fa-stack-overflow"></i></span>
        </div>
        <div class="main__analytics-items">
          <div class="main__analytics-text">
            <h2>Ingreso</h2>
            <span>S/. 1500.00</span>
          </div>
          <span class="main__analytics-icon"><i class="fab fa-stack-overflow"></i></span>
        </div>
        <div class="main__analytics-items">
          <div class="main__analytics-text">
            <h2>Ingreso</h2>
            <span>S/. 1500.00</span>
          </div>
          <span class="main__analytics-icon"><i class="fab fa-stack-overflow"></i></span>
        </div>

      </div>

      <div class="main__grafic">
        Table
        <canvas id="myChart"></canvas>
      </div>
    </div>



    <div class="main__datatable">
      <h2><b>Table</b> Statistics</h2>

      <div class="main__datatable-content">
        <div class="main__datatable-pagination">
          <label for="datatable-input" class="main__datatable-input">
            <i class="fas fa-search"></i>
            <input type="search" class="" id="datatable-input">
          </label>
          <div class="main__pagination">
            <span class="active">1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>5</span>
            <span>6</span>
          </div>
        </div>

        <div class="main__table">
          <table class="main__datatable-table">
            <thead>
              <tr>
                <th>Nombre Genérico</th>
                <th>Nombre Comercial</th>
                <th>Presentación</th>
                <th>Concentración</th>
                <th>Precio</th>
                <th>Utilidad</th>
                <th>Laboratorio</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
              </tr>
              <tr>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>


  <script>
    var ctx = document.getElementById('myChart');
  var ctx = document.getElementById('myChart').getContext('2d');
  var ctx = $('#myChart');
  var ctx = 'myChart';
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
          datasets: [{
              label: '# of Votes',
              data: [12, 19, 3, 5, 2, 3],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              y: {
                  beginAtZero: true
              }
          }
      }
  });
  </script>
  <script src="{{asset('js/seller/nav.js')}}"></script>
</body>
</html>
