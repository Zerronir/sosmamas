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
            <li class="nav-item"><a class="nav-link" href="/perfil">{{ $name ?? ''  }} {{ $surname ?? 'Mi perfil' }}</a></li>
            <li class="nav-item"><a class="nav-link" href="/carrito">Carrito</a></li>
        @else
            <li class="nav-item"><a class="nav-link" href="/login">Iniciar sesión</a></li>
            <li class="nav-item"><a class="nav-link" href="/registro">Registrate!</a></li>
        @endif
    </ul>

</header>


<main class="mt-5 mb-5">

    <article class="d-flex flex-row justify-content-center">
        <h1>Esto es la página de productos</h1>
        <br>
    </article>
    <article class="d-flex flex-row justify-content-center">
        <ul class="d-flex flex-row">
            @foreach($categorias as $categoria)
                <li><a href="/productos/{{$categoria->tipo}}" class="pr-list">{{$categoria->tipo}}</a></li>
            @endforeach
        </ul>
    </article>

    <div class="container">
        <div class="row">
            @foreach($productos as $producto)
            <div class="col-md-3 col-sm-6 mt-3 mb-3">
                <div class="product-grid">
                    <div class="product-image">
                        <a href="/productos/{{ $producto->productoId }}">
                            <img class="pic-1" src="{{ asset("img/".$producto->img1 ) }}">
                        </a>
                        <!--<span class="product-new-label">Sale</span>
                        <span class="product-discount-label">20%</span> -->
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">{{$producto->nombre}}</a></h3>
                        <div class="price">
                            {{ $producto->precio }}€
                        </div>
                        <a class="add-to-cart" href="">Ver producto</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@extends('footer')
