<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/index.css')}}" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <title>Farmacia</title>
    <style>
        html {
            scroll-behavior: smooth;
        }
        .links{
            color:black;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div id="container-1">
        <header>
            <img class="imagen-header" src="{{asset('img/imagen.png')}}" />
            <p class="texto-header">example@gmail.com</p>
            <img class="imagen-header" src="{{asset('img/imagen_2.png')}}" />
            <p class="texto-header">123 76834 656</p>
            <img class="imagen-header" src="{{asset('img/imagen_3.png')}}" />
            <p class="texto-header">9AM to 6PM (Sun - Fri) Sat Off</p>
            <img class="imagen-header_2" src="{{asset('img/imagen_4.png')}}" />
        </header>

        <nav class="nav-1">
            <div class="logo-nav-1">
                <img class="imagen-nav" src="{{asset('img/imagen-exce-1.png')}}" width="300" height="50" />
                <p>Botica</p>
            </div>
            <div class="nav-links">
                <p class="texto-nav-1"><a class="links" href="#">Inicio</a></p>
                <p class="texto-nav-3"><a class="links" href="#ofertas">Ofertas</a></p>
                <p class="texto-nav-2"><a class="links" href="#top-ventas">Más Vendidos</a></p>
                <p class="texto-nav-4"><a class="links" href="#footer">Contacto</a></p>
                <a class="links" href="{{route('login')}}">
                    <p class="texto-nav-4">Admin</p>
                </a>
            </div>

        </nav>

        <nav class="nav-2">
            <div class="frases-nav-2">
                <p class="texto-big"><b>Online Pharmacy For <br> Qulity Medicines <br> and Medical test Kits</b></p>
                <p class="texto-big-2"><b>Up To 25% Off</b></p>
                <button class="boton-nav-2" type="button">Ver más</button>
            </div>
            <div class="frases-nav-2-1">
            </div>
        </nav>

        <div id="footer-1">
            <p class="texto-footer">
                Ordene sus medicinas al mejor precio
            </p>
            <div class="">
                <button id="boton-footer" class="botfoot-2">
                    986 576 321
                </button>
                <button id="boton-footer" class="botfoot-1">
                    Celular:
                </button>
            </div>

        </div>

        <h1 class="title" id="ofertas">Ofertas</h1>
        <p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor pelican
            incididunt ut labore et dolore magna aliqua.</p>

        <div class="row-1">

            <div class="medicine">
                <img src="{{asset('img/medic1.jpg')}}" class="img-medicine" alt="">
                <p class="title-medicine">Diabetic Pill</p>
                <div class="row-card">
                    <div class="col-1">
                        <p class="offer">50% Off</p>
                    </div>
                    <div class="col-1">
                        <del>$50.00</del>
                        <p class="new-price">$25.00</p>
                    </div>
                </div>
                <hr>
                <button class="btn-buy">Reserva Ahora</button>
            </div>

            <div class="medicine">
                <img src="{{asset('img/medic2.jpg')}}" class="img-medicine" alt="">
                <p class="title-medicine">Waitloss Pill</p>
                <div class="row-card">
                    <div class="col-1">
                        <p class="offer">50% Off</p>
                    </div>
                    <div class="col-1">
                        <del>$50.00</del>
                        <p class="new-price">$25.00</p>
                    </div>
                </div>
                <hr>
                <button class="btn-buy">Reserva Ahora</button>
            </div>

            <div class="medicine">
                <img src="{{asset('img/medic3.jpg')}}" class="img-medicine" alt="">
                <p class="title-medicine">Vitamin Tablet</p>
                <div class="row-card">
                    <div class="col-1">
                        <p class="offer">50% Off</p>
                    </div>
                    <div class="col-1">
                        <del>$50.00</del>
                        <p class="new-price">$25.00</p>
                    </div>
                </div>
                <hr>
                <button class="btn-buy">Reserva Ahora</button>
            </div>


        </div>

        <h1 class="title" id="top-ventas">Medicamentos mas vendidos</h1>
        <p class="subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor pelican
            incididunt ut labore et dolore magna aliqua.</p>

        <div class="row-2">

            <div class="card">
                <img src="{{asset('img/medic1.jpg')}}">
                <h4 class="title-medicine">Medicina 1</h4>

                <div class="row-card">
                    <div class="col-1">
                        <p class="offer"><del>5000.00 $</del></p>
                    </div>
                    <div class="col-1">
                        <p class="new-price">2500.00 $</p>
                    </div>
                </div>

                <button class="btn-buy">Compra Ahora</button>
            </div>

            <div class="card">
                <img src="{{asset('img/medic2.jpg')}}">
                <h4 class="title-medicine">Medicina 2</h4>

                <div class="row-card">
                    <div class="col-1">
                        <p class="offer"><del>5000.00 $</del></p>
                    </div>
                    <div class="col-1">

                        <p class="new-price">2500.00 $</p>
                    </div>
                </div>

                <button class="btn-buy">Compra Ahora</button>
            </div>

            <div class="card">
                <img src="{{asset('img/medic3.jpg')}}">
                <h4 class="title-medicine">Medicina 3</h4>
                <div class="row-card">
                    <div class="col-1">
                        <p class="offer"><del>5000.00 $</del></p>
                    </div>
                    <div class="col-1">
                        <p class="new-price">2500.00 $</p>
                    </div>
                </div>
                <button class="btn-buy">Compra Ahora</button>
            </div>

        </div>
        <footer id="footer">
            <div class="footer-2">
                <div class="div" class="div-1">
                    <img src="{{asset('img/imagen-exce-1.png')}}" class="logo-footer">
                    <p>Lorem ipsum dolor sit amet, consectetur<br> adipiscing elit, sed do eiusmod<br> tempor pelican
                        incididunt ut labore<br> et dolore magna aliqua.</p>
                </div>

                <div class="div" class="div-2">
                    <h3><b>Enlaces Importantes</b></h3>
                    <ul>
                        <li>Política de privacidad</li>
                        <li>Sobre nosotros</li>
                        <li>Nuestros servicios</li>
                        <li>Contáctenos</li>
                    </ul>
                </div>

                <div class="div" class="div-3">
                    <h3><b>Enlaces Útiles</b></h3>
                    <ul>
                        <li>Mi Cuenta</li>
                        <li>Crear Nueva Cuenta</li>
                        <li>Proceso</li>
                        <li>Salud</li>
                    </ul>
                </div>

                <div class="div" class="div-4">
                    <h3><b>Mantente en Contacto</b></h3>
                    <input type="text" class="input" value="Introduce tu correo electronico">
                    <button class="boton-final">Enviar</button>
                </div>
            </div>
            <div class="footer-3">
                <p>Elaborado por Triad. 2021. Todos los derechos</p>
            </div>
        </footer>

</body>

</html>
