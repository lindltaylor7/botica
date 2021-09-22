@extends('layout.template')

@section('title', 'Inicio')


@section('content')
   
        <div class="container-fluid">
            <h1 class="h3 mb-3">Tabla de Articulos</h1>
            <div>
                <div class="">
                    <div class="card">
                        <div class="m-3">
                            <a href="{{ route('medicamentos.create') }}" class="d-inline-block btn btn-primary btn-lg fs-6"><i class="align-middle" data-feather="plus"></i>Agregar Artículos</a>
                        </div>
                        <div class="table table-responsive">
                            <table id="tablearticles" class="">
                                <thead>
                                    <tr>
                                        <th class="d-none d-md-table-cell">Nombre Genérico</th>
                                        <th class="d-none d-md-table-cell">Nombre Comercial</th>
                                        <th class="d-none d-md-table-cell">Concentración</th>
                                        <th class="d-none d-md-table-cell">Presentación</th>
                                        <th class="d-none d-md-table-cell">Laboratorio</th>
                                        <th class="d-none d-md-table-cell">Nro por Caja</th>
                                        <th class="d-none d-md-table-cell">Anaquel</th>
                                        <th class="d-none d-md-table-cell">Opciones</th>
                                    </tr>


                                </thead>
                                <tbody id="dynamic-row">
                                    @foreach ($medicamentos as $medicamento)
                                        <tr id="row{{ $medicamento->id }}">
                                            <td>{{ $medicamento->n_generico }}</td>
                                            <td>{{ $medicamento->n_comercial }}</td>
                                            <td>{{ $medicamento->concent }}</td>
                                            <td>{{ $medicamento->present }}</td>
                                            <td>{{ $medicamento->lab }}</td>
                                            <td>{{ $medicamento->nro_caja }}</td>
                                            <td><span class="badge bg-primary">{{ $medicamento->anaquel }}</span></td>
                                            <td class="text-center">
                                             <button class="" id="{{ $medicamento->id }}" data-bs-toggle="modal" data-bs-target="#priceModal"><i  class="fa fa-dollar-sign mr-25"></i></button>
                                             <button class=""  data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-edit mr-25"></i></button>
                                             <button class="" id="{{ $medicamento->id }}"><i class="fas fa-trash mr-25"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{$medicamentos->links()}}
                        </div>

                    </div>

                </div>
            </div>
        </div>
        
        @include('admin.medicamentos.modal')
        @include('admin.medicamentos.pricemodal')         
@endsection

@section('javascript')
    <script src="{{ asset('js/medicamentos/medicamentos_price.js') }}"></script>
    <script src="{{ asset('js/medicamentos/medicamentos_update.js') }}"></script>
    <script src="{{ asset('js/medicamentos/medicamentos_search.js') }}"></script>
    <script src="{{ asset('js/medicamentos/medicamentos_delete.js') }}"></script>
    <!-- JavaScript Bundle with Popper -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready( function () {
            $('#tablearticles').DataTable({
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
    @endsection
