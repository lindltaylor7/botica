@extends('layout.template')

@section('title', 'Reportes')

@section('content')
<main class="content">

    <h1 class="fs-4 mb-3">Informes del mes</h1>
    <div class="row w-100">
        <div class="w-100">
            <div class="row mb-5">
                <div class="col-sm-6 my-2">
                    <div class="shadow">
                        <div class="card-body py-3 px-5 d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-4">Ingresos</h5>
                                <h1 class="mt-1 mb-3 fs-3">S./{{number_format($ventas->sum('total_sale'), 2, ".", '')}}</h1>
                            </div>
                            <div class="display-1">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 my-2">
                    <div class="shadow">
                        <div class="card-body py-3 px-5 d-flex justify-content-between align-items-center">
                            <div>
                                <h5 class="card-title mb-4">Egresos</h5>
                                <h1 class="mt-1 mb-3 fs-3">S./{{number_format($stocks->sum('cost_stock'), 2, ".", '')}}</h1>
                            </div>
                            <div class="display-1">
                                <i class="fas fa-envelope-open-text"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="fs-4 mb-3">Reportes del mes</h2>
            <div class="container-fluid d-flex justify-content-between flex-wrap p-0">
                <div class="col-md-4 col-xl-4 mb-4 shadow-sm w-25 report-medicine">
                    <div class="py-3 px-2">
                        <h5 class="card-title mb-0 px-3 text-center w-75 m-auto">Reporte de medicamentos</h5>
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <span class="display-1">
                                <i class="fas fa-prescription-bottle-alt"></i>
                            </span>
                            <span class="fs-6 mb-3 w-50">Medicamentos más vendidos</span>
                            <a class="btn btn-primary btn-sm bg-transparent border text-secondary py-2 px-4" href="{{route('reportes.top')}}"><span data-feather="message-square"></span> Ver Reporte</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4 mb-4 shadow-sm w-25 report-medicine">
                    <div class="py-3 px-2">
                        <h5 class="card-title mb-0 px-3 text-center w-75 m-auto">Reporte de medicamentos</h5>
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <span class="display-1">
                                <i class="fas fa-tablets"></i>
                            </span>
                            <span class="fs-6 mb-3 w-75">Medicamentos menos vendidos</span>
                            <a class="btn btn-primary btn-sm bg-transparent border text-secondary py-2 px-4" href="{{route('reportes.bot')}}"><span data-feather="message-square"></span> Ver Reporte</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xl-4 mb-4 shadow-sm w-25 report-medicine">
                    <div class="py-3 px-2">
                        <h5 class="card-title mb-0 px-3 text-center w-75 m-auto">Reporte de medicamentos</h5>
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <span class="display-1">
                                <i class="fas fa-capsules"></i>
                            </span>
                            <span class="fs-6 mb-3 w-50">Medicamentos por caducar</span>
                            <a class="btn btn-primary btn-sm bg-transparent border text-secondary py-2 px-4" href="{{route('reportes.bot')}}"><span data-feather="message-square"></span> Ver Reporte</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
