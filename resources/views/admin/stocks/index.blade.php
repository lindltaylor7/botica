@extends('layout.template')

@section('title', 'Stocks')

@section('content')
<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">Stock</h1>
            <div class="d-flex align-items-center flex-wrap">
                <input type="text" class="form-control w-75 h-100" id="search_stock" placeholder="Buscar">
                <a href="{{route('stock.create')}}" class="btn btn-primary btn-md fs-6 mx-2 my-2"><i class="align-middle" data-feather="plus"></i>Agregar Stock</a>
                <a href="{{route('stock.export')}}" class="btn btn-success btn-md fs-6">Excel</a>
            </div>
            <div class="row">
                @foreach($stocks as $stock)
                    <div class="col-xl-6 col-sm-6 col-md-6">
                        <div class="card mb-3 mt-2 rounded">
                            <div class="row">
                                <div class="col-xl-5">
                                    <div class="text-center p-4 border-end">
                                        <div>
                                            @if($stock->img)
                                            {{-- <img class="" src="{{Storage::url($medicamento->img)}}" alt="Imagen de medicamento" style="width:100%"> --}}
                                            <img class="img__stock rounded-circle" src="https://boticaexcelentemente.com/storage/{{$stock->img}}" alt="Imagen de medicamento">
                                            @else
                                            <img class="img__stock rounded-circle" src="{{asset('img/medic1.jpg')}}" alt="">
                                            @endif

                                        </div>
                                        <span class="text-truncate pb-1 fw-bold display-block mt-3">{{$stock->medicamento->n_generico}}</span><br>
                                        <small class="text-truncate pb-1">{{$stock->medicamento->n_comercial}}</small>
                                    </div>
                                </div>

                                <div class="col-xl-7">
                                    <div class="p-4 text-center text-xl-start">
                                        <div class="row">
                                            <div class="col-6">
                                                <div>
                                                    <p class="text-muted mb-2 text-truncate">Cantidad</p>
                                                    <h5>{{$stock->cantidad}}</h5>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div>
                                                    <p class="text-muted mb-2 text-truncate">Laboratorio</p>
                                                    <h5>{{$stock->medicamento->lab}}</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-4">
                                            <a href="#" class="text-decoration-underline text-reset">Ver más <i class="mdi mdi-arrow-right"></i></a>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <br>
                @endforeach
                {{$stocks->links()}}
            </div>
    </div>
    @include('admin.stocks.modal')
</main>
@endsection

@section('javascript')
    <script src="{{ asset('js/stocks/stocks_search.js') }}"></script>
    <script src="{{ asset('js/stocks/stocks_delete.js') }}"></script>
    <script src="{{ asset('js/stocks/stocks_update.js') }}"></script>
@endsection
