@extends('layout.template')

@section('title', 'Inicio')

@section('content')
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
    <h2><b>Tabla de </b> Medicamentos</h2>

    <div class="main__datatable-content">
      <div class="main__datatable-pagination">
        <label for="datatable-input" class="main__datatable-input">
          <i class="fas fa-search"></i>
          <input type="search" class="" id="datatable-input" placeholder="Search">
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
        <table id="myTable" class="main__datatable-table">
          <thead>
            <tr>
              <th>Nombre Genérico</th>
              <th>Nombre Comercial</th>
              <th>Present.</th>
              <th>Concent.</th>
              <th>Precio</th>
              <th>Cant.</th>
              <th>Laboratorio</th>
              <th>Anaquel</th>
              <th>Foto</th>
            </tr>
          </thead>
          <tbody>
            @foreach($medicamentos as $medicamento)
                                    <tr>
                                        <td>{{ucfirst(strtolower($medicamento->n_generico))}}</td>
                                        <td>{{ucfirst(strtolower($medicamento->n_comercial))}}</td>
                                        <td>{{ucfirst(strtolower($medicamento->present))}}</td>
                                        <td>{{ucfirst(strtolower($medicamento->concent))}}</td>
                                        <td>S./{{number_format($medicamento->precio->p_unitario, 1, ".", '')}}0</td>
                                        {{-- <td>S./{{number_format($medicamento->precio->p_costo*$medicamento->precio->utilidad/100,1,".",'')}}0</td> --}}
                                        <td>{{$medicamento->total}}</td>
                                        <td>{{$medicamento->lab}}</td>
                                        <td><span class="badge bg-primary">{{$medicamento->anaquel}}</span></td>
                                        <td><a href="#" data-bs-toggle="modal" data-bs-target="#imgModal{{$medicamento->id}}"><i class="fas fa-bars"></i></a></td>
                                        @include('admin.inicio.imgmodal')
                                    </tr>
                                @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection
@section('javascript')
    <script src="{{ asset('js/inicio/search.js') }}"></script>
    <script src="{{ asset('js/inicio/reniec_dni.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                language: {
                searchPlaceholder: "Buscar medicamento",
                search: ""
                },
                "dom":"<'row'<'col-sm-8'<'pull-left'f>><'col-sm-4'>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'><'col-sm-7'p>>",
            });
        } );
    </script>
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
@endsection
