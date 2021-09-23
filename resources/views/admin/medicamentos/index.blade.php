@extends('layout.template')

@section('title', 'Inicio')

@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-3">Tabla de Medicamentos</h1>
  <div>
      <div class="">
          <div class="card">
              <div class="m-3">
                  <a href="{{ route('medicamentos.create') }}" class="d-inline-block btn btn-primary btn-lg fs-6"><i class="align-middle" data-feather="plus"></i>Agregar Artículos</a>
              </div>
              <div class="table table-responsive">
                <table id="myTable" class="main__datatable-table">
                      <thead>
                          <tr>
                            <th>Nombre Genérico</th>
                            <th>Nombre Comercial</th>                    
                            <th>Concent.</th>
                            <th>Laboratorio</th>                    
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Anaquel</th>
                            <th>Foto</th>
                            <th>Opciones</th>
                          </tr>


                      </thead>
                      <tbody id="dynamic-row">
                        @foreach($medicamentos as $medicamento)
                        <tr>
                            <td>{{ucfirst(strtolower($medicamento->generic_name))}}</td>
                            <td>{{ucfirst(strtolower($medicamento->tradename))}}</td>
                            <td>{{ucfirst(strtolower($medicamento->concentration))}}</td>
                            <td>{{ucfirst(strtolower($medicamento->laboratory))}}</td>
                           
                            @foreach ($medicamento->prices as $precio)
                            <td>{{$precio->sale_price}}</td>
                            @endforeach
                            <td>{{$medicamento->total}}</td>
                            @foreach ($medicamento->stocks as $stock)
                            <td><span class="badge bg-primary">{{$stock->shelf}}</span></td>
                            @endforeach
                            <td>
                              <button type="button" class="btn btn-xs btn-warning fas fa-image" data-bs-toggle="modal" data-bs-target="#imgModal{{$medicamento->id}}"></button>
                               @include('admin.inicio.imgmodal')
                            </td>
                            <td>
                              <button type="button"  class="btn btn-xs btn-success fas fa-dollar-sign" data-bs-toggle="modal" data-bs-target="#priceModal{{$medicamento->id}}"></button>
                              <button type="button"  class="btn btn-xs btn-info fas fa-trash" data-bs-toggle="modal" data-bs-target="#priceModal{{$medicamento->id}}"></button>
                              <button type="button"  class="btn btn-xs btn-danger fas fa-trash" data-bs-toggle="modal" data-bs-target="#priceModal{{$medicamento->id}}"></button>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                  </table>
              </div>

          </div>

      </div>
  </div>
</div>
   
@endsection

@section('javascript')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                language: {
                searchPlaceholder: "Buscar medicamento",
                search: ""
                },
                "dom":"<'row'<''<'pull-left'f>><'col-sm-4'>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'><'col-sm-7'p>>",
            });
        } );
    </script>
    <script src="{{ asset('js/medicamentos/medicamentos_price.js') }}"></script>
    <script src="{{ asset('js/medicamentos/medicamentos_update.js') }}"></script>
    <script src="{{ asset('js/medicamentos/medicamentos_search.js') }}"></script>
    <script src="{{ asset('js/medicamentos/medicamentos_delete.js') }}"></script>
@endsection
