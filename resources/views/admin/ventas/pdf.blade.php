<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "preconnect" href = "https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <style>
        @font-face{
            font-family:'Roboto', sans-serif;
            src: url('fuentes/Roboto-Light.ttf');
            font-weight: normal;
            font-style: normal;
        }

        body{
            background-color:white;
            font-family: 'Roboto', sans-serif;
        }

        #container{
            margin: 150px auto;
            width: 600px;
        }

        table{
            width: 100%;
            background-color:white;
            border-collapse: collapse;
            text-align: left;
        }

        th, td{
            border: solid 1px black;
            padding: 6px;
        }

        thead{
            background-color:#57689F;
            border-bottom: solid 1px black;
            color: white;
        }

        tr:nth-child(even){
            background-color: #ddd;
        }
        tr:hover td{
            background-color:#57689F;
            color: white;
        }
        .columna{
            text-align: center;
        }
        .content-1{
            position: relative;
        }
        .parte-1-izquierda{
            float: left;
            position: absolute;
            top: 1%;
        }
        .parte-1-derecha{
            float: right;
            position: absolute;
            top: 1%;
        }
        .content-2{
            position: relative;
        }
        .parte-2-izquierda{
            clear: both;
            position: absolute;
            top: 4%;

        }
        .parte-2-derecha{
            float: right;
            position: absolute;
            top: 4%;

        }
        .content-3{
            clear: both;
        }
        .card{
            font-size:12px;
        }
        .titulo{
            font-size:18px;
        }
        .slogan{
            font-size:16px;
        }
    </style>
    <title>Imprimir Pdf</title>
</head>
<body>
    <main class="container">
        <div class="container-fluid p-0">

            <h1 class="titulo">Botica Excelentemente</h1>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body m-sm-3 m-md-5">
                            <div class="mb-4">
                                Hola <strong>{{$cliente->name}}</strong>,

                                <br /> Este es el recibo por el pago de <strong>S/.{{number_format($venta->total_sale, 2, ".", '')}}</strong> (PEN).
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="content-1">
                                        <div class="parte-1-izquierda"><p>Codigo No. <strong>B-00{{$venta->id}}</strong></p></div>


                                        <div class="parte-1-derecha"><p>Fecha: <strong>{{date('d/m/Y', strtotime($venta->date))}}</strong></p></div>


                                    </div>
                                </div>
                            </div>

                            <hr class="my-4" />

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="content-2">
                                        <div class="parte-2-izquierda"><p >Cliente: <strong>{{$cliente->name}}</strong></p></div>

                                        <div class="parte-2-derecha"><p><strong>Boleta de Venta</strong></p></div>

                                    </div>
                                    <div class="content-3"></div>
                                </div>

                            </div>

                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Descripción</th>
                                        <th>Nombre Comercial</th>
                                        <th>Cantidad</th>
                                        <th class="text-end">Costo</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($details as $detail)
                                            @if($detail->detailable->detailable_type == 'App\Models\Medicine')
                                            <tr>
                                                <td class="columna">{{$detail->detailable->tradename}}</td>
                                                <td class="columna">{{$detail->detailable->generic_name}}}</td>
                                                <td class="columna">{{$detail->quantity}}</td>
                                                <td class="columna">S/.{{number_format($detail->partial_sale, 2, ".", '')}}</td>
                                            </tr>
                                            @else
                                            <tr>
                                                <td class="columna">{{$detail->detailable->tradename}}</td>
                                                <td class="columna">{{$detail->detailable->trademark}}</td>
                                                <td class="columna">{{$detail->quantity}}</td>
                                                <td class="columna">S/{{number_format($detail->partial_sale, 2, ".", '')}}</td>
                                            </tr>
                                            @endif
                                    @endforeach
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>Subtotal </th>
                                        <th class="text-end">S/ {{number_format($venta->total_utility, 2, ".", '')}}</th>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>IGV(18%)</th>
                                        <th class="text-end">S/ {{number_format($venta->igv, 2, ".", '')}}</th>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>Descuento </th>
                                        <th class="text-end">0%</th>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <th>&nbsp;</th>
                                        <th>Total </th>
                                        <th class="text-end">S/ {{number_format($venta->total_sale, 2, ".", '')}}</th>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="slogan">Tu bienestar personal es lo mas importante</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
<script type="text/php">
    if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(270, 400, "Página $PAGE_NUM de $PAGE_COUNT", $font, 10);
        ');
    }
</script>
</html>
