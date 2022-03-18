@extends('layout.template')

@section('title', 'Agregar Medicamento')

@section('content')

<main class="content">
    <div class="wrapper">
        <form method="POST" action="{{route('medicamentos.store')}}" enctype="multipart/form-data" id="wizard" style="height: auto;">
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
                        <label class="form-label"> 
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Nombre genérico</span>
                        </label>
                        <div class="form-holder">
                            <div class="form-holder">
                                <i class="zmdi zmdi-edit"></i>
                                <input type="text" name="generic_name" class="form-control" autocomplete="off" placeholder="Nombre genérico" value="{{old('generic_name')}}">
                            </div>
                            @error('generic_name')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-col">
                        <label class="form-label">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Nombre Comercial</span>
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="tradename" class="form-control" autocomplete="off" placeholder="Nombre Comercial" value="{{old('tradename')}}">
                        </div>
                        @error('tradename')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Concentración</span>
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="concentration" class="form-control" autocomplete="off" placeholder="Concentración" value="{{old('concentration')}}">
                        </div>
                        @error('concentration')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-col">
                        <label class="form-label">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Presentación</span>
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="presentation" class="form-control" autocomplete="off" placeholder="Presentación" value="{{old('presentation')}}">
                        </div>
                        @error('presentation')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Laboratorio</span>
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="laboratory" class="form-control" autocomplete="off" placeholder="Laboratorio" value="{{old('laboratory')}}">
                        </div>
                        @error('laboratory')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-col">
                        <label class="form-label">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Número de unidades por caja</span>
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="number_box"  id="number_box" class="form-control" autocomplete="off" placeholder="Numero de unidades por caja" value="{{old('number_box')}}">
                        </div>
                        @error('number_box')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-col">
                        <label class="form-label">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Número de Blisters por caja</span>
                        </label>

                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="number_blister"  id="number_blister" class="form-control" autocomplete="off" placeholder="Número de Blisters por caja" value="{{old('number_blister')}}">
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
                        <label class="form-label">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Precio de Costo por caja</span>
                        </label>
                        <div class="form-holder">
                            <i>S./</i>
                            <input type="text" name="cost_box" id="cost_box" class="form-control" placeholder="Costo por Caja" value="{{old('cost_box')}}">
                        </div>
                            @error('cost_box')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                    </div>
                    <div class="form-col">
                        <label class="form-label">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Porcentaje de Utilidad por caja</span>
                        </label>
                        <div class="form-holder">
                            <i>%</i>
                            <input type="text" name="utility" id="utility_box" class="form-control" placeholder="Utilidad por caja" value="{{old('utility')}}">
                        </div>
                        @error('utility')
                                <p class="text-danger">{{$message}}</p>
                            @enderror
                    </div>
                    <div class="form-col">
                        <label class="form-label">Precio de venta por caja</label>
                        <div class="form-holder">
                            <i>S./</i>
                            <input type="text" id="sale_price_box" class="form-control" placeholder="P. de venta por caja" readonly>

                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label">Precio de Costo por blister</label>
                        <div class="form-holder">
                            <i>S./</i>
                            <input type="text" id="cost_price_blister" class="form-control" placeholder="Costo por blister" readonly>
                        </div>
                    </div>
                    <div class="form-col">
                        <label class="form-label">Porcentaje de Utilidad por blister</label>
                        <div class="form-holder">
                            <i>%</i>
                            <input type="text" id="utility_blister" class="form-control" placeholder="Utilidad por blister" readonly>

                        </div>
                    </div>

                    <div class="form-col">
                        <label class="form-label">Precio de venta por blister</label>
                        <div class="form-holder">
                            <i>S./</i>
                            <input type="text" id="sale_price_blister" class="form-control" placeholder="P. de venta por blister" readonly>

                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label">Precio de Costo por unidad</label>
                        <div class="form-holder">
                            <i>S./</i>
                            <input type="text" name="cost_price" id="cost_price_unit" class="form-control" placeholder="Costo por unidad" readonly>
                        </div>
                    </div>
                    <div class="form-col">
                        <label class="form-label">Porcentaje de Utilidad por unidad</label>
                        <div class="form-holder">
                            <i>%</i>
                            <input type="text" id="utility_unit" class="form-control" placeholder="Utilidad por unidad" readonly>
                        </div>
                    </div>

                    <div class="form-col">
                        <label class="form-label">Precio de venta por unidad</label>
                        <div class="form-holder">
                            <i>S./</i>
                            <input type="text" name="sale_price" id="sale_price_unit" class="form-control" placeholder="P. de venta por unidad" readonly>
                        </div>
                    </div>
                </div>
            </section>

            <h4></h4>
            <section>
                <h3>stock / lote</h3>
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
                            <input type="text" name="cost_stock" class="form-control"  value="{{old('cost_stock')}}">
                        </div>
                        @error('cost_stock')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-col">
                        <label for="">
                            <i class="fas fa-asterisk text-danger"></i>
                            <span>Cantidad de Cajas</span>
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account-o"></i>
                            <input type="number" name="quantity_box" class="form-control"  value="{{old('quantity_box')}}">
                        </div>
                        @error('quantity_box')
                        <p class="text-danger">{{$message}}</p>
                    @enderror
                    </div>
                    <div class="form-col">
                        <label for=""><span>N° de Lotes</span></label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account-o"></i>
                            <select class="form-control" name="" id="inputDynamic">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div id="boxDynamic">
                    <div class="p-4 border border-secondary">
                        <div class="form-row">
                            <div class="form-col">
                                <label for="">
                                    <i class="fas fa-asterisk text-danger"></i>
                                    <span>Código de lote</span>
                                </label>
                                <div class="form-holder">
                                    <i class="zmdi zmdi-edit"></i>
                                    <input type="text" name="batch[0][code]" class="form-control" placeholder="Ingrese el código de lote" required autocomplete="off">
                                </div>
                            </div>

                            <div class="form-col">
                                <label for="">
                                    <i class="fas fa-asterisk text-danger"></i>
                                    <span>Cantidad de unidades</span>
                                </label>
                                <div class="form-holder">
                                    <i class="zmdi zmdi-edit"></i>
                                    <input type="number" name="batch[0][quantity_unit]" class="form-control" placeholder="Ingrese la cantidad de medicamentos" required autocomplete="off">
                                </div>
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
                                        <input type="date" name="batch[0][entry_date]" class="form-control" placeholder="">
                                        @error('f_ingreso')
                                            <p class="alert alert-danger">La fecha de ingreso es obligatorio</p>
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
                                        <input type="date" name="batch[0][expiry_date]" class="form-control" placeholder="">
                                    </div>
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

