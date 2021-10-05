@extends('layout.template')

@section('title', 'Cesta de Productos')

@section('content')

<main class="content">
    <div class="container-fluid p-0">

        <div id="client-search" class="d-flex flex-column justify-content-between">
            <p id="info-medic"></p>
            <input type="hidden" name="cliente_id" id="cliente_id">
            <div class="row">
                <div class="col-md">
                    <form action="{{route('ventas.store')}}" method="post" id="sale_form">
                        @csrf
                        <div class="form-group">
                            <label for="dni">Cliente</label>
                            <div class="d-flex align-items-center">
                                <input type="text" name="dni" class="d-inline form-control w-75" id="search_dni" placeholder="Ingrese el DNI del cliente">
                                <a id="search_dni_btn" class="btn btn-primary w-25">Buscar</a>
                                @error('dni')
                                <p class="text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <input type="text" name="name" style="text-transform:uppercase;" id="nombre_cliente" class="form-control mt-1 w-100" readonly require>
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="cajaCheck">
                            <label class="form-check-label" for="flexCheckDefault">
                            Sin DNI
                            </label>
                        </div>

                        <div>
                            <div class="col-md">
                                <div class="form-group mb-5">
                                    <label for="date">Fecha Actual</label>
                                    <input type="date" class="form-control" name="date" id="fecha" value="@php echo date('Y-m-d'); @endphp" readonly>
                                </div>
                            </div>
                        </div>

                        <div>
                            <input type="radio" name="u_type" class="radiobtn" id="med" value="1" checked>
                            <label for="pr">Medicamento</label>
                        </div>

                        <div>
                            <input type="radio" name="u_type" class="radiobtn" id="med" value="2">
                            <label for="med">Artículo</label>
                        </div>

                        <div id="container-search" class="d-flex flex-column justify-content-between">
                            <label for="search" class="mb-1">Buscar Producto</label>
                            <input type="text" class="d-inline form-control w-100" autocomplete="off" id="search" placeholder="Buscar producto">
                            <table class="table table-hover table-sm">
                                <tbody class="border border-primary" id="medicamentos_select">
                                </tbody>
                            </table>
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
                                                    <th class="d-none d-xl-table-cell">P. de Venta</th>
                                                    <th class="d-none d-xl-table-cell">Subtotal</th>
                                                    <th class="d-none d-xl-table-cell">IGV</th>
                                                    <th class="d-none d-xl-table-cell">Importe</th>
                                                    <th class="d-none d-md-table-cell">Operaciones</th>
                                                </tr>
                                            </thead>

                                            <tbody id="cart-shop">

                                            </tbody>

                                        </table>
                                        <div class="row">
                                            <div class="col-md-8"></div>
                                            <div class="col-md-4">
                                                <label for="igv">Subtotal</label>
                                                <input type="number" step="any" class="form-control" readonly name="total_utility" id="total_noigv">
                                                <label for="igv">I.G.V.(18%)</label>
                                                <input type="number" step="any" class="form-control" readonly name="igv" id="total_igv">
                                                <label for="igv">Total</label>
                                                <input type="number" step="any" class="form-control" readonly name="total_sale" id="total">
                                            </div>
                                        </div>

                                        <input type="submit" id="save_form" class="btn btn-success" value="Guardar">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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
