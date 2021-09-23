@extends('layout.template')

@section('title', 'Inicio')

@section('content')


  <div class="">
    <div class="main__action">
      <a href="#" class="main__action-item">
        <div class="main__action-text">
          <h2>Stock</h2>
          <span>Agregar Stock</span>
        </div>
        <span class="main__action-icon"><i class="fas fa-layer-group"></i></span>
      </a>
      <a href="#" class="main__action-item">
        <div class="main__action-text">
          <h2>Añadir</h2>
          <span>Añadir medicamento</span>
        </div>
        <span class="main__action-icon"> <i class="fas fa-capsules"></i></span>
      </a>
      <a href="#" class="main__action-item">
        <div class="main__action-text">
          <h2>Generar</h2>
          <span>Nuevo reporte</span>
        </div>
        <span class="main__action-icon"><i class="fas fa-file-alt"></i></span>
      </a>
      <a href="{{ route('ventas.create') }}" class="main__action-item">
        <div class="main__action-text">
          <h2>Nuevo</h2>
          <span>Nueva venta</span>
        </div>
        <span class="main__action-icon"><i class="fas fa-shopping-basket"></i></span>
      </a>
    </div>
  </div>

  <div class="main-analytics">
        <div class="main__grafic bg-white">
            <div class="main__grafic-title">
                <div class="separator"></div>
                <div class="main__grafic-text">
                    <span class="d-block fs-4 fw-bolder">Ventas por mes</span>
                    <span>Lorem ipsum dolor sit amet, consectetur</span>
                </div>
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
                    <td>{{ucfirst(strtolower($medicamento->generic_name))}}</td>
                    <td>{{ucfirst(strtolower($medicamento->tradename))}}</td>
                    <td>{{ucfirst(strtolower($medicamento->concentration))}}</td>
                    @foreach ($medicamento->prices as $precio)
                    <td>{{$precio->sale_price}}</td>
                    @endforeach
                    <td>{{$medicamento->total}}</td>
                    <td>{{ucfirst(strtolower($medicamento->laboratory))}}</td>
                    @foreach ($medicamento->stocks as $stock)
                    <td><span class="badge bg-primary">{{$stock->shelf}}</span></td>
                    @endforeach
                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#imgModal{{$medicamento->id}}"><i class="fas fa-image"></i></a></td>
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
          height: 470,
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
