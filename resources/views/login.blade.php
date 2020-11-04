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
        @if ($token != null )
            <li class="nav-item"><a class="nav-link" href="/perfil">{{ $name ?? 'Mi perfil' }}</a></li>
            <li class="nav-item"><a class="nav-link" href="/carrito">Carrito</a></li>
        @else
            <li class="nav-item"><a class="nav-link" href="/login">Iniciar sesión</a></li>
            <li class="nav-item"><a class="nav-link" href="/registro">Registrate!</a></li>
        @endif
    </ul>

</header>
<main class="container">
    @if($token != null)
        <h2>Hola {{$name ?? ''}}</h2>
        <p>Ya has iniciado sesión</p>
    @endif

    @if($token == null)

        <article>
            <h1>Inicia Sesión</h1>

            <form action="/doLogin" method="post">
                @csrf

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Correo electrónico: </span>
                    </div>
                    <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Recipient's username" aria-describedby="basic-addon2">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">Contraseña: </span>
                    </div>
                    <input type="password" class="form-control" name="pass1" placeholder="Contraseña" aria-label="Recipient's username" aria-describedby="basic-addon2">
                </div>


                <input type="submit" name="submit" value="Registrar">

            </form>
        </article>



    @endif


</main>

@extends("footer")
