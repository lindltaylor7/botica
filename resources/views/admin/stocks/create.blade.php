@extends('layout.template')

@section('title', 'Agregar Stock')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Agregar Stock</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ingrese los datos del Stock</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('stock.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">

                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Medicamento</label>
                                        <input type="text" class="form-control" id="search" autocomplete="off" placeholder="Buscar medicamento">
                                        <table class="table table-hover table-sm">
                                            <tbody class="border border-primary" id="medicamentos_select">
                                            </tbody>
                                        </table>
                                        <input type="hidden" name="medicamento_id" id="medicamento_id">

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Cantidad por caja</label>
                                        <input type="number" class="form-control" id="cant_caja" placeholder="Cantidad por caja" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Cantidad de cajas</label>
                                        <input type="number" id="cajas" class="form-control" placeholder="Cantidad de cajas">
                                    </div>
                                    <div class="mb-3">

                                        <label class="form-label" for="inputUsername">Cantidad en unidades</label>
                                        <input type="number" name="cantidad" class="form-control" id="cantidad" placeholder="Cantidad en unidades">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Costo del Stock</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">S./</span>
                                            <input type="number" step="any" name="costo" class="form-control" placeholder="Costo del stock">

                                        </div>
                                    </div>

                                    <div class="mb-3">

                                        <label class="form-label" for="inputUsername">Lote</label>
                                        <input type="text" name="lote" class="form-control" id="inputUsername" placeholder="Nro de Lote">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Fecha De Ingreso</label>
                                        <input type="date" name="f_ingreso" class="form-control" id="inputUsername" placeholder="">
                                    </>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Fecha De Vencimiento</label>
                                        <input type="date" name="f_vencimiento" class="form-control" id="inputUsername" placeholder="">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection

@section('javascript')
    <script src="{{ asset('js/stocks/selectpicker.js') }}"></script>
@endsection
