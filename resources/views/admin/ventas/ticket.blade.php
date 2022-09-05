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
            border: 0;
        }

        .columna{
            text-align: center;
            text-transform: capitalize;
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
            font-size:9px;
        }
        .titulo{
            text-align: center;
            font-size:13px;
            margin-top: -10px;
        }
        .slogan{
            font-size:8px;
            text-align: center;
        }
        h3{
            font-size: 10px;
            margin-top: -10px;
            text-align: center;
        }
        #fecha{
            margin-top: -10px;
        }
    </style>
    <title>Imprimir Ticket</title>
</head>
<body>
    <main class="container">
        <div class="container-fluid p-0">

            <h1 class="titulo">Botica Excelentemente & Salud</h1>
            <h3>RUC: 10440341654</h3>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body m-sm-3 m-md-5">
                            <div class="mb-4">
                                <p id="fecha">Fecha: {{date_format(date_create($venta->date),'d/m/Y')}}</p>
                                Hola <strong>{{$cliente->name}}</strong>,
                                <br/>
                                El Pago total es de: <strong>S/.{{number_format($venta->total_sale, 1, ".", '')}}0</strong> (PEN).
                            </div>



                            <hr class="my-1" />

                            <div class="row mb-4">

                                    <table class="tabla">
                                        <thead>
                                            <tr>
                                                <th>Cantidad</th>
                                                <th>Nombre Producto</th>
                                                <th>Precio</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach($details as $detail)
                                            <tr>
                                                <td>{{$detail->quantity}}</td>
                                                @if($detail->detailable_type == 'App\Models\Medicine')
                                                <td class="columna">{{strtolower($detail->detailable->tradename)}} {{$detail->detailable->concentration}}</td>
                                                    @else
                                                <td class="columna">{{strtolower($detail->detailable->tradename)}}</td>
                                                @endif
                                                <td class="columna"> {{$detail->amount}}</td>
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td class="columna"><strong> Total</strong> {{number_format($venta->total_sale, 1, ".", '')}}0</td>
                                            </tr>
                                        </tbody>

                                    </table>

                            </div>


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
