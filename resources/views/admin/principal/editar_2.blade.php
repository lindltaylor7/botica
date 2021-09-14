@extends('layout.template')

@section('title', 'Medicamentos más vendidos')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1>Editor de Imágenes de Medicamentos más Vendidos</h1>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        

                        <div class="col-sm-3 mb-3">
                            <label class="form-label" for="inputUsername">Imagen 01</label>
                            <img class="form-control" id="inputUsername" src="{{asset('img/medic1.jpg')}}">
                            <form>
                                <input type="button" class="form-control btn btn-success mb-3" value="Subir Imagen">
                                <input type="submit" class="form-control btn btn-primary mb-3" Value="Guardar">
                            </form>

                            <label class="form-label" for="inputUsername">Imagen 02</label>
                            <img class="form-control" id="inputUsername" src="{{asset('img/medic2.jpg')}}">
                            <form>
                                <input type="button" class="form-control btn btn-success mb-3" value="Subir Imagen">
                                <input type="submit" class="form-control btn btn-primary mb-3" Value="Guardar">
                            </form>

                            <label class="form-label" for="inputUsername">Imagen 03</label>
                            <img class="form-control" id="inputUsername" src="{{asset('img/medic3.jpg')}}">
                            <form>
                                <input type="button" class="form-control btn btn-success mb-3" value="Subir Imagen">
                                <input type="submit" class="form-control btn btn-primary mb-3" Value="Guardar">
                            </form>
                        </div>

                        <div class="row mb-3">
                            <label class="form-label" for="inputUsername">Imagen de Ofertas</label>
                            <img class="col-sm-3 mb-3" id="inputUsername" width="100" height="100" src="{{asset('img/medic1.jpg')}}">
                            <img class="col-sm-3 mb-3" id="inputUsername" width="100" height="100" src="{{asset('img/medic2.jpg')}}">
                            <img class="col-sm-3 mb-3" id="inputUsername" width="100" height="100" src="{{asset('img/medic3.jpg')}}">
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection