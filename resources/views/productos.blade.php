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
                            <!-- Link--><a class="nav-link" href="/">Inicio</a>
                        </li>
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link active" href="/productos">Productos</a>
                        </li>
                        <li class="nav-item">
                            <!-- Link--><a class="nav-link" href="/sobre-nosotros">Quienes somos</a>
                        </li>
                        @if($categorias != null)
                            <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="pagesDropdown" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorías</a>
                                <div class="dropdown-menu mt-3" aria-labelledby="pagesDropdown">
                                    @foreach($categorias as $categoria)
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


<main class="mt-5 mb-5">

    <div class="container">
        <section class="py-5">
            <header>
                <p class="small text-muted small text-uppercase mb-1">100% hecho a mano</p>
                <h2 class="h5 text-uppercase mb-4">Todos los productos</h2>
            </header>
            <div class="row">
                <!-- PRODUCT-->

                @foreach($productos as $producto)

                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="product text-center">
                            <div class="position-relative mb-3">
                                <div class="badge text-white badge-"></div><a class="d-block" href="/productos/ver/{{$producto->productoId}}"><img class="img-fluid w-100" src="{{asset("./img/".$producto->img1)}}" alt="..."></a>
                                <div class="product-overlay">
                                    <ul class="mb-0 list-inline">
                                        <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="/carrito">Añadir al carrito</a></li>
                                    </ul>
                                </div>
                            </div>
                            <h6> <a class="reset-anchor" href="/productos/ver/{{$producto->productoId}}">{{ $producto->nombre }}</a></h6>
                            <p class="small text-muted">{{$producto->precio}} €</p>
                        </div>
                    </div>

                @endforeach


            </div>
        </section>
    </div>
</main>
@extends('footer')
