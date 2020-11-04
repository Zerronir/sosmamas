@extends('head')
<body>
<header class="navbar navbar-dark bg-sos">
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="/">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/productos">Productos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/sobre-nosotros">Sobre nosotros</a>
            </li>
        </ul>

        <ul class="nav justify-content-end">
            @if ($token != null)
                <li class="nav-item"><a class="nav-link" href="/perfil">{{ $name ?? '' }} {{ $surname ?? 'Mi Perfil' }}</a></li>
                <li class="nav-item"><a class="nav-link" href="/carrito">Carrito</a></li>
            @else
                <li class="nav-item"><a class="nav-link" href="/login">Iniciar sesión</a></li>
                <li class="nav-item"><a class="nav-link" href="/registro">Registrate!</a></li>
            @endif
        </ul>

</header>
<div class="position-relative overflow-hidden text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
        <img src="{{asset("/img/logo.jpg")}}" class="mb-2" alt="">
        <p>CONSIGUIENDO SONRISAS. ASOCIACIÓN DEDICADA A LA AYUDA DE PERSONAS SIN RECURSOS, ENFOCADOS SOBRE TODO EN NIÑOS, VICTIMAS DE VIOLENCIA DE GÉNERO. LES AYUDAMOS EN COMIDA, VESTIMENTA, ENSERES DE PRIMERA NECESIDAD, NO TENEMOS NINGÚN TIPO DE AYUDA MONETARIA, QUE NO SEA EXCLUSIVAMENTE LA QUE VOSOTROS NOS DAIS.</p>
        <a class="btn btn-outline-secondary boton" href="#">Listar todo</a>
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


    <article class="d-flex flex-row justify-content-between pb-3 pt-3">
        <article class="pr-3">
            <a href="/productos/mascarillas-adultos">
                <article class="img-container">
                    <img src="{{asset('/img/m_adulto.jpg')}}" width="450px" alt="">
                    <article class="center">
                        <p>Mascarillas para adultos</p>
                    </article>
                </article>
            </a>
        </article>

        <article class="pl-3">
            <a href="/productos/mascarillas-infantiles">
                <article class="img-container">
                    <img src="{{asset('/img/m_infantil.jpg')}}" width="450px" alt="">
                    <article class="center">
                        <p>Mascarillas infantiles</p>
                    </article>
                </article>
            </a>
        </article>

    </article>

    <article>
        test
    </article>

</main>

@extends('footer')
