@extends('layout.template')

@section('title', 'Reportes')

@section('content')
<main class="content">

    <h1 class="h3 mb-3">Reportes</h1>


    <div class="row">

        <div class="col-xl-12 col-xxl-5 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-6">

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Ingresos</h5>
                                <h1 class="mt-1 mb-3">S./{{number_format($ventas->sum('utilidad'), 2, ".", '')}}</h1>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title mb-4">Egresos</h5>
                                <h1 class="mt-1 mb-3">S./{{number_format($stocks->sum('costo'), 2, ".", '')}}</h1>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-xl-4">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Reporte</h5>
                            </div>
                            <div class="card-body text-center">
                                <img src="{{asset('img/avatars/mas.png')}}" alt="mas vendidos" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                                <h5 class="card-title mb-0">Medicamentos</h5>
                                <div class="text-muted mb-2">Más Vendidos</div>

                                <div>

                                    <a class="btn btn-primary btn-sm" href="{{route('reportes.top')}}"><span data-feather="message-square"></span> Ver Reporte</a>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-4 col-xl-4">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Reporte</h5>
                            </div>
                            <div class="card-body text-center">
                                <img src="{{asset('img/avatars/menos.png')}}" alt="menos vendidos" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                                <h5 class="card-title mb-0">Medicamentos</h5>
                                <div class="text-muted mb-2">Menos Vendidos</div>

                                <div>

                                    <a class="btn btn-primary btn-sm" href="{{route('reportes.bot')}}"><span data-feather="message-square"></span> Ver Reporte</a>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-4 col-xl-4">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5 class="card-title mb-0">Reporte</h5>
                            </div>
                            <div class="card-body text-center">
                                <img src="{{asset('img/avatars/caducidad.jpg')}}" alt="fecha de vencimiento" class="img-fluid rounded-circle mb-2" width="128" height="128" />
                                <h5 class="card-title mb-0">Medicamentos</h5>
                                <div class="text-muted mb-2">Por caducar</div>

                                <div>

                                    <a class="btn btn-primary btn-sm" href="{{route('reportes.ven')}}"><span data-feather="message-square"></span> Ver Reporte</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</main>
@endsection
