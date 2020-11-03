@extends("head")

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
<main class="container">
    @if($name != null)
        <h2>Hola {{$name}}</h2>
        <p>Ya has iniciado sesión</p>
    @endif

    @if($name == null)

            <article>
                <h1>Registrate</h1>

                <form action="/doRegistro" method="post">
                    @csrf

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Nombre: </span>
                        </div>
                        <input type="text" class="form-control" name="name" placeholder="Nombre" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Apellidos: </span>
                        </div>
                        <input type="text" class="form-control" name="surname" placeholder="Apellidos" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon3">Correo electrónico: </span>
                        </div>
                        <input type="text" class="form-control" name="email" placeholder="Email" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    </div>



                </form>
            </article>



    @endif


</main>

@extends("footer")
