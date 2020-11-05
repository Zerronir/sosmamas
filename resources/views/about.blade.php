@extends("head")

<body>
<div class="page-holder">
    <!-- navbar-->
    <header class="header bg-white">
        <div class="container px-0 px-lg-3">
            <nav class="navbar navbar-expand-lg navbar-light py-3 px-lg-0"><a class="navbar-brand" href="index.html"><span class="font-weight-bold text-uppercase text-dark"><img
                            src="{{asset("./img/logo.jpg")}}" width="100px" alt=""></span></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link" href="/productos">Productos</a>
                        </li>
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link active" href="/sobre-nosotros">Quienes somos</a>
                        </li>
                        @if($categorias ?? '' != null)
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorías</a>
                                <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown">
                                    @foreach($categorias ?? '' as $categoria)
                                        <a style="text-transform: capitalize;" class="dropdown-item border-0 transition-link" href="/productos/{{$categoria->tipo}}">{{$categoria->tipo}}</a>
                                    @endforeach
                                </div>
                            </li>
                        @endif
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        @if($token != null)
                            <li class="nav-item"><a class="nav-link" href="cart.html"> <i class="fas fa-dolly-flatbed mr-1 text-gray"></i>Carrito<small class="text-gray">(2)</small></a></li>
                            <li class="nav-item"><a class="nav-link" href="/perfil"> <i class="fas fa-user-alt mr-1 text-gray"></i>Mi cuenta</a></li>
                            <li class="nav-item"><a class="nav-link" href="/logout">Cerrar sesión</a></li>
                        @else
                            <li class="nav-item"><a class="nav-link" href="/login"> <i class="fas fa-user-alt mr-1 text-gray"></i>Login</a></li>
                        @endif

                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <div class="position-relative overflow-hidden text-center bg-light">
        <div class="col-md-5 p-lg-5 mx-auto my-5">
            <img src="{{asset("/img/logo.jpg")}}" class="mb-2" alt="">
        </div>
        <div class="product-device shadow-sm d-none d-md-block"></div>
        <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
    </div>


<main class="container">





    <p>
        DONDE UNOS CIERRAN LOS OJOS PARA NO VER... ALLÍ ESTÁ SOS MAMAS.
        ALIMENTOS Y ARTICULOS DE PRIMERA NECESIDAD. SE REPARTEN ENTRE FAMILIAS NECESITADAS.
    </p>

    <p>
        ESTA ASOCIACIÓN NACIÓ DEL SUEÑO DE DOS PERSONAS EN HACER UN MUNDO MEJOR, DONDE NO DEBÍA HABER TEMAS RELIGIOSOS, NI DE COLOR, NI IDEOLOGÍAS POLÍTICAS, TAMPOCO CONDICIÓN SOCIAL...DONDE PODÍAN CONVIVIR TODAS LAS PERSONAS POR IGUAL, DONDE EL DOLOR AJENO, ERA NUESTRO DOLOR. ESTE SUEÑO ERA EL SUEÑO DE DOS SANITARIAS, UNA DE ELLAS ENFERMA Y YA FUERA DEL HOSPITAL, QUE UN DÍA SE ENCONTRÓ CON LA NECESIDAD DE AYUDAR A UNA FAMILIA DE FUERA, QUE LO COMENTÓ A SU ANTIGUA COMPAÑERA Y DECIDIERON CREAR UNA PÁGINA, SOS MAMAS, DONDE LAS PERSONAS ERAN LIBRES, PODÍAN OFRECER LAS COSAS QUE NO NECESITABAN Y PODÍAN PEDIR LAS QUE SE NECESITABAN, NO HABÍA DINERO, NO HABÍA NINGÚN MAL INTERÉS, SOLO HABÍA SOLIDARIDAD. PUES BIEN... EL SUEÑO SE HA CUMPLIDO, PUES HASTA EL DÍA DE HOY NO HEMOS PERDIDO LO IMPORTANTE... ESA ESENCIA, LA DE AYUDAR A NUESTROS SEMEJANTES, LA DE LLEGAR A TOCAR LAS FIBRAS Y SER SOLIDARIOS... ESTO ES SOS MAMAS, UNA ASOCIACIÓN SIN NINGÚN ANIMO DE LUCRO. SI TU ERES ASÍ, SIENTES QUE PUEDES AYUDAR, O NECESITAS QUE TE AYUDEMOS... AQUÍ ESTAMOS. CONTAMOS CONTIGO, TENIENDO EN CUENTA QUE PUEDES SER ANÓNIMO, PUES SIEMPRE VAMOS A RESPETAR ESO... TU ANONIMATO.
        (Ascen Maestre)
    </p>
</main>


    @extends("footer")
