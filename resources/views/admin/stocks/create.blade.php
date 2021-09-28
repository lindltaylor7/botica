@extends('layout.template')

@section('title', 'Agregar Stock')

@section('content')
<main class="content">
    <div class="wrapper">
        <form method="POST" action="{{route('stock.store')}}" class="formStock" id="wizard">
            @csrf
            <!-- SECTION 1 -->
            <h4></h4>
            <section>
                <h3>Añadir Stock</h3>
                <div class="form-row">
                    <div class="form-col">
                        <label for="">
                            Tipo
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <select class="form-control" name="type" id="type">
                                <option selected disabled>Seleccionar</option>
                                <option value="1">Articulo</option>
                                <option value="2">Medicamento</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-col" id="stockIdN" name="stockIdN">
                        <label for="">
                            Lista de Productos
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account-o"></i>
                            <select class="js-example-basic-single form-control" name="stockId">
                                <option selected disabled>Search</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-col" id="stockIdA" name="stockIdA">
                        <label for="">
                            Lista de Artículos
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account-o"></i>
                            <select class="js-example-basic-single form-control" name="stockId">
                                <option selected disabled>Search</option>
                                @foreach ($articles as $article)
                                    <option value="{{{$article->id, 'App\Models\Article'}}}">{{$article->tradename}} - {{$article->trademark}} - {{$article->presentation}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-col" id="stockIdM" name="stockIdM">
                        <label for="">
                            Lista de Medicamentos
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account-o"></i>
                            <select class="js-example-basic-single form-control" name="stockId">
                                <option selected disabled>Search</option>
                                @foreach ($medicamentos as $medicamento)
                                    <option value="{{{$medicamento->id, 'App\Models\Medicine'}}}">{{$medicamento->generic_name}} - {{$medicamento->tradename}} - {{$medicamento->concentration}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </section>

            <section>
                <h3>stock</h3>
                <div class="form-row">
                    <div class="form-col">
                        <label for="">
                            Anaquel
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account-o"></i>
                            <input type="text" name="shelf" class="form-control">
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="">
                            Costo de Stock
                        </label>
                        <div class="form-holder">
                            <i>S./</i>
                            <input type="text" name="cost_stock" class="form-control">
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="">
                            Cantidad de Cajas
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account-o"></i>
                            <input type="nunmber" name="quantity_box" class="form-control">
                        </div>
                    </div>
                </div>
                <h3>Lotes</h3>
                <div class="shadow card p-4">
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Código de lote
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-edit"></i>
                                <input type="text" name="code" class="form-control" placeholder="Ingrese el código de lote" required autocomplete="off">
                            </div>
                        </div>

                        <div class="form-col">
                            <label for="">
                                Cantidad de unidades
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-edit"></i>
                                <input type="number" name="quantity_unit" class="form-control" placeholder="Ingrese el código de lote" required autocomplete="off">
                            </div>
                        </div>


                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                Fecha de ingreso
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-edit"></i>
                                <div class="form-holder">
                                    <input type="date" name="entry_date" class="form-control" id="inputUsername" placeholder="">
                                    @error('f_ingreso')
                                        <p class="alert alert-danger">La fecha de ingreso es obligatorio</p>
                                    @enderror
                            </div>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                Fecha de vencimiento
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-edit"></i>
                                <div class="form-holder">
                                    <input type="date" name="expiry_date" class="form-control" id="inputUsername" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <h4></h4>
        </form>
    </div>
</main>
@endsection

@section('javascript')
    <script src="{{asset('js/stocks/selectpicker.js')}}"></script>

    {{-- <script src="{{asset('vendor/js/jquery-3.3.1.min.js')}}"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{asset('vendor/js/jquery.steps.js')}}"></script>
    <script src="{{asset('vendor/js/datepicker.js')}}"></script>
    <script src="{{asset('vendor/js/main.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        
        $(document).ready(function(){
            $("a[href='#finish']").on('click',function(){
                $('#wizard').submit();
            });
        });

        $(document).ready(function() {
            $('#stockIdN').show();
            $('#stockIdM').hide();
            $('#stockIdA').hide();

            $("select#type").on( 'change', function() {
                if( $(this).val() == "1" ) {
                    $('#stockIdM').hide();
                    $('#stockIdA').show();
                    $('#stockIdN').hide();
                }
                else if ( $(this).val() == "2") {
                    $('#stockIdA').hide();
                    $('#stockIdM').show();
                    $('#stockIdN').hide();
                }
                else
                {
                    $('#stockIdN').show();
                    $('#stockIdM').hide();
                    $('#stockIdA').hide();
                }
            });
        });
    </script>

    <script src="{{asset('js/stocks/calc.js')}}"></script>

@endsection
