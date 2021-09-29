@extends('layout.template')

@section('title', 'Artículos')


@section('content')

        <div class="container-fluid">
            <h1 class="h3 mb-3">Tabla de Articulos</h1>
            <div>
                <div class="">
                    <div class="card">
                        <div class="m-3">
                            <a href="{{ route('articles.create') }}" class="d-inline-block btn btn-primary btn-lg fs-6"><i class="align-middle" data-feather="plus"></i>Agregar Artículos</a>
                        </div>
                        <div class="table table-responsive">
                            <table id="tablearticles" class="">
                                <thead>
                                    <tr>
                                        <th>Nombre comercial</th>                  
                                        <th>Marca</th>
                                        <th>Proovedor</th>  
                                        <th>Present.</th>                                                       
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Anaquel</th>
                                        <th>Foto</th>
                                        <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody id="dynamic-row">
                                    @foreach ($articulos as $articulo)
                                        <tr id="row{{ $articulo->id }}">
                                            <td>{{ $articulo->tradename}}</td>
                                            <td>{{ $articulo->trademark}}</td>
                                            <td>{{ $articulo->supplier}}</td>
                                            <td>{{ $articulo->presentation}}</td>
                                            <td>{{$articulo->price->first()->sale_price}}</td>    
                                            <td>{{ $articulo->supplier}}</td>
                                            <td><span class="badge bg-primary">a</span></td>
                                            <td>
                                                <button type="button" class="btn btn-xs btn-danger fas fa-image" data-bs-toggle="modal" data-bs-target="#imgModal{{$articulo->id}}"></button>
                                                 @include('admin.articles.imgarticlemodal')
                                              </td>
                                            <td class="text-center">
                                                <button type="button"  class="btn btn-xs btn-success" data-bs-toggle="modal" data-bs-target="#priceModal{{$articulo->id}}"><i class="fas fa-comments-dollar"></i></button>
                                                @include('admin.articles.pricearticlemodal')
                                                <button type="button"  class="btn btn-xs btn-info" data-bs-toggle="modal" data-bs-target="#editMedicineModal{{$articulo->id}}"><i class="far fa-edit"></i></button>
                                                @include('admin.articles.articlemodaledit')
                                 {{--                <button type="button"  class="btn btn-xs btn-danger" data-bs-toggle="modal" data-bs-target="#priceModal{{$articulo->id}}"><i class="fas fa-trash-alt"></i></button> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
            </div>
        </div>
{{--
        @include('admin.medicamentos.modal')
        @include('admin.medicamentos.pricemodal') --}}
@endsection

@section('javascript')
    <script src="{{ asset('js/medicamentos/medicamentos_price.js') }}"></script>
    <script src="{{ asset('js/medicamentos/medicamentos_update.js') }}"></script>
    <script src="{{ asset('js/medicamentos/medicamentos_search.js') }}"></script>
    <script src="{{ asset('js/medicamentos/medicamentos_delete.js') }}"></script>
    <!-- JavaScript Bundle with Popper -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>

    <script>
        $(document).ready( function () {
            $('#tablearticles').DataTable({
                language: {
                searchPlaceholder: "Buscar medicamento",
                search: ""
                },
                "dom":"<'row'<'col-sm-8'<'pull-left'f>><'col-sm-4'>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-5'><'col-sm-7'p>>",
            });
        } );
    </script>
    @endsection
