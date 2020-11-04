@extends("head")

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
    </article>

    <article class="d-flex flex-row flex-wrap justify-content-between mr-5 ml-5">
        @foreach($productos as $producto)
            <div class="bg-dark mt-3 p-3 text-center text-white overflow-hidden" style="width: 49%;">
                <div class="m-3">
                    <h2 class="display-5">{{$producto->nombre}}</h2>
                    <p class="lead">{{ $producto->precio }}€</p>
                    <p>Ver más de este tipo <a href="/productos/{{$producto->tipo}}">{{$producto->tipo}}</a></p>
                </div>
                <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">
                    <img src="{{asset('img'.$producto->img1)}}" style="width: 100%;border-radius: 21px 21px 0 0;" alt="">
                </div>
            </div>
        @endforeach
    </article>
</main>

@extends("footer")
