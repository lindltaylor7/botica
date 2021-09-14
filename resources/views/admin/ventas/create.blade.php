@extends('layout.template')

@section('title', 'Agregar Stock')

@section('content')
<main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Agregar Venta</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ingrese los datos de la venta</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('ventas.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">

                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Código</label>
                                        <input type="text" class="form-control" id="search" placeholder="Ingresar Código">
                                        
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Cliente</label>
                                        <select class="form-control" name="cliente_id">
                                            @foreach($clientes as $cliente)
                                                <option value="">{{$cliente->id}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Fecha De Venta</label>
                                        <input type="date" name="fecha" class="form-control" id="inputUsername" placeholder="">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Utilidad</label>
                                        <input type="number" name="utilidad" class="form-control" id="inputUsername" placeholder="Utilidad">
                                    </div>
                                    
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>
@endsection