@extends('layout.template')

@section('title', 'Por vencer')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Medicamentos cerca a vencer</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <table class="table table-hover my-0" id="myTable">
                            <thead>
                                <tr>
                                    <th>Nombre Genérico</th>
                                    <th>Nombre Comercial</th>
                                    <th>Presentación</th>
                                    <th class="d-none d-xl-table-cell">Fecha de Vencimiento</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vens as $ven)
                                @if ($ven->fecha >= $hoy)
                                    <tr>
                                        <td>{{$ven->generic_name}}</td>
                                        <td>{{$ven->tradename}}</td>
                                        <td>{{$ven->presentation}}</td>
                                        <td><span style='display: none;'>{{\Carbon\Carbon::parse($ven->fecha)->format('Ymd')}}</span>{{\Carbon\Carbon::parse($ven->fecha)->format('d - m - Y')}}</td>
                                    </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection

@section('javascript')
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
                "order": [[ 3, 'asc' ]],
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