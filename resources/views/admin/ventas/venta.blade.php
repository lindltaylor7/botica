@extends('layout.template')

@section('title', 'Cesta de Productos')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
            <h1 class="h3 mb-3">Ventas</h1>
            @if ($venta->utilidad == null)
            <div id="container-search" class="d-flex flex-column justify-content-between">
                <input type="text" class="d-inline form-control w-100" autocomplete="off" id="search" placeholder="Buscar producto">
                <table class="table table-hover table-sm">
                    <tbody class="border border-primary" id="medicamentos_select">
                    </tbody>
                </table>
            </div>
            @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Cesta de Productos {{$id}}</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Cliente:</strong>{{$cliente->name}}</p>
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th class="d-none d-xl-table-cell">Nombre Genérico</th>
                                    <th class="d-none d-xl-table-cell">Nombre Comercial</th>
                                    <th class="d-none d-xl-table-cell">Fecha de Vencimiento</th>
                                    <th class="d-none d-xl-table-cell">Cantidad</th>
                                    <th class="d-none d-xl-table-cell">Precio</th>
                                    <th class="d-none d-xl-table-cell">Subtotal</th>
                                    @if ($venta->utilidad == null)
                                    <th class="d-none d-md-table-cell">Operaciones</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sum=0;
                                @endphp
                                @foreach ($details as $detail)
                                <tr>
                                    <td class="d-none d-xl-table-cell">{{$detail->medicamento->n_generico}}</td>
                                    <td class="d-none d-xl-table-cell">{{$detail->medicamento->n_comercial}}</td>
                                    <td class="d-none d-xl-table-cell">
                                        @foreach ($detail->medicamento->stocks as $stock)
                                        {{date('d/m/Y', strtotime($stock->f_vencimiento))}}<br>
                                        @endforeach
                                    </td>
                                    <td>{{$detail->cantidad}}</td>
                                    @if ($detail->tipo == 0)
                                        <td>S./{{number_format($detail->medicamento->precio->p_unitario,2,'.',"")}}</td>
                                    @else
                                        <td>S./{{number_format($detail->medicamento->precio->p_venta_caja,2,'.',"")}}</td>
                                    @endif


                                     <td class="d-none d-xl-table-cell">S./{{number_format($detail->utilidad,2,'.',"")}}</td>
                                     @php
                                     $sum = $sum + $detail->utilidad;
                                     @endphp
                                     @if ($venta->utilidad == 0.00)
                                     <td class="d-none d-md-table-cell">

                                        <button class="btn btn-primary" id="btn-edit-detail" data-cant="{{$detail->cantidad}}" data-price="{{$detail->medicamento->precio->p_unitario}}" value="{{$detail->id}}" data-bs-toggle="modal" data-bs-target="#editModal"><i class="align-middle" data-feather="edit-2"></i></button>
                                        <form action="{{route('detail.destroy', $detail->id)}}" class="d-inline" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="align-middle" data-feather="trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                     @endif


                                </tr>

                                @endforeach

                            </tbody>
                        </table>

                        <div class="row mt-3">
                            <div class="col-md-6">

                            </div>
                            <div class="col-md-6">
                                <form action="{{route('ventas.update',$id)}}" method="post" class="form-inline">
                                    @csrf
                                    <label for="total" class="mx-sm-3">TOTAL</label>
                                    <div class="input-group mx-sm-3 mb-2">
                                        <span class="input-group-text" id="basic-addon1">S./</span>

                                        <input type="number" name="total" class="form-control" id="total" value="@php echo number_format($sum,2,'.',"") @endphp" readonly>
                                    </div>
                                    @if ($venta->utilidad == null)
                                        <button type="submit" class="btn btn-primary mx-3">Finalizar Venta</button>
                                    @endif

                                    <a target="_blank" href="{{route('generarpdf.reporte',$id)}}" class="btn btn-success">Ver Boleta</a>
                                </form>

                            </div>




                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@include('admin.ventas.modal')
@include('admin.ventas.editmodal')
@endsection

@section('javascript')
    <script src="{{ asset('js/ventas/detail_modal.js') }}"></script>
    <script src="{{ asset('js/ventas/selectpicker.js') }}"></script>
    <script src="{{ asset('js/ventas/edit_modal.js') }}"></script>
@endsection
