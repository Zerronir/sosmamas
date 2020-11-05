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

    <main class="container d-flex flex-column align-content-center">
        <section class="py-5 d-flex flex-column align-content-center">
            <!-- BILLING ADDRESS-->
            <h2 class="h5 text-uppercase mb-4">Inicia sesión</h2>
            <div class="row">
                <div class="col-lg-9">
                    <form action="/doLogin" method="post">
                        {{csrf_field()}}
                        <div class="col">
                            <div class="col-lg-6 form-group">
                                <label class="text-small text-uppercase" for="email">Correo electrónico</label>
                                <input class="form-control form-control-lg" id="email" name="email" type="email" placeholder="Email">
                            </div>
                            <div class="col-lg-6 form-group">
                                <label class="text-small text-uppercase" for="pass1">Contraseña</label>
                                <input class="form-control form-control-lg" id="pass1" name="pass1" type="password" placeholder="Contraseña">
                            </div>

                            <div class="col-lg-6 form-group">
                                <a href="/reset-pass" class="nav-link text-small text-uppercase" style="color: #050033">He olvidado mi contraseña</a>
                            </div>

                            <div class="col-lg-12 form-group">
                                <button class="btn btn-dark" type="submit">Iniciar sesión</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- ORDER SUMMARY-->
            </div>
        </section>
    </main>


@extends("footer")
