@extends('layout.template')

@section('title', 'Editor de la página principal')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1>Editor de Imágenes de La Página Principal</h1>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="col-sm-3 mb-3">
                            <label class="form-label" for="inputUsername">Imagen principal</label>

                            @foreach($imagene as $imagen)
                                <img class="form-control" id="inputUsername" src="{{Storage::url('imagenes/'.$imagen->url)}}">
                            @endforeach
                                <br>
                            <form action="{{route('principal.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="url" accept="image/*">
                                <br>
                                <br>
                                <input type="submit" class="form-control btn btn-primary mb-3" Value="Subir Imagen">
                            </form>
                            @foreach($imagene as $imagen)
                                <a type="button" class="form-control btn btn-success mb-3" href="{{route('principal.edit',$imagen->id)}}">Editar Imagen</a>
                            @endforeach 
                        </div>

                        <div class="row mb-3">
                            <label class="form-label" for="inputUsername">Imagen de Ofertas</label>
                            <img class="col-sm-3 mb-3" id="inputUsername" width="100" height="100" src="{{asset('img/medic1.jpg')}}">
                            <img class="col-sm-3 mb-3" id="inputUsername" width="100" height="100" src="{{asset('img/medic2.jpg')}}">
                            <img class="col-sm-3 mb-3" id="inputUsername" width="100" height="100" src="{{asset('img/medic3.jpg')}}">
                        </div>
                        <a type="button" class="form-control btn btn-success mb-3 w-25" href="{{route('principal.editar_1')}}">Editar Imágenes</a>


                        <div class="row mb-3">
                            <label class="form-label" for="inputUsername">Imagen de medicamentos más vendidos</label>
                            <img class="col-sm-3 mb-3" id="inputUsername" width="100" height="100" src="{{asset('img/medic1.jpg')}}">
                            <img class="col-sm-3 mb-3" id="inputUsername" width="100" height="100" src="{{asset('img/medic2.jpg')}}">
                            <img class="col-sm-3 mb-3" id="inputUsername" width="100" height="100" src="{{asset('img/medic3.jpg')}}">
                        </div>
                        <a type="button" class="form-control btn btn-success mb-3 w-25" href="{{route('principal.editar_2')}}">Editar Imágenes</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection