@extends('layout.template')

@section('title', 'Inicio')


@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3">Articulos</h1>
            <div class="d-flex justify-content-between">
                <input type="text" class="d-inline form-control mb-3 w-75" id="search_med" placeholder="Buscar">
                <a href="{{ route('medicamentos.create') }}" class="d-inline h-75 btn btn-primary btn-lg"><i class="align-middle"
                        data-feather="plus"></i>Agregar Artículos</a>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover my-0 mb-3">
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
                                            <td>
                                                <a href="#" class="btn-price" id="{{ $medicamento->id }}"
                                                    data-bs-toggle="modal" data-bs-target="#priceModal"><i
                                                        class="align-middle" data-feather="dollar-sign"></i></a>
                                                <a href="#" class="btn-editar" id="{{ $medicamento->id }}"
                                                    data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                        class="align-middle" data-feather="edit-2"></i></a>
                                                <a href="#" class="btn-eliminar" id="{{ $medicamento->id }}"><i
                                                        class="align-middle" data-feather="trash"></i></a>
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
    </main>
@endsection

@section('javascript')
    <script src="{{ asset('js/medicamentos/medicamentos_price.js') }}"></script>
    <script src="{{ asset('js/medicamentos/medicamentos_update.js') }}"></script>
    <script src="{{ asset('js/medicamentos/medicamentos_search.js') }}"></script>
    <script src="{{ asset('js/medicamentos/medicamentos_delete.js') }}"></script>
@endsection
