@extends('layout.template')

@section('title', 'Agregar Artículo')

@section('content')
<main class="content">
    <div class="wrapper">
        <form method="POST" action="{{route('articles.store')}}" enctype="multipart/form-data" id="wizard">
            @csrf
            <!-- SECTION 1 -->
            <h4></h4>
            <section>
                <h3>Agregar Artículo</h3>
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Nombre Comercial</label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="tradename" class="form-control" id="inputUsername" placeholder="Nombre Comercial">
                        </div>
                    </div>
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Nombre de Marca</label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="trademark" class="form-control" id="inputUsername" placeholder="Nombre de Marca">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Proveedor</label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="supplier" class="form-control" id="inputUsername" placeholder="Proveedor">
                        </div>
                    </div>
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Presentación</label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="concent" class="form-control" id="inputUsername" placeholder="Presentación">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label class="form-label" for="inputUsername">Cantidad por caja</label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="number_box" class="form-control" id="inputUsername" placeholder="Cantidad por caja">
                        </div>
                    </div>
                    <div class="form-col">

                    </div>
                </div>
            </section>

            <h4></h4>
            <section>
                <h3>Precios</h3>
                <div class="form-row">
                    <div class="form-col">
                        <label for="">Precio de Costo</label>
                        <div class="form-holder">
                            <i>S./</i>
                            <div class="form-holder">
                                <input type="number" step="any" name="p_costo" class="form-control" id="p_caja" placeholder="Precio de costo">
                            </div>
                        </div>
                        <div class="form-holder input-group">


                            @error('utilidad')
                                <p class="alert alert-danger">El porcentaje de utilidad es obligatorio</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="">Utilidad</label>
                        <div class="form-holder">
                            <i>%</i>
                            <div class="form-holder">
                                <input type="number" step="any" name="p_costo" class="form-control" id="p_caja" placeholder="Utilidad">
                            </div>
                        </div>
                        <div class="form-holder input-group">


                            @error('utilidad')
                                <p class="alert alert-danger">El porcentaje de utilidad es obligatorio</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label for="">Precio de venta</label>
                        <div class="form-holder">
                            <i>S./</i>
                            <div class="form-holder">
                                <input type="number" step="any" name="p_caja" class="form-control" id="p_caja" placeholder="Precio de venta">
                            </div>
                        </div>
                        <div class="form-holder input-group">


                            @error('utilidad')
                                <p class="alert alert-danger">El porcentaje de utilidad es obligatorio</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="">Tipo</label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <div class="form-holder">
                                <select class="form-control" name="" id="">
                                    <option value="">Caja</option>
                                    <option value="">Blister</option>
                                    <option value="">Unidad</option>
                                </select>
                            </div>
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
                            Cantidad
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account-o"></i>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="">
                            Anaquel
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account-o"></i>
                            <input type="text" name="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label for="">
                            Código de lote
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="" class="form-control" placeholder="Ingrese el código de lote" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="">
                            Fecha de ingreso
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <div class="form-holder">
                                <input type="date" name="f_ingreso" class="form-control" id="inputUsername" placeholder="">
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
                                <input type="date" name="f_vencimiento" class="form-control" id="inputUsername" placeholder="">
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

