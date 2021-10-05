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
                        <table class="table table-hover my-0">
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
                                        <td>{{$ven->fecha}}</td>
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
