@extends('layout.template')

@section('title', 'Agregar Artículo')

@section('content')
<main class="content">
    <div class="wrapper">
        <form method="POST" action="{{route('articles.store')}}" enctype="multipart/form-data" id="wizard" style="height: auto;">
            @csrf
            <!-- SECTION 1 -->
            <h4></h4>
            <section>
                @if (session()->has('message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    El articulo ya está registrado
                </div>
                @endif
                <h3>Agregar Artículo</h3>
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Nombre Comercial</span>
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="tradename" class="form-control" id="tradenameart" placeholder="Nombre de Articulo" value="{{old('tradename')}}">
                        </div>
                        @error('tradename')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                    </div>
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Nombre de Marca</span>
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="trademark" class="form-control" id="trademarkart" placeholder="Nombre de Marca" value="{{old('trademark')}}">
                        </div>
                        @error('trademark')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Proveedor</span>
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="supplier" class="form-control" id="supplierart" placeholder="Proveedor" value="{{old('supplier')}}">
                        </div>
                        @error('supplier')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                    </div>
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Presentación</span>
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="presentation" class="form-control" id="presentationart" placeholder="Presentación" value="{{old('presentation')}}">
                        </div>
                        @error('presentation')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Cantidad por caja</span>
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="number_box" class="form-control" id="number_box" placeholder="Cantidad por caja" value="{{old('number_box')}}">
                        </div>
                        @error('number_box')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                    </div>
                    <div class="form-col">

                    </div>
                </div>
            </section>

            <h4></h4>
            <section>
                <h3>Precios del Artículo</h3>
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Precio de Costo por caja</span>
                        </label>
                        <div class="form-holder">
                            <i>S./</i>
                            <input type="text" name="cost_box" id="cost_price" class="form-control" id="inputUsername" placeholder="Costo por Caja" value="{{old('cost_box')}}">
                        </div>
                        @error('cost_box')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Porcentaje de Utilidad por caja</span>
                        </label>
                        <div class="form-holder">
                            <i>%</i>
                            <input type="text" name="utility" id="utility_box" class="form-control" id="inputUsername" placeholder="Utilidad por caja"  value="{{old('utility')}}">
                        </div>
                        @error('utility')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                    </div>
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Precio de venta por caja</label>
                        <div class="form-holder">
                            <i>S./</i>
                            <input type="text" name="tradename_box" id="sale_price_box" class="form-control" id="inputUsername" placeholder="P. de venta por caja" readonly>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Precio de Costo por unidad</label>
                        <div class="form-holder">
                            <i>S./</i>
                            <input type="text" name="cost_price" id="cost_price_unit" class="form-control" id="inputUsername" placeholder="Costo por unidad" readonly>
                        </div>
                    </div>
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Porcentaje de Utilidad por unidad</label>
                        <div class="form-holder">
                            <i>%</i>
                            <input type="text" name="utility" id="utility_unit" class="form-control" id="inputUsername" placeholder="Utilidad por unidad" readonly>
                        </div>
                    </div>
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Precio de venta por unidad</label>
                        <div class="form-holder">
                            <i>S./</i>
                            <input type="text" name="sale_price" id="sale_price_unit" class="form-control" id="inputUsername" placeholder="P. de venta por unidad" readonly>
                        </div>
                    </div>
                </div>
            </section>

            <h4></h4>
            <section>
                <h3>stock</h3>
                <div class="form-row">
                    <div class="form-col">
                        <label for="">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Anaquel</span>
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account-o"></i>
                            <input type="text" name="shelf" class="form-control" value="{{old('shelf')}}">
                        </div>
                        @error('shelf')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                    </div>
                    <div class="form-col">
                        <label for="">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Costo de Stock</span>
                        </label>
                        <div class="form-holder">
                            <i>S./</i>
                            <input type="text" name="cost_stock" class="form-control" value="{{old('cost_stock')}}">
                        </div>
                        @error('cost_box')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                    </div>
                    <div class="form-col">
                        <label for="">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Cantidad de Cajas</span>
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account-o"></i>
                            <input type="nunmber" name="quantity_box" class="form-control" value="{{old('quantity_box')}}">
                        </div>
                        @error('quantity_box')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                    </div>
                </div>
                <h3>Lotes</h3>
                <div class="shadow card p-4">
                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                <i class="fas fa-asterisk text-danger"></i>
                                <span>Código de lote</span>
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-edit"></i>
                                <input type="text" name="code" class="form-control" placeholder="Ingrese el código de lote" required autocomplete="off" value="{{old('code')}}">
                            </div>
                            @error('code')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                        <div class="form-col">
                            <label for="">
                                <i class="fas fa-asterisk text-danger"></i>
                                <span>Cantidad de unidades</span>
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-edit"></i>
                                <input type="number" name="quantity_unit" class="form-control" placeholder="Ingrese la cantidad de articulos" required autocomplete="off" value="{{old('quantity_unit')}}">
                            </div>
                            @error('quantity_unit')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>


                    </div>

                    <div class="form-row">
                        <div class="form-col">
                            <label for="">
                                <i class="fas fa-asterisk text-danger"></i>
                                <span>Fecha de ingreso</span>
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-edit"></i>
                                <div class="form-holder">
                                    <input type="date" name="entry_date" class="form-control" id="inputUsername" placeholder="" value="{{old('entry_date')}}">
                                    @error('entry_date')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-col">
                            <label for="">
                                <i class="fas fa-asterisk text-danger"></i>
                                <span>Fecha de vencimiento</span>
                            </label>
                            <div class="form-holder">
                                <i class="zmdi zmdi-edit"></i>
                                <div class="form-holder">
                                    <input type="date" name="expiry_date" class="form-control" id="inputUsername" placeholder="" value="{{old('expiry_date')}}">
                                </div>
                                @error('expiry_date')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                        </div>
                    </div>

                </div>

            </section>

            <h4></h4>
            <section>
                <h3>Agregar imagen</h3>
                <div class="form-row">
                    <div class="form-col">
                        <img alt="Charles Hall" src="{{asset('img/medic2.jpg')}}" id="pictureArticle" class="rounded-circle img-responsive mt-2" width="128" height="128" />
                        <div class="mt-2">
                            <label for="fotoArticle">
                                <span class="btn btn-primary" aria-hidden="true">Subir Imagen</span>
                                <input type="file" name="fotoArticle" accept="image/*" id="fotoArticle" style="display:none">
                            </label>
                        </div>
                        <small>Suba la imagen del medicamento (Opcional)</small>
                    </div>
                </div>

            </section>
        </form>
    </div>
</main>



@endsection

@section('javascript')
    <script src="{{ asset('js/medicamentos/math_precios.js') }}"></script>
    <script src="{{ asset('js/medicamentos/img_create.js') }}"></script>
    <script src="{{asset('vendor/js/jquery.steps.js')}}"></script>
    <script src="{{asset('vendor/js/datepicker.js')}}"></script>
    <script src="{{asset('vendor/js/main.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("a[href='#finish']").on('click',function(){
                $('#wizard').submit();
            });

            $('#cost_price').on('keyup', function(){
                //BOX
                var calc = $(this).val()/$('#number_box').val()
                $('#cost_price_unit').val(calc.toFixed(1))
                $('#sale_price_box').val($(this).val())
                //UNIT
                var igv_calc= calc*18/100
                var igv_calc_total= calc+calc*18/100
                $('#sale_price_unit').val(igv_calc_total.toFixed(1))
            });

            $('#utility_box').on('keyup', function(){
                $('#utility_unit').val($(this).val())

                var percent = parseFloat($('#cost_price').val())*parseFloat($(this).val())/100
                var subtotal = parseFloat($('#cost_price').val()) + percent
               $('#sale_price_box').val(subtotal.toFixed(1))

               $('#sale_price_unit').val(($('#sale_price_box').val()/$('#number_box').val()).toFixed(1))
            });

            $('#fotoArticle').on('change', function(e){
                var file = e.target.files[0];
                var reader = new FileReader();
                reader.onload = (e) => {
                    $("#pictureArticle").attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            });

        });
    </script>
@endsection
