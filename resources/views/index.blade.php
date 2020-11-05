@extends('head')
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
                            <!-- Link--><a class="nav-link active" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link" href="/productos">Productos</a>
                        </li>
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link" href="/sobre-nosotros">Quienes somos</a>
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
        <p class="small text-muted small text-uppercase mb-3">CONSIGUIENDO SONRISAS. ASOCIACIÓN DEDICADA A LA AYUDA DE PERSONAS SIN RECURSOS, ENFOCADOS SOBRE TODO EN NIÑOS, VICTIMAS DE VIOLENCIA DE GÉNERO. LES AYUDAMOS EN COMIDA, VESTIMENTA, ENSERES DE PRIMERA NECESIDAD, NO TENEMOS NINGÚN TIPO DE AYUDA MONETARIA, QUE NO SEA EXCLUSIVAMENTE LA QUE VOSOTROS NOS DAIS.</p>
        <a class="btn btn-outline-secondary boton" href="/productos">Listar todo</a>
    </div>
    <div class="product-device shadow-sm d-none d-md-block"></div>
    <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
</div>

<main class="container">
    @if($register ?? '')
        <div class="alert alert-success" role="alert">
            Te has registrado correctamente, <a href="/login" class="alert-link">usa este link para iniciar sesión y acceder a tu perfil</a>
        </div>
    @endif


    <article class="d-flex flex-column justify-content-between pb-3 pt-3">

        <section class="pt-5">
            <header class="text-center">
                <p class="small text-muted small text-uppercase mb-1">Covid-19</p>
                <h2 class="h5 text-uppercase mb-4">Protegete del Covid</h2>
            </header>
            <div class="row justify-content-between">
                <div class="col-md-4 mb-4 mb-md-0">
                    <a class="category-item" href="/productos/mascarillas-adultos">
                        <img class="img-fluid" src="{{asset("./img/m_adulto.jpg")}}" alt="">
                        <strong class="category-item-title text-center">Mascarillas para adultos</strong>
                    </a>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <a class="category-item mb-4" href="/productos/mascarillas-infantiles">
                        <img class="img-fluid" src="{{asset("./img/m_infantil.jpg")}}" alt="">
                        <strong class="category-item-title text-center">Mascarillas infantiles</strong>
                    </a>
                </div>

            </div>
        </section>

    </article>

        <section class="py-5">
            <header>
                <p class="small text-muted small text-uppercase mb-1">100% hecho a mano</p>
                <h2 class="h5 text-uppercase mb-4">Últimos productos publicados</h2>
            </header>
            <div class="row">
                <!-- PRODUCT-->

                @foreach($productos as $producto)

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="product text-center">
                            <div class="position-relative mb-3">
                                <div class="badge text-white badge-"></div><a class="d-block" href="detail.html"><img class="img-fluid w-100" src="{{asset("./img/".$producto->img1)}}" alt="..."></a>
                                <div class="product-overlay">
                                    <ul class="mb-0 list-inline">
                                        <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-outline-dark" href="#"><i class="far fa-heart"></i></a></li>
                                        <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="cart.html">Añadir al carrito</a></li>
                                        <li class="list-inline-item mr-0"><a class="btn btn-sm btn-outline-dark" href="#productView" data-toggle="modal"><i class="fas fa-expand"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <h6> <a class="reset-anchor" href="detail.html">{{ $producto->nombre }}</a></h6>
                            <p class="small text-muted">{{$producto->precio}} €</p>
                        </div>
                    </div>

                @endforeach


            </div>
        </section>

</main>

@extends('footer')
