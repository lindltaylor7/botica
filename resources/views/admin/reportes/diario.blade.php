@extends('layout.template')

@section('title', 'Reporte diario')

@section('content')
<main class="content">
    <template id="template-table">
        <table id="tableData" class="table table-hover my-0">
            <thead>
                <tr id="rowHead"></tr>
            </thead>
            <tbody id="table-body">
                {{-- <tr id="rowBody"></tr> --}}
            </tbody>
        </table>
    </template>

    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <h1>Reporte Diario {{date('d/m/Y')}}</h1>
                        <table class="table table-hover">
                            <tbody>
                                @foreach ($sales as $sale)
                                <tr>
                                    <th rowspan="{{$sale->details->count()}}">
                                        {{$sale->customer->name}}
                                    </th>
                                        @foreach ($sale->details as $detail)                                                  
                                                    <td>
                                                        {{$detail->quantity}}
                                                      </td>
                                                      <td>
                                                        {{$detail->detailable->generic_name}} {{$detail->detailable->tradename}} {{$detail->detailable->concentration}}   
                                                      </td>
                                                      <td>
                                                        S./ {{$detail->detailable->price->sale_price}}   
                                                      </td>
                                                      <td>
                                                        {{$detail->amount}}   
                                                      </td>
                                                    </tr> 
                                        @endforeach  
                                    {{-- <td rowspan="{{$sale->details->count()}}">
                                        @foreach ($sale->details as $detail)
                                        
                                        @endforeach  
                                    </td> --}}
                                    {{-- <td rowspan="{{$sale->details->count()}}">
                                        @foreach ($sale->details as $detail)
                                        <p>{{$detail}}</p>
                                        @endforeach  
                                    </td> --}}
                                
                                @endforeach  
                                
                            </tbody>
                        </table>
                        <h2>TOTAL: S./ {{$total}}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection
@section('javascript')
    <script src="{{ asset('js/reportes/eco.js') }}"></script>
    {{-- <script src="{{ asset('js/reportes/year.js') }}"></script> --}}
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
@endsection