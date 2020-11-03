@extends('head')
<body>
<header>
    <nav class="navbar navbar-dark bg-primary">
        <ul class="nav justify-content-end">
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
            @if ($name != null )
                <li class="nav-item"><a class="nav-link" href="/perfil">Mi perfil</a></li>
                <li class="nav-item"><a class="nav-link" href="/carrito">Carrito</a></li>
            @else
                <li class="nav-item"><a class="nav-link" href="/login">Iniciar sesión</a></li>
                <li class="nav-item"><a class="nav-link" href="/registro">Registrate!</a></li>
            @endif
        </ul>

    </nav>

</header>
<main>
    <h1>Esto es la página de productos</h1>
</main>
@extends('footer')
