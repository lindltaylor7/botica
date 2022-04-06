@extends('layout.template')

@section('title', 'Reporte económico')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <select class="form-control" id="time">
                            <option selected disabled>Seleccione una opción de tiempo</option>
                            <option value="1">Día</option>
                            <option value="2">Mes</option>
                            <option value="3">Año</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-4 d-none" id="block-calendar">
                            <div class="card-header">
                                <input type="date" class="form-control" name="fecha_calendar" id="fecha_calendar">
                            </div>
                        </div>
                        <div class="col-4 d-none" id="block-mes">
                            <div class="card-header">
                                <select class="form-control" value='' name="mes" id="mes">
                                    <option selected disabled value=''>Seleccione un mes</option>
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
                        <div class="col-4 d-none" id="block-year">
                            <div class="card-header">
                                <select class="form-control" value='' name="year" id="year">
                                    <option selected disabled value=''>Seleccione un año</option>
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
                        <table class="table table-hover my-0" id="myTable" >
                            <thead>
                                <tr>
                                    <th>Nombre Genérico</th>
                                    <th>Nombre Comercial</th>
                                    <th class="d-none d-md-table-cell">Total de Vendidas</th>
                                    <th class="d-none d-md-table-cell">Monto Total</th>
                                </tr>
                            </thead>
                            <tbody id="row-report" name='row-report'>
                                {{-- @foreach($tops as $top)
                                    <tr>
                                        <td>{{$top->generic_name}}</td>
                                        <td>{{$top->tradename}}</td>
                                        <td>{{$top->cantidad}}</td>
                                        <td>S./{{$top->total}}</td>
                                    </tr>
                                @endforeach --}}
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
    <script src="{{ asset('js/reportes/eco.js') }}"></script>
    {{-- <script src="{{ asset('js/reportes/year.js') }}"></script> --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                language: {
                searchPlaceholder: "Buscar producto",
                search: "",
                },
                "ordering": true,
                "order": [[ 2, 'desc' ]],
                dom:"<'row'<'col-sm-8'<'pull-left'f>><'col-sm-4'B>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'><'col-sm-7'p>>",
                buttons: [
                    'excelHtml5',
                    'pdfHtml5'
                ]
            });
        } );
    </script>
@endsection