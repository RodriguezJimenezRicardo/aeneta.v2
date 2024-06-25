<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aeneta</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">{{ env('APP_NAME') }}</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbarIntranet">
                <span class="navbar-toggler-icon"></span>
            </button>

            @if (isset($navbar) && $navbar)
                <ul class="navbar-nav px-5">
                    <li class="nav-item px-4">
                        <a class="nav-link active" href="#">Index</a>
                    </li>

                    <li class="nav-item px-4">
                        <a class="nav-link active" href="#">Index</a>
                    </li>
                    <li class="nav-item px-4">
                        <a class="nav-link active" href="#">Index</a>
                    </li>
                    <li class="nav-item px-4">
                        <a class="nav-link active" href="{{ route('Busqueda') }}">Búsqueda</a>
                    </li>
                </ul>
            @endif

            @if (Session::get('user'))
                <div class="collapse navbar-collapse navbarIntranet d-flex justify-content-end" id="navbarIntranet2">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown">
                                {{ Session::get('user')->email }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Cerrar sesión</a>

                            </div>
                        </li>
                    </ul>
                </div>
            @else
                <ul class="navbar-nav ml-auto">
                    <li class="navbar-nav px-4">
                        <a class="nav-link active" href="{{ route('login') }}">Iniciar sesión</a>
                    </li>
                </ul>
            @endif
        </div>
    </nav>

    @yield('content')

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cerrar sesión</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de cerrar sesión?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secundario" data-bs-dismiss="modal">Cancelar</button>
                    <a href="{{ route('logout') }}">
                        <button type="submit" class="btn btn-principal">
                            Cerrar sesión
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Incluir jQuery y Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>