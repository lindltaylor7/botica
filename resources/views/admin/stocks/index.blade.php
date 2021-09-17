@extends('layout.template')

@section('title', 'Stocks')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Stock</h1>
            <div class="d-flex justify-content-between">
                <input type="text" class="d-inline form-control mb-3 w-75" id="search_stock" placeholder="Buscar">
                <a href="{{route('stock.create')}}" class="d-inline h-75 btn btn-primary btn-lg"><i class="align-middle" data-feather="plus"></i>Agregar Stock</a>
                <a href="{{route('stock.export')}}" class="d-inline h-75 btn btn-success btn-lg">Excel</a>
            </div>

            <div class="row">
                @foreach($stocks as $stock)
                    <div class="col-xl-6 col-sm-6 col-md-6">
                        <div class="card mb-3 mt-2 rounded">
                            <div class="row">
                                <div class="col-xl-5">
                                    <div class="text-center p-4 border-end">
                                        <div>
                                            <img class="img__stock rounded-circle" src="{{asset('img/medic1.jpg')}}" alt="">
                                        </div>
                                        <br>
                                        <span class="text-truncate pb-1 fw-bold display-block">{{$stock->medicamento->n_generico}}</span><br>
                                        <small class="text-truncate pb-1">{{$stock->medicamento->n_comercial}}</small>
                                    </div>
                                </div>

                                <div class="col-xl-7">
                                    <div class="p-4 text-center text-xl-start">
                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <p class="text-muted mb-2 text-truncate">Cantidad</p>
                                                    <h5>{{$stock->cantidad}}</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <p class="text-muted mb-2 text-truncate">Laboratorio</p>
                                                    <h5>{{$stock->medicamento->lab}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a href="#" class="text-decoration-underline text-reset">Ver más <i class="mdi mdi-arrow-right"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
                
            </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th class="d-none d-md-table-cell">Nombre Genérico</th>
                                    <th class="d-none d-md-table-cell">Nombre Comercial</th>
                                    <th class="d-none d-md-table-cell">Laboratorio</th>
                                    <th class="d-none d-md-table-cell">Cantidad</th>
                                    <th class="d-none d-md-table-cell">Fecha de Ingreso</th>
                                    <th class="d-none d-md-table-cell">Fecha de Vencimiento</th>
                                    <th class="d-none d-md-table-cell">Opciones</th>
                                </tr>
                            </thead>
                            <tbody id="dynamic-row">
                                @foreach($stocks as $stock)
                                    <tr id="row{{$stock->id}}">
                                        <td>{{$stock->medicamento->n_generico}}</td>
                                        <td>{{$stock->medicamento->n_comercial}}</td>
                                        <td>{{$stock->medicamento->lab}}</td>
                                        <td>{{$stock->cantidad}}</td>
                                        <td>{{date('d/m/Y', strtotime($stock->f_ingreso))}}</td>
                                        <td>{{date('d/m/Y', strtotime($stock->f_vencimiento))}}</td>
                                        <td>
                                            <a href="#" class="btn-editar" id="{{ $stock->id }}" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="align-middle" data-feather="edit-2"></i></a>
                                            <!--<a href="#" class="btn-eliminar" id="{{ $stock->id }}"><i class="align-middle" data-feather="trash"></i></a>-->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$stocks->links()}}
                </div>
                
            </div>
        </div>
    </div>
    @include('admin.stocks.modal')
</main>
@endsection

@section('javascript')
    <script src="{{ asset('js/stocks/stocks_search.js') }}"></script>
    <script src="{{ asset('js/stocks/stocks_delete.js') }}"></script>
    <script src="{{ asset('js/stocks/stocks_update.js') }}"></script>
@endsection
