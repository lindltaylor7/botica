@extends('layout.template')

@section('title', 'Inicio')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Inicio</h1>
            <div class="d-flex justify-content-between">
                {{-- <input type="text" class="d-inline form-control mb-3 w-75" id="search_index" placeholder="Buscar"> --}}

            </div>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="buttons-space">
                            @can('nullSell')
                            <a href="{{route('stock.create')}}" title="Agregar Stock" class="d-inline h-75 btn btn-secondary btn-lg"><i class="align-middle" data-feather="bar-chart"></i> Agregar Stock</a>
                            <a href="{{route('medicamentos.create')}}" title="Añadir Medicamento" class="d-inline h-75 btn btn-primary btn-lg"><i class="align-middle" data-feather="box"></i> Añadir Medicamento</a>
                            @endcan

                            <a href="{{route('ventas.index')}}" data-bs-toggle="modal" data-bs-target="#clientModal" title="Vender" class="d-inline h-75 btn btn-success btn-lg"><i class="align-middle" data-feather="dollar-sign"></i> Vender</a>
                            <a href="{{route('reportes.ven')}}" title="Reporte de Vencimiento" class="d-inline h-75 btn btn-info btn-lg"><i class="align-middle" data-feather="book"></i> Reporte de Vencimiento</a>
                        </div>
                    </div>
                    <div class="card-body table-responsive">
                        <table id="myTable" class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th class="d-none d-md-table-cell">Nombre Genérico</th>
                                    <th class="d-none d-md-table-cell">Nombre Comercial</th>
                                    <th class="d-none d-md-table-cell">Present.</th>
                                    <th class="d-none d-md-table-cell">Concent.</th>
                                    <th class="d-none d-md-table-cell">Precio</th>
                                    {{-- <th class="d-none d-md-table-cell">Utilidad</th> --}}
                                    <th class="d-none d-md-table-cell">Cantidad</th>
                                    <th class="d-none d-md-table-cell">Laboratorio</th>
                                    <th class="d-none d-md-table-cell">Anaquel</th>
                                    <th class="d-none d-md-table-cell">Foto</th>
                                </tr>
                            </thead>
                            <tbody id="dynamic-row-index">
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
                                        <td><a href="#" data-bs-toggle="modal" data-bs-target="#imgModal{{$medicamento->id}}"><i class="align-middle" data-feather="image"></i></a></td>
                                        @include('admin.inicio.imgmodal')
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.inicio.clientmodal')
</main>
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
@endsection
