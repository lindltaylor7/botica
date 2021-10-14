@extends('layout.template')

@section('title', 'Cesta de Productos')

@section('content')

<main class="content">
    <div class="container-fluid p-0">

        <div id="client-search" class="d-flex flex-column justify-content-between">
            <p id="info-medic"></p>
            <input type="hidden" name="cliente_id" id="cliente_id">
            <div class="row">
                <div class="col-md d-flex flex-column">
                    <div class="form-group ">
                        <label for="dni">Cliente</label>
                        <div class="d-flex">
                            <div class="d-flex align-items-center">
                                <input type="text" name="dni" class="d-inline form-control w-100 me-2" id="search_dni" placeholder="Ingrese el DNI del cliente" readonly value={{$cliente->dni}}>
                                @error('dni')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <input type="text" name="name" style="text-transform:uppercase;" id="nombre_cliente" class="form-control w-100" readonly required value='{{$cliente->name}}'>
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div>
                        <div class="col-md">
                            <div class="form-group mb-5">
                                <label for="date">Fecha de Venta</label>
                                <input type="date" class="form-control" name="date" id="fecha" value={{$venta->date}} readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">Cesta de Productos</h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-hover my-0" id="table_sales">
                                        <thead>
                                            <tr>
                                                <th class="d-none d-xl-table-cell">Nombre Genérico</th>
                                                <th class="d-none d-xl-table-cell">Nombre Comercial</th>
                                                <th class="d-none d-xl-table-cell">Concent.</th>
                                                <th class="d-none d-xl-table-cell">Tipo</th>
                                                <th class="d-none d-xl-table-cell">Cantidad</th>
                                                <th class="d-none d-xl-table-cell">Importe</th>
                                            </tr>
                                        </thead>

                                        <tbody id="cart-shop">
                                            @foreach ($details as $detail)    
                                                <tr id="row${value.id}">
                                                    <td>{{$detail->detailable->generic_name}}</td>
                                                    <td>{{$detail->detailable->tradename}}</td>
                                                    <td>{{$detail->detailable->concentration}}</td>
                                                    <td>
                                                        @if ($detail->unit_type == 0)
                                                            Unidad
                                                        @elseif ($detail->unit_type == 1)
                                                            Blister
                                                        @elseif ($detail->unit_type == 2)
                                                            Caja
                                                        @endif
                                                    </td>
                                                    <td>{{$detail->quantity}}</td>
                                                    <td id="importe${value.id}" class="importe">{{$detail->amount}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                    <div class="row">
                                        <div class="col-md-8"></div>
                                        <div class="col-md-4">
                                            <label for="igv">Total</label>
                                            <input type="number" step="any" class="form-control" readonly name="total_sale" id="total" value={{$total}}>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{route('ventas.index')}}" class="btn btn-primary align-self-end px-5 mt-2">Salir</a>
                </div>
            </div>
        </div>
    </div>
    @include('admin.ventas.modal')
    @include('admin.ventas.editmodal')
</main>

@endsection

@section('javascript')
    <script src="{{ asset('js/ventas/reniec_dni.js') }}"></script>
    <script src="{{ asset('js/ventas/detail_modal.js') }}"></script>
    <script src="{{ asset('js/ventas/selectpicker.js') }}"></script>
    <script src="{{ asset('js/ventas/edit_modal.js') }}"></script>
@endsection
