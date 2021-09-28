@extends('layout.template')

@section('title', 'Agregar Medicamento')

@section('content')

<main class="content">
    <div class="wrapper">
        <form method="POST" action="{{route('medicamentos.store')}}" enctype="multipart/form-data" id="wizard">
            @csrf
            <!-- SECTION 1 -->
            <h4></h4>
            <section>
                @if (session()->has('message'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    El medicamento ya está registrado
                </div>
                @endif
                <h3>Datos generales De Medicamento</h3>
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Nombre genérico <span class="text-danger">*</span></label>
                        <div class="form-holder">
                            <div class="form-holder">
                                <i class="zmdi zmdi-edit"></i>
                                <input type="text" name="generic_name" class="form-control" id="inputUsername" autocomplete="off" placeholder="Nombre genérico" value="{{old('generic_name')}}">
                            </div>
                            @error('generic_name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Nombre Comercial</label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="tradename" class="form-control" id="inputUsername" autocomplete="off" placeholder="Nombre Comercial" value="{{old('tradename')}}">
                        </div>
                        @error('tradename')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Concentración</label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="concentration" class="form-control" id="inputUsername" autocomplete="off" placeholder="Concentración" value="{{old('concentration')}}">
                        </div>
                        @error('concentration')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Presentación</label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="presentation" class="form-control" id="inputUsername" autocomplete="off" placeholder="Presentación" value="{{old('presentation')}}">
                        </div>
                        @error('presentation')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Laboratorio</label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="laboratory" class="form-control" id="inputUsername" autocomplete="off" placeholder="Laboratorio" value="{{old('laboratory')}}">
                        </div>
                        @error('laboratory')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Numero por cajas</label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="number_box"  id="number_box" class="form-control" autocomplete="off" id="inputUsername" placeholder="Numero por cajas" value="{{old('number_box')}}">
                        </div>
                        @error('number_box')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Número por Blister</label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="number_blister"  id="number_blister" class="form-control" autocomplete="off" id="inputUsername" placeholder="Número por Blister" value="{{old('number_blister')}}">
                        </div>
                        @error('number_blister')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </section>

            <h4></h4>
            <section>
                <h3>Precios del Medicamento</h3>
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Precio de Costo por caja</label>
                        <div class="form-holder">
                            <i>S./</i>
                            <input type="text" name="cost_box" id="cost_box" class="form-control" id="inputUsername" placeholder="Costo por Caja">
                        </div>
                    </div>
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Porcentaje de Utilidad por caja</label>
                        <div class="form-holder">
                            <i>%</i>
                            <input type="text" id="utility_box" class="form-control" id="inputUsername" placeholder="Utilidad por caja">
                        </div>
                    </div>
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Precio de venta por caja</label>
                        <div class="form-holder">
                            <i>S./</i>
                            <input type="text" id="sale_price_box" class="form-control" id="inputUsername" placeholder="P. de venta por caja" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Precio de Costo por blister</label>
                        <div class="form-holder">
                            <i>S./</i>
                            <input type="text" id="cost_price_blister" class="form-control" id="inputUsername" placeholder="Costo por blister" readonly>
                        </div>
                    </div>
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Porcentaje de Utilidad por blister</label>
                        <div class="form-holder">
                            <i>%</i>
                            <input type="text" id="utility_blister" class="form-control" id="inputUsername" placeholder="Utilidad por blister" readonly>
                        </div>
                    </div>
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Precio de venta por blister</label>
                        <div class="form-holder">
                            <i>S./</i>
                            <input type="text" id="sale_price_blister" class="form-control" id="inputUsername" placeholder="P. de venta por blister" readonly>
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
            <section>
                <h3>Agregar imagen</h3>
                <div class="form-row">
                    <div class="form-col">
                        <img alt="Charles Hall" src="{{asset('img/medic2.jpg')}}" id="picture" class="rounded-circle img-responsive mt-2" width="128" height="128" />
                        <div class="mt-2">
                            <label for="foto">
                                <span class="btn btn-primary" aria-hidden="true">Subir Imagen</span>
                                <input type="file" name="foto" accept="image/*" id="foto" style="display:none">
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
    <script src="{{asset('js/medicamentos/math_precios.js')}}"></script>
    <script src="{{asset('vendor/js/jquery.steps.js')}}"></script>
    <script src="{{asset('vendor/js/datepicker.js')}}"></script>
    <script src="{{asset('vendor/js/main.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("a[href='#finish']").on('click',function(){
                $('#wizard').submit();
            });

            $('#cost_box').on('keyup', function(){

                //CAJA
                var pc_box = $(this).val()
                var igv_box = parseFloat($(this).val()*18/100)
                var igv_total = parseFloat(pc_box)+parseFloat(igv_box)
                $('#sale_price_box').val(igv_total.toFixed(1))

                //BLISTER
                var pc_blister = pc_box / $('#number_blister').val()
                $('#cost_price_blister').val(pc_blister.toFixed(1))

                var igv_blister = parseFloat(pc_blister * 18 / 100)
                var igv_total_blister = parseFloat(pc_blister) + parseFloat(igv_blister)
                $('#sale_price_blister').val(igv_total_blister.toFixed(1))

                //UNIDAD
                var pc_ud = pc_box/$('#number_box').val()
                $('#cost_price_unit').val(pc_ud.toFixed(1))
                var igv_ud = parseFloat(pc_ud*18/100)
                var total_ud = parseFloat(pc_ud)+igv_ud
                $('#sale_price_unit').val(total_ud.toFixed(1))

            });

            $('#utility_box').on('keyup', function(){

                //CAJA
                var pc_box = $('#cost_box').val()
                var percent = $(this).val() * pc_box / 100
                var subtotal = parseFloat(pc_box) + parseFloat(percent)
                var igv = subtotal * 18 /100
                var total = subtotal + igv
                $('#sale_price_box').val(total.toFixed(1))

                $('#utility_blister').val(percent)
                $('#utility_unit').val(percent)

                $('#sale_price_blister').val((total/$('#number_blister').val()).toFixed(1))
                $('#sale_price_unit').val((total/$('#number_box').val()).toFixed(1))
            });

            $('#foto').on('change', function(e){
                var file = e.target.files[0];
                var reader = new FileReader();
                reader.onload = (e) => {
                    $("#picture").attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            });
        });

    </script>

@endsection
