@extends('layout.template')

@section('title', 'Editor de la imagen principal')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1>Editor de Imagen</h1>


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="col-sm-3 mb-3">
                            <label class="form-label" for="inputUsername">Imagen principal</label>
                                <br>
                            <form action="{{route('principal.update', $imagen->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type="file" name="url" accept="image/*">
                                <br>
                                <br>
                                <input type="submit" class="form-control btn btn-primary mb-3" Value="Subir Imagen">
                            </form>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection