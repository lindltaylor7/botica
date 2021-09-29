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
                    <div class="form-group">
                        <label for="dni">Cliente</label>
                        <div class="">
                            <input type="text" name="dni" class="d-inline form-control w-100" id="search_dni" placeholder="Ingrese el DNI del cliente">
                        </div>
                        <input type="text" name="nombre_cliente" style="text-transform:uppercase;" id="nombre_cliente" class="form-control mt-1 w-50" readonly require>
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" name="check" type="checkbox" id="cajaCheck">
                        <label class="form-check-label" for="flexCheckDefault">
                          Sin DNI
                        </label>
                    </div>

                </div>
                <div class="col-md">
                    <div class="form-group mb-5">
                        <label for="date">Fecha Actual</label>
                        <input type="date" class="form-control" name="fecha" id="fecha" value="@php echo date('Y-m-d'); @endphp" readonly>
                    </div>
                </div>
            </div>




        </div>

        <form id="radio_form">
            <input type="radio" name="type" class="radiobtn" id="med" value="1" checked>
            <label for="pr">Medicamento</label>
            <input type="radio" name="type" class="radiobtn" id="med" value="2">
            <label for="med">Artículo</label>
        </form>

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
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th class="d-none d-xl-table-cell">Nombre Genérico</th>
                                    <th class="d-none d-xl-table-cell">Nombre Comercial</th>
                                    <th class="d-none d-xl-table-cell">Fecha de Vencimiento</th>
                                    <th class="d-none d-xl-table-cell">Tipo</th>
                                    <th class="d-none d-xl-table-cell">Cantidad</th>
                                    <th class="d-none d-xl-table-cell">Precio</th>
                                    <th class="d-none d-xl-table-cell">Subtotal</th>
                                    <th class="d-none d-md-table-cell">Operaciones</th>
                                </tr>
                            </thead>
                            <tbody id="cart-shop">



                            </tbody>
                        </table>
                        <div class="row">
                            <h2 class="text-center">TOTAL S./<strong id="total"></strong></h2>
                        </div>
                    </div>
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
