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

@extends("footer")
