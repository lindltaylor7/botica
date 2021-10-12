@extends('layout.template')

@section('title', 'Stocks')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Stock</h1>
        <div class="d-flex align-items-center flex-wrap">
            <form class="form-inline">
                <input type="text" class="form-control w-75 h-100" name="buscar" placeholder="Buscar...">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
            <a href="{{route('stock.create')}}" class="btn btn-primary btn-md fs-6 mx-2 my-2"><i class="align-middle" data-feather="plus"></i>Agregar Stock</a>
            <a href="{{route('stock.export')}}" class="btn btn-success btn-md fs-6">Excel</a>
        </div>
        <div class="row">
            @foreach($productos as $producto)
                <div class="col-xl-6 col-sm-6 col-md-6" id='card'>
                    <div class="shadow card mb-3 mt-2 rounded">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="text-center p-4 border-end">
                                    <div>
                                        @foreach ($as as $a)
                                            @if ($a->id == $producto->id && $producto->type == 'App\Models\Article')
                                                @if($a->image)
                                                    <img class="img__stock rounded-circle" src="{{Storage::url($a->image->url)}}" alt="Imagen de medicamento">
                                                @else
                                                    <img class="img__stock rounded-circle" src="{{asset('img/medic1.jpg')}}" alt="">
                                                @endif
                                            @endif
                                        @endforeach
                                        @foreach ($ms as $m)
                                            @if ($m->id == $producto->id && $producto->type == 'App\Models\Medicine')
                                                @if($m->image)
                                                    <img class="img__stock rounded-circle" src="{{Storage::url($m->image->url)}}" alt="Imagen de medicamento">
                                                @else
                                                    <img class="img__stock rounded-circle" src="{{asset('img/medic1.jpg')}}" alt="">
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                    <span class="text-truncate pb-1 fw-bold display-block mt-3">{{$producto->generic_name}}</span><br>
                                    <small class="text-truncate pb-1">{{$producto->tradename}}</small>
                                </div>
                            </div>

                            <div class="col-xl-7">
                                <div class="p-4 text-center text-xl-start">
                                    <div class="row">
                                        <div class="col-6">
                                            <div>
                                                <p class="text-muted mb-2 text-truncate">Cantidad</p>
                                                <h5> @if ($producto->cantidad != 0)
                                                        {{$producto->cantidad}}
                                                    @else
                                                        0
                                                    @endif
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <p class="text-muted mb-2 text-truncate">Laboratorio / Proveedor</p>
                                                <h5>{{$producto->laboratory}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-4">
                                            <div>
                                                <p class="text-muted mb-2 text-truncate">Precio Unitario</p>
                                                <h5>
                                                    S/. {{$producto->sale_price}}
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        @foreach ($as as $a)
                                            @if ($a->id == $producto->id && $producto->type == 'App\Models\Article')
                                                <a href="#" class="text-decoration-underline text-reset" data-bs-toggle="modal" data-bs-target="#modalA{{$a->id}}">Ver más <i class="mdi mdi-arrow-right"></i></a>
                                            @endif
                                            @include('admin.stocks.modal_article')
                                        @endforeach
                                        @foreach ($ms as $m)
                                            @if ($m->id == $producto->id && $producto->type == 'App\Models\Medicine')
                                                <a href="#" class="text-decoration-underline text-reset" data-bs-toggle="modal" data-bs-target="#modalM{{$m->id}}">Ver más <i class="mdi mdi-arrow-right"></i></a>
                                            @endif
                                            @include('admin.stocks.modal_medicine')
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <br>
            @endforeach
        </div>
        {{ $productos->links() }}
    </div>
</main>
@endsection

@section('javascript')
    <script src="{{ asset('js/stocks/stocks_delete.js') }}"></script>
    <script src="{{ asset('js/stocks/stocks_update.js') }}"></script>
@endsection
