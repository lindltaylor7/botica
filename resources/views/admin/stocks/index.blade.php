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
            @foreach($medicines as $medicine)
                <div class="col-xl-6 col-sm-6 col-md-6">
                    <div class="shadow card mb-3 mt-2 rounded">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="text-center p-4 border-end">
                                    <div>
                                        @if($medicine->image)
                                        <img class="img__stock rounded-circle" src="{{Storage::url($medicine->image->url)}}" alt="Imagen de medicamento">
                                        {{-- <img class=" rounded-circle" src="https://boticaexcelentemente.com/storage/{{$stock->img}}" alt="Imagen de medicamento"> --}}
                                        @else
                                        <img class="img__stock rounded-circle" src="{{asset('img/medic1.jpg')}}" alt="">
                                        @endif
                                    </div>
                                    <h5 class="mt-3">{{$medicine->generic_name}}</h5 class="mt-3">
                                    <small class="text-truncate pb-1">{{$medicine->tradename}}</small>
                                </div>
                            </div>

                            <div class="col-xl-7">
                                <div class="p-4 text-center text-xl-start">
                                    <div class="row">
                                        <div class="col-6">
                                            <div>
                                                @php
                                                    $suma=0
                                                @endphp
                                                <p class="text-muted mb-2 text-truncate">Cantidad</p>
                                                <h5>
                                                @foreach ($cantidad as $cant)
                                                    @if ($medicine->id == $cant->stockable_id && $cant->stockable_type == "App\Models\Medicine")
                                                        @foreach ($cant->batches as $c)
                                                            @php
                                                                $suma += $c->quantity_unit;
                                                            @endphp
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                @php
                                                    echo $suma
                                                @endphp
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <p class="text-muted mb-2 text-truncate">Laboratorio</p>
                                                <h6>{{$medicine->laboratory}}</h6>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-4">
                                            <div>
                                                <p class="text-muted mb-2 text-truncate">Precio Unitario</p>
                                                <h5>
                                                    @foreach ($precio as $p)
                                                        @if ($medicine->id == $p->priceable_id && $p->priceable_type == "App\Models\Medicine")
                                                            S./ {{$p->sale_price}}
                                                        @endif
                                                    @endforeach
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <a href="#" class="text-decoration-underline text-reset" data-bs-toggle="modal" data-bs-target="#modalM{{$medicine->id}}">Ver más <i class="mdi mdi-arrow-right"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <br>
                @include('admin.stocks.modal_medicine')
            @endforeach
            {{-- {{$stocks->links()}} --}}
            @foreach($articles as $article)
                <div class="col-xl-6 col-sm-6 col-md-6">
                    <div class="card mb-3 mt-2 rounded">
                        <div class="row">
                            <div class="col-xl-5">
                                <div class="text-center p-4 border-end">
                                    <div>
                                        @if($medicine->img)
                                        <img class="" src="{{Storage::url($medicamento->img)}}" alt="Imagen de medicamento" style="width:100%">
                                        {{-- <img class="img__stock rounded-circle" src="https://boticaexcelentemente.com/storage/{{$stock->img}}" alt="Imagen de medicamento"> --}}
                                        @else
                                        <img class="img__stock rounded-circle" src="{{asset('img/medic1.jpg')}}" alt="">
                                        @endif

                                    </div>
                                    <span class="text-truncate pb-1 fw-bold display-block mt-3">{{$article->tradename}}</span><br>
                                    <small class="text-truncate pb-1">{{$article->trademark}}</small>
                                </div>
                            </div>

                            <div class="col-xl-7">
                                <div class="p-4 text-center text-xl-start">
                                    <div class="row">
                                        <div class="col-6">
                                            <div>
                                                <p class="text-muted mb-2 text-truncate">Cantidad</p>
                                                @php
                                                $suma=0
                                                @endphp
                                                <h5>
                                                    @foreach ($cantidad as $cant)
                                                        @if ($article->id == $cant->stockable_id && $cant->stockable_type == "App\Models\Article")
                                                            @foreach ($cant->batches as $c)
                                                                @php
                                                                    $suma += $c->quantity_unit;
                                                                @endphp
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                    @php
                                                        echo $suma
                                                    @endphp
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div>
                                                <p class="text-muted mb-2 text-truncate">Proveedor</p>
                                                <h5>{{$article->supplier}}</h5>
                                            </div>
                                        </div>
                                        <div class="col-6 mt-4">
                                            <div>
                                                <p class="text-muted mb-2 text-truncate">Precio Unitario</p>
                                                <h5>
                                                    @foreach ($precio as $p)
                                                        @if ($article->id == $p->priceable_id && $p->priceable_type == "App\Models\Article")
                                                            {{$p->sale_price}}
                                                        @endif
                                                    @endforeach
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <a href="#" class="text-decoration-underline text-reset" data-bs-toggle="modal" data-bs-target="#modalA{{$article->id}}">Ver más <i class="mdi mdi-arrow-right"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                <br>
                @include('admin.stocks.modal_article')
            @endforeach
            {{-- {{$stocks->links()}} --}}
        </div>
    </div>
</main>
@endsection

@section('javascript')
    <script src="{{ asset('js/stocks/stocks_search.js') }}"></script>
    <script src="{{ asset('js/stocks/stocks_delete.js') }}"></script>
    <script src="{{ asset('js/stocks/stocks_update.js') }}"></script>
@endsection
