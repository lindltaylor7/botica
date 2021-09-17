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
    {{-- <div class="main__analytics">
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
    </div> --}}

    <div class="main__grafic bg-white">
      <div>
        <span class="d-block fs-4 fw-bolder">Customer Map</span>
        <span>Lorem ipsum dolor sit amet, consectetur</span>
      </div>

      <div id="chart" style="position: relative;">
      </div>
    </div>
  </div>

  <div class="main__datatable">
    <h2><b>Tabla de </b> Medicamentos</h2>
  
    <div class="main__datatable-content">
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
                    <td>{{$medicamento->total}}</td>
                    <td>{{ucfirst(strtolower($medicamento->lab))}}</td>
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
      var options = {
        chart: {
          height: 380,
          type: "area"
        },
        dataLabels: {
          enabled: false
        },
        series: [
          {
            name: "Series 1",
            data: [45, 52, 38, 45, 19, 23, 2, 8, 5, 8 ,5]
          }
        ],
        fill: {
          type: "gradient",
          gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.7,
            opacityTo: 0.9,
            stops: [0, 90, 100]
          }
        },
        xaxis: {
          categories: ['Ene', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Dic'],
        },
        colors: ['#ffc107', '#66DA26', '#546E7A', '#E91E63', '#FF9800'],
      };

      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();

      
    </script>
@endsection
