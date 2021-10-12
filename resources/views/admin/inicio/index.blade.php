@extends('layout.template')

@section('title', 'Inicio')

@section('content')


  <div class="">
    <div class="main__action">
      <a href="{{ route('stock.create') }}" class="main__action-item">
        <div class="main__action-text">
          <h2>Stock</h2>
          <span>Agregar Stock</span>
        </div>
        <span class="main__action-icon"><i class="fas fa-layer-group"></i></span>
      </a>
      <a href="{{ route('medicamentos.create') }}" class="main__action-item">
        <div class="main__action-text">
          <h2>Añadir</h2>
          <span>Añadir medicamento</span>
        </div>
        <span class="main__action-icon"> <i class="fas fa-capsules"></i></span>
      </a>
      <a href="{{route('reportes.index')}}" class="main__action-item">
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
                    <span class="d-block fs-4 fw-bolder">Ventas por día</span>
                    <span>Lorem ipsum dolor sit amet, consectetur</span>
                </div>
            </div>
            <div id="chart" style="position: relative; max-width: 250px; min-width: 100%;"></div>
        </div>
  </div>

  <div class="main__datatable">

    <div class="main__datatable-content">
        <div class="main__table-title">
            <div class="separator mr-3"></div>
            <div class="main__grafic-text">
                <span class="d-block fs-4 fw-bolder">Tabla de Productos</span>
                <span>Productos Disponibles</span>
            </div>
        </div>
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
                    <td>{{ucfirst(mb_strtolower($medicamento->generic_name,'UTF-8'))}}</td>
                    <td>{{ucfirst(mb_strtolower($medicamento->tradename,'UTF-8'))}}</td>
                    <td>{{$medicamento->concentration}}</td>
                    <td>{{$medicamento->price->sale_price}}</td>
                    <td>
                    @foreach ($medicamento->stocks as $stock)
                    @foreach($stock->batches as $batch)
                        {{$batch->quantity_unit}}
                    @endforeach
                    @endforeach
                    </td>
                    <td>{{ucfirst(mb_strtolower($medicamento->laboratory,'UTF-8'))}}</td>
                    <td>
                    @foreach ($medicamento->stocks as $stock)
                    <span class="badge bg-primary">{{$stock->shelf}}</span>
                    @endforeach
                    </td>
                    <td>
                      <button type="button" class="btn btn-xs btn-danger fas fa-image" data-bs-toggle="modal" data-bs-target="#imgModal{{$medicamento->id}}"></button>
                      @include('admin.inicio.imgmodal')
                    </td>
                </tr>
            @endforeach
            @foreach($articulos as $articulo)
                <tr>
                    <td>{{ucfirst(mb_strtolower($articulo->tradename,'UTF-8'))}}</td>
                    <td>{{ucfirst(mb_strtolower($articulo->trademark,'UTF-8'))}}</td>
                    <td>{{$articulo->presentation}}</td>
                    <td>{{$articulo->price->sale_price}}</td>
                    <td>
                    @foreach ($articulo->stocks as $stock)
                    @foreach($stock->batches as $batch)
                        {{$batch->quantity_unit}}
                    @endforeach
                    @endforeach
                    </td>
                    <td>{{ucfirst(mb_strtolower($articulo->supplier,'UTF-8'))}}</td>
                    <td>
                    @foreach ($articulo->stocks as $stock)
                    <span class="badge bg-primary">{{$stock->shelf}}</span>
                    @endforeach
                    </td>
                    <td>
                      <button type="button" class="btn btn-xs btn-danger fas fa-image" data-bs-toggle="modal" data-bs-target="#imgModalArt{{$articulo->id}}"></button>
                      @include('admin.inicio.imgmodalart')
                    </td>
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
                searchPlaceholder: "Buscar producto",
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
            data: <?php echo json_encode($arr)?>
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
          categories: <?php echo json_encode($ventas);?>,
        },
        colors: ['#ffc107', '#66DA26', '#546E7A', '#E91E63', '#FF9800'],
      };

      var chart = new ApexCharts(document.querySelector("#chart"), options);
      chart.render();
    </script>
@endsection
