@extends('layout.template')

@section('title', 'Inicio')

@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-3">Tabla de Medicamentos</h1>
  <div>
      <div class="">
          <div class="card">
              <div class="m-3">
                  <a href="{{ route('medicamentos.create') }}" class="d-inline-block btn btn-primary btn-lg fs-6"><i class="align-middle" data-feather="plus"></i>Agregar Medicamentos</a>
              </div>
              <div class="table table-responsive">
                <table id="myTable" class="main__datatable-table">
                      <thead>
                          <tr>
                            <th>Nombre Genérico</th>
                            <th>Nombre Comercial</th>
                            <th>Concent.</th>
                            <th>Present.</th>
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
                            <td>{{ucfirst(strtolower($medicamento->presentation))}}</td>
                            <td>{{ucfirst(strtolower($medicamento->laboratory))}}</td>
                            <td>S./ {{$medicamento->price->sale_price}}</td>
                            <td>
                                @foreach ($medicamento->stocks as $stock)
                                    @foreach ($stock->batches as $batch)
                                        {{$batch->quantity_unit}}
                                    @endforeach
                                @endforeach
                            </td>
                            <td>
                            @foreach ($medicamento->stocks as $stock)
                            <span class="badge bg-primary">{{$stock->shelf}}</span>
                            @endforeach
                            </td>
                            <td>
                              <button type="button" class="btn btn-xs btn-warning fas fa-image" data-bs-toggle="modal" data-bs-target="#imgModal{{$medicamento->id}}"></button>
                               @include('admin.medicamentos.imgmodal')
                            </td>
                            <td>
                              <button type="button"  class="btn btn-xs btn-success" data-bs-toggle="modal" data-bs-target="#priceModal{{$medicamento->id}}"><i class="fas fa-comments-dollar"></i></button>
                              @include('admin.medicamentos.pricemodal')
                              <button type="button"  class="btn btn-xs btn-info" data-bs-toggle="modal" data-bs-target="#editMedicineModal{{$medicamento->id}}"><i class="far fa-edit"></i></button>
                              @include('admin.medicamentos.medicinemodaledit')
                              <button type="button"  class="btn btn-xs btn-danger" data-bs-toggle="modal" data-bs-target="#priceModal{{$medicamento->id}}"><i class="fas fa-trash-alt"></i></button>
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