<template id="template-input">
    <div class="p-4 border border-secondary mt-3">
        <div class="form-row">
            <div class="form-col">
                <label for="">
                    <i class="fas fa-asterisk text-danger"></i>
                    <span>Código de lote</span>
                </label>
                <div class="form-holder">
                    <i class="zmdi zmdi-edit"></i>
                    <input type="text" name="" class="form-control code" placeholder="Ingrese el código de lote" required autocomplete="off">
                </div>
            </div>

            <div class="form-col">
                <label for="">
                    <i class="fas fa-asterisk text-danger"></i>
                    <span>Cantidad de unidades</span>
                </label>
                <div class="form-holder">
                    <i class="zmdi zmdi-edit"></i>
                    <input type="number" name="" class="form-control quantity_unit" placeholder="Ingrese el código de lote" required autocomplete="off">
                </div>
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
                        <input type="date" name="" class="form-control entry_date" placeholder="" required>
                        @error('f_ingreso')
                            <p class="alert alert-danger">La fecha de ingreso es obligatorio</p>
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
                        <input type="date" name="" class="form-control expiry_date" placeholder="" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>



@endsection

@section('javascript')
    {{-- <script src="{{asset('js/medicamentos/math_precios.js')}}"></script> --}}
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
                var pc_box = parseFloat($(this).val())
                $('#sale_price_box').val(pc_box.toFixed(1))

                //UNIDAD
                var pc_ud = pc_box/$('#number_box').val()
                $('#cost_price_unit').val(pc_ud.toFixed(2))
                $('#sale_price_unit').val(pc_ud.toFixed(1))

                //BLISTER
                var pc_blister = pc_ud * $('#number_blister').val()
                $('#cost_price_blister').val(pc_blister.toFixed(2))
                $('#sale_price_blister').val(pc_blister.toFixed(1))

            });

            $('#utility_box').on('keyup', function(){

                //CAJA
                var pc_box = $('#cost_box').val();
                var percent = $(this).val();
                var total = parseFloat(pc_box) + parseFloat(pc_box*percent/100);
                $('#sale_price_box').val(total.toFixed(1));

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

            const $template = document.getElementById("template-input").content;
            const $fragment = document.createDocumentFragment();
            $('#inputDynamic').on('change', function (e) {
                d.getElementById("boxDynamic").textContent = "";
                for (let i = 0; i < $(this).val(); i++) {
                    $template.querySelector(".code").name = `batch[${i}][code]`;
                    $template.querySelector(".quantity_unit").name = `batch[${i}][quantity_unit]`;
                    $template.querySelector(".entry_date").name = `batch[${i}][entry_date]`;
                    $template.querySelector(".expiry_date").name = `batch[${i}][expiry_date]`;

                    let $clone = d.importNode($template, true);
                    $fragment.appendChild($clone);
                }
                $('#boxDynamic').append($fragment)
            })
        });
    </script>
@endsection
