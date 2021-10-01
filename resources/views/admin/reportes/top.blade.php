@extends('layout.template')

@section('title', 'Top Ventas')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Medicamentos mas Vendidos</h1>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <select class="form-control" name="" id="time">
                            <option value="">Seleccione una opción de tiempo</option>
                            <option value="1">Día</option>
                            <option value="2">Mes</option>
                            <option value="3">Año</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="card-header">
                                <input type="date" class="form-control" name="fecha_calendar" id="fecha_calendar">
                                <a class="btn btn-success mt-3" href="{{route('export')}}">Generar Excel</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card-header">
                                <select class="form-control" name="mes" id="mes" >
                                    <option selected disabled>Seleccione un mes</option>
                                    <option value="01">Enero</option>
                                    <option value="02">Febrero</option>
                                    <option value="03">Marzo</option>
                                    <option value="04">Abril</option>
                                    <option value="05">Mayo</option>
                                    <option value="06">Junio</option>
                                    <option value="07">Julio</option>
                                    <option value="08">Agosto</option>
                                    <option value="09">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card-header">
                                <select class="form-control" name="year" id="year">
                                    <option selected disabled>Seleccione un año</option>
                                    <option value="2021">2021</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover my-0">
                            <thead>
                                <tr>
                                    <th>Nombre Genérico</th>
                                    <th>Nombre Comercial</th>
                                    <th class="d-none d-md-table-cell">Total de Vendidas</th>
                                    <th class="d-none d-md-table-cell">Monto Total</th>
                                </tr>
                            </thead>
                            <tbody id="row-report" name='row-report'>                
                                @foreach($tops as $top)
                                    <tr>
                                        <td>{{$top->generic_name}}</td>
                                        <td>{{$top->tradename}}</td>
                                        <td>{{$top->cantidad}}</td>
                                        <td>S./{{$top->total}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                       <div class="text-end"><p id="suma"></p></div>     
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('javascript')
    <script src="{{ asset('js/reportes/top.js') }}"></script>
    <script src="{{ asset('js/reportes/year.js') }}"></script>
@endsection
