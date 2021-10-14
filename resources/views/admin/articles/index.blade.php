@extends('layout.template')

@section('title', 'Artículos')


@section('content')

        <div class="container-fluid">
            <h1 class="h3 mb-3">Tabla de Articulos</h1>
            <div>
                <div class="">
                    <div class="card p-3">
                        <div class="">
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
                                            <td>S./ {{$articulo->price->sale_price}}</td>
                                            <td>                                        
                                                @php
                                                $suma=0
                                                @endphp
                                                @foreach ($cantidad as $cant)
                                                    @if ($articulo->id == $cant->stockable_id && $cant->stockable_type == "App\Models\Article")
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
                                            </td>
                                            <td>
                                                @foreach ($articulo->stocks as $stock)
                                                <span class="badge bg-primary">{{$stock->shelf}}</span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-xs btn-danger fas fa-image" data-bs-toggle="modal" data-bs-target="#imgModal{{$articulo->id}}"></button>
                                                 @include('admin.articles.imgarticlemodal')
                                              </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-xs btn-success btn-modal-access" data-id="priceModal{{$articulo->id}}" data-bs-toggle="modal" data-bs-target="#priceModal{{$articulo->id}}"><i class="fas fa-comments-dollar" data-id="priceModal{{$articulo->id}}"></i></button>
                                                @include('admin.articles.pricearticlemodal')
                                                <button type="button" class="btn btn-xs btn-info" data-bs-toggle="modal" data-bs-target="#editMedicineModal{{$articulo->id}}"><i class="far fa-edit"></i></button>
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
        });

        document.addEventListener("click", e => {
            if (e.target.matches(".btn-modal-access, .btn-modal-access *")) {
                let $boxModal = document.getElementById(`${e.target.dataset.id}`);
                let $cost_box = $boxModal.querySelector("#cost_box");
                let $utility_box = $boxModal.querySelector("#utility_box");
                
                document.addEventListener("keyup", e => {
                    if (e.target === $cost_box || e.target === $utility_box) {
                        let number_box = $boxModal.querySelector('#number_box');
                        
                        let cost_box = $cost_box.value;
                        let utility_box = $utility_box.value;
                        let sale_price_box = $boxModal.querySelector("#sale_price_box");

                        let cost_price_unit = $boxModal.querySelector("#cost_price_unit");
                        let utility_unit = $boxModal.querySelector("#utility_unit");
                        let sale_price_unit = $boxModal.querySelector("#sale_price_unit");
                        
                        price();

                        function price () {
                            cost_box = parseFlotante(cost_box, 1)
                            sale_price_box.value = parseFlotante(parseFlotante(cost_box,1) + parseFlotante(cost_box * utility_box / 100, 2),1)
                            utility_unit.value = utility_box
                            cost_price_unit.value = parseFlotante(cost_box / number_box.value,2)
                            
                            // let igv_calc = cost_box * 18 / 100
                            // let igv_calc_total = parseFloat(cost_box) + parseFloat(cost_box * 18 / 100)

                            sale_price_unit.value =  parseFlotante(sale_price_box.value / number_box.value, 1);
                            
                            // console.log(parseFlotante(sale_price_box.value / number_box.value))
                            // console.log(cost_box + (cost_box * utility_box / 100))
                            // let percent = cost_box.value * cost_box.value / 100
                            // let subtotal = cost_box.value + percent;
                            // sale_price_box.value = subtotal;
                            // sale_price_unit.value = sale_price_box.value / number_box.value
                        }

                        function parseFlotante (number, cant = 1) {
                            number = parseFloat(number).toFixed(cant) == "NaN" ? "0" : parseFloat(number).toFixed(cant)
                            return parseFloat(number);
                        }
                    }
                })



               

                $('#foto').on('change', function(e){
                    var file = e.target.files[0];
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        $("#picture").attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                });
            }
        })
    </script>
    @endsection
