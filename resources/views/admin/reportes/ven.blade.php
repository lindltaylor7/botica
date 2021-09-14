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
                                    <th class="d-none d-xl-table-cell">Fecha de Vencimiento</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vens as $ven)
                                    <tr>
                                        <td>{{$ven->n_generico}}</td>
                                        <td>{{$ven->n_comercial}}</td>
                                        <td>{{date('d/m/Y', strtotime($ven->f_vencimiento))}}</td>
                                    </tr>
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
