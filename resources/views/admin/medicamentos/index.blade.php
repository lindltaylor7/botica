@extends('layout.template')

@section('title', 'Inicio')

@section('content')
<div class="main__datatable">
    <h2><b>Tabla de </b> Medicamentos</h2>
    <div class="main__datatable-content">
        {{-- <div class="main__datatable-pagination">
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
        </div> --}}
        <div class="main__table">
            <table id="myTable" class="main__datatable-table">
              <thead>
                <tr>
                    <th>Nombre Genérico</th>
                    <th>Nombre Comercial</th>
                    <th>Present.</th>
                    <th>Concent.</th>
                    <th>Laboratorio</th>
                    <th>Nro por Caja</th>
                    <th>Anaquel</th>
                    <th>Opciones</th>
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
