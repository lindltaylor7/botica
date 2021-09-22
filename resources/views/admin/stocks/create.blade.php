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
                            Medicamento
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account-o"></i>
                            <select class="js-example-basic-single form-control" name="state">
                                <option selected disabled>Search</option>
                                @foreach ($medicamentos as $medicamento)
                                    <option value="" id="{{$medicamento->img}}" class="medicamentoImg">{{$medicamento->n_generico}} - {{$medicamento->concent}} - {{$medicamento->n_comercial}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="">
                            Código de lote
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="" class="form-control" placeholder="Ingrese el código de lote" required autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label for="">
                            Anaquel
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" name="" class="form-control" placeholder="Ingrese el código de lote" required autocomplete="off">
                        </div>
                    </div>

                    <div class="form-col">
                        <label for="">
                            Cajas
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-email"></i>
                            <input type="number" name="" class="val form-control" id="value1" placeholder="Cantidad de cajas" required autocomplete="off">
                        </div>
                    </div>
                </div>

                <div class="form-row">   
                    <div class="form-col">
                        <label for="">
                            Cantidad de u/c
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-smartphone-android"></i>
                            <input type="number" name="" class="val form-control" id="value2" placeholder="Ingrese la cantidad de cajas" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="">
                            Cantidad
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-spellcheck"></i>
                            <input type="number" name="cant" class="form-control" id="valueFinal" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label for="">
                            Fecha de ingreso
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-calendar"></i>
                            <input type="date" class="form-control">
                            {{-- <input type="text" class="form-control datepicker-here" data-language='en' data-date-format="dd - mm - yyyy" id="dp1"> --}}
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="">
                            Fecha de vencimiento
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-calendar"></i>
                            <input type="date" class="form-control">
                            {{-- <input type="text" class="form-control datepicker-here" data-language='en' data-date-format="dd - mm - yyyy" id="dp1"> --}}
                        </div>
                    </div>
                </div>
            </section>
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
    </script>
    <script src="{{asset('js/stocks/calc.js')}}"></script>

@endsection
