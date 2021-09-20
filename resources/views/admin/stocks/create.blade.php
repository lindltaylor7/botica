@extends('layout.template')

@section('title', 'Agregar Stock')

@section('content')
{{-- <main class="content">
    <div class="container-fluid p-0">

        <h1 class="h3 mb-3">Agregar Stock</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Ingrese los datos del Stock</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('stock.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">

                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Medicamento</label>
                                        <input type="text" class="form-control" id="search" autocomplete="off" placeholder="Buscar medicamento">
                                        <table class="table table-hover table-sm">
                                            <tbody class="border border-primary" id="medicamentos_select">
                                            </tbody>
                                        </table>
                                        <input type="hidden" name="medicamento_id" id="medicamento_id">

                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Cantidad por caja</label>
                                        <input type="number" class="form-control" id="cant_caja" placeholder="Cantidad por caja" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Cantidad de cajas</label>
                                        <input type="number" id="cajas" class="form-control" placeholder="Cantidad de cajas">
                                    </div>
                                    <div class="mb-3">

                                        <label class="form-label" for="inputUsername">Cantidad en unidades</label>
                                        <input type="number" name="cantidad" class="form-control" id="cantidad" placeholder="Cantidad en unidades">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Costo del Stock</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">S./</span>
                                            <input type="number" step="any" name="costo" class="form-control" placeholder="Costo del stock">

                                        </div>
                                    </div>

                                    <div class="mb-3">

                                        <label class="form-label" for="inputUsername">Lote</label>
                                        <input type="text" name="lote" class="form-control" id="inputUsername" placeholder="Nro de Lote">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Fecha De Ingreso</label>
                                        <input type="date" name="f_ingreso" class="form-control" id="inputUsername" placeholder="">
                                    </>
                                    <div class="mb-3">
                                        <label class="form-label" for="inputUsername">Fecha De Vencimiento</label>
                                        <input type="date" name="f_vencimiento" class="form-control" id="inputUsername" placeholder="">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Agregar</button>
                            </div>


                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</main> --}}

<main class="content">
    <div class="wrapper">
        <form action="" id="wizard">
            <!-- SECTION 1 -->
            <h4></h4>
            <section>
                <h3>User profile</h3>
                <div class="form-row">
                    <div class="form-col">
                        <label for="">
                            Full Name
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account-o"></i>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="">
                            Education Level
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-edit"></i>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label for="">
                            Email ID
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-email"></i>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="">
                            Phone Number
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-smartphone-android"></i>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label for="">
                            Specialization
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-spellcheck"></i>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="">
                            Date of Birth
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-calendar"></i>
                            <input type="text" class="form-control datepicker-here" data-language='en' data-date-format="dd - mm - yyyy" id="dp1">
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- SECTION 2 -->
            <h4></h4>
            <section>
                <h3>Residential address</h3>
                <div class="form-row">
                    <div class="form-col">
                        <label for="">
                            Country
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-account-o"></i>
                            <select name="" id="" class="form-control">
                                <option value="united states" class="option">United States</option>
                                <option value="united kingdom" class="option">United Kingdom</option>
                                <option value="viet nam" class="option">Viet Nam</option>
                            </select>
                            <i class="zmdi zmdi-chevron-down"></i>
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="">
                            Street Address
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-pin"></i>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label for="">
                            Apartment
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-home"></i>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="">
                            Town / City
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-pin-drop"></i>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-col">
                        <label for="">
                            County
                        </label>
                        <div class="form-holder">
                            <i class="zmdi zmdi-pin"></i>
                            <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-col">
                        <label for="">
                            Postcode / Zip
                        </label>
                        <div class="form-holder password">
                            <i class="zmdi zmdi-eye"></i>
                            <input type="password" class="form-control">
                        </div>
                    </div>
                </div>
            </section>
    
            <!-- SECTION 3 -->
            <h4></h4>
            <section>
                <h3 style="margin-bottom: 37px;">What are you doing?</h3>
                <div class="grid">
                    {{-- <div class="grid-item active">
                        <div class="thumb">
                            <img src="images/programming.jpg" alt="">
                        </div>
                        <div class="heading">
                            Programming
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="thumb">
                            <img src="images/sports.jpg" alt="">
                        </div>
                        <div class="heading">
                            Sports
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="thumb">
                            <img src="images/business.jpg" alt="">
                        </div>
                        <div class="heading">
                            Business
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="thumb">
                            <img src="images/tour-guide.jpg" alt="">
                        </div>
                        <div class="heading">
                            Tour Guide
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="thumb">
                            <img src="images/art-design.jpg" alt="">
                        </div>
                        <div class="heading">
                            Art-Design
                        </div>
                    </div>
                    <div class="grid-item">
                        <div class="thumb">
                            <img src="images/doctor.jpg" alt="">
                        </div>
                        <div class="heading">
                            Doctor
                        </div>
                    </div> --}}
                </div>
            </section>
        </form>
    </div>
</main>
@endsection

@section('javascript')
    <script src="{{asset('js/stocks/selectpicker.js')}}"></script>


    <script src="{{asset('vendor/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('vendor/js/jquery.steps.js')}}"></script>
    <script src="{{asset('vendor/js/datepicker.js')}}"></script>
    <script src="{{asset('vendor/js/datepicker.en.js')}}"></script>
    <script src="{{asset('vendor/js/main.js')}}"></script>
@endsection