{{-- <main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Agregar Medicamento o Artículo</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ingrese los datos del medicamento o artículo</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{route('medicamentos.store')}}" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Tipo <span class="text-danger">*</span></label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="0">Medicamento</option>
                                            <option value="1">Artículo</option>
                                        </select>

                                        @error('n_generico')
                                            <p class="alert alert-danger">El nombre genérico es obligatorio</p>


                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Nombre Genérico<span class="text-danger">*</span></label>
                                        <input type="text" name="n_generico" class="form-control" id="inputUsername" placeholder="Nombre Genérico">

                                        @error('n_generico')
                                            <p class="alert alert-danger">El nombre genérico es obligatorio</p>


                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Nombre Comercial</label>
                                        <input type="text" name="n_comercial" class="form-control" id="inputUsername" placeholder="Nombre Comercial">
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Presentación</label>
                                        <input type="text" name="present" class="form-control" id="inputUsername" placeholder="Presentación">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Concentración</label>
                                        <input type="text" name="concent" class="form-control" id="inputUsername" placeholder="Concentración">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Número por Caja<span class="text-danger">*</span></label>

                                        <input type="number" name="nro_caja" class="form-control" id="nro_caja" placeholder="Número por caja">
                                        @error('nro_caja')
                                            <p class="alert alert-danger">El número por caja es obligatorio</p>

                                        @enderror

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Laboratorio</label>
                                        <input type="text" name="lab" class="form-control" id="inputUsername" placeholder="Laboratorio">

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Anaquel<span class="text-danger">*</span></label>
                                        <input type="text" name="anaquel" class="form-control" id="inputUsername" placeholder="Anaquel">
                                        @error('anaquel')
                                            <p class="alert alert-danger">El campo anaquel es obligatorio</p>
                                        @enderror
                                    </div>

                                </div>



                                <div class="col-md-4">
                                    <div class="text-center">
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

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="p_caja">Precio de Costo por Caja<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">S./</span>
                                              </div>

                                            <input type="number" step="any" name="p_caja" class="form-control" id="p_caja" placeholder="Precio unitario">
                                            @error('p_caja')
                                            <p class="alert alert-danger">El precio de caja unitario es obligatorio</p>
                                            @enderror

                                        </div>
                                      </div>

                                      <div class="col-sm-3 mb-3">
                                        <label class="form-label" for="utilidad_caja">Porcentaje de Utilidad por Caja<span class="text-danger">*</span></label>
                                        <div class="input-group">

                                            <input type="number" step="any" name="utilidad_caja" class="form-control" id="utilidad_caja" placeholder="Utilidad por caja">

                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">%</span>
                                            </div>

                                            @error('utilidad')
                                                <p class="alert alert-danger">El porcentaje de utilidad es obligatorio</p>


                                            @enderror
                                        </div>
                                      </div>

                                      <div class="col-md-3 mb-3">
                                        <label class="form-label" for="p_venta_caja">Precio de Venta por Caja<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">S./</span>
                                            </div>

                                              <input type="number" step="any" name="p_venta_caja" class="form-control" id="p_venta_caja" placeholder="Precio de Venta" readonly>
                                              @error('p_venta_caja')
                                                <p class="alert alert-danger">El precio de venta de la caja es obligatorio</p>


                                              @enderror
                                        </div>
                                      </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="p_costo">Precio de Costo Unitario<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">S./</span>
                                              </div>

                                              <input type="number" step="any" name="p_costo" class="form-control" id="p_costo" placeholder="Precio por caja">
                                              @error('p_costo')
                                              <p class="alert alert-danger">El precio de costo es obligatorio</p>
                                              @enderror


                                        </div>
                                      </div>

                                    <div class="col-sm-3 mb-3">
                                        <label class="form-label" for="utilidad">Porcentaje de Utilidad<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="number" step="any" name="utilidad" class="form-control" id="utilidad" placeholder="Utilidad">

                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">%</span>
                                            </div>

                                            @error('utilidad')
                                                <p class="alert alert-danger">El porcentaje de utilidad es obligatorio</p>

                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label class="form-label" for="p_unitario">Precio de Venta Unitario<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1">S./</span>
                                            </div>

                                              <input type="number" step="any" name="p_unitario" class="form-control" id="p_unitario" placeholder="Precio de Venta caja" readonly>


                                        </div>
                                        @error('p_unitario')
                                                <p class="alert alert-danger">El precio unitario</p>


                                              @enderror
                                    </div>


                                </div>

                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="inputUsername">Cantidad de cajas <span class="text-danger">*</span></label>
                                    <input type="number" name="cajas" id="cajas" class="form-control" placeholder="Cantidad de cajas">

                                    @error('cajas')
                                            <p class="alert alert-danger">La cantidad por cajas es obligatorio</p>


                                    @enderror
                                </div>

                                <div class="mb-3">

                                    <label class="form-label" for="inputUsername">Cantidad en unidades</label>
                                    <input type="number" name="cantidad" class="form-control" id="cantidad" placeholder="Cantidad en unidades">

                                    @error('cantidad')
                                            <p class="alert alert-danger">La cantidad de unidades es obligatorio</p>

                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label class="form-label" for="inputUsername">Costo del Stock</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="basic-addon1">S./</span>
                                        <input type="number" step="any" name="costo" class="form-control" placeholder="Costo del stock">

                                        @error('costo')
                                            <p class="alert alert-danger">El costo del Stock es obligatorio</p>


                                         @enderror
                                    </div>
                                </div>

                                <div class="mb-3">

                                    <label class="form-label" for="inputUsername">Lote <span class="text-danger">*</span></label>
                                    <input type="text" name="lote" class="form-control" id="inputUsername" placeholder="Nro de Lote">

                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="inputUsername">Fecha De Ingreso <span class="text-danger">*</span></label>
                                    <input type="date" name="f_ingreso" class="form-control" id="inputUsername" placeholder="">

                                    @error('f_ingreso')
                                            <p class="alert alert-danger">La fecha de ingreso es obligatorio</p>


                                    @enderror

                                <div class="mb-3">
                                    <label class="form-label" for="inputUsername">Fecha De Vencimiento</label>
                                    <input type="date" name="f_vencimiento" class="form-control" id="inputUsername" placeholder="">
                                </div>
                            </div>

                            <br>
                            <a class="btn btn-info" href="{{route('medicamentos.index')}}">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Agregar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</main> --}}


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
        });
    </script>
@endsection
