<head>
    <style>
        .titulo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border: 1px solid #000;
            background-color:#bdd1de;
        }
        .content {
            text-align: center;
        }
        .content h1 {
            font-size: 24px;
            margin: 0;
        }
        .content h2 {
            font-size: 18px;
            margin: 5px 0;
        }
        .content h3 {
            font-size: 14px;
            margin: 5px 0;
        }
    </style>
</head>
<div class="titulo">
    <img src="/img/Poli.png" alt="Poli" style="height: 100px;">
    <div class="content">
        <h1>Instituto Politécnico Nacional</h1>
        <h2>Escuela Superior de Cómputo</h2>
        <h3>Repositorio de Trabajos Académicos</h3>
    </div>
    <img src="/img/escom.png" alt="Escom" style="height: 100px;">
</div>

<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand"
            @if (Session::get('user')) @switch(Session::get('user')->rol)
                    @case('Estudiante')
                        @if ($navbar)
                            href="{{ route('estudiante.index', ['id_estudiante' => $id_estudiante]) }}"
                        @else
                            href="/" @endif
        @break @case('Docente')
            @if ($navbar) href="{{ route('docente.index', ['id_docente' => $id_docente]) }}"
                        @else
                            href="/" @endif
            @break @endswitch @else href="/" @endif
            >
            {{ env('APP_NAME') }}</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbarIntranet">
            <span class="navbar-toggler-icon"></span>
        </button>

        @if (Session::get('user'))
            @switch(Session::get('user')->rol)
                @case('Estudiante')
                    @if ($navbar)
                        <ul class="navbar-nav px-5">
                            <li class="nav-item px-4">
                                <a class="nav-link active"
                                    href="{{ route('estudiante.consultarTrabajos', ['id_estudiante' => $id_estudiante]) }}">Historial
                                </a>
                            </li>
                            <li class="nav-item px-4">
                                <a class="nav-link active"
                                    href="{{ route('estudiante.procesost', ['id_estudiante' => $id_estudiante]) }}">
                                    Formas Titulación </a>
                            </li>
                            <li class="nav-item px-4">
                                <a class="nav-link active"
                                    href="{{ route('estudiante.registrarTrabajoForm', ['id_estudiante' => $id_estudiante]) }}">
                                    Nuevo Trabajo</a>
                            </li>
                            <li class="nav-item px-4">
                                <a class="nav-link active" href="{{ route('faq') }}">Preguntas Frecuentes</a>
                            </li>
                            <li class="nav-item px-4">
                                <a class="nav-link active" href="{{ route('Busqueda') }}">Busqueda</a>
                            </li>
                        </ul>
                    @endif
                @break

                @case('Docente')
                    @if ($navbar)
                        <ul class="navbar-nav px-5">
                            <li class="nav-item px-4">
                                <a class="nav-link active" href="#">Docente</a>
                            </li>
                            <li class="nav-item px-4">
                                <a class="nav-link active" href="#">Docente</a>
                            </li>
                            <li class="nav-item px-4">
                                <a class="nav-link active" href="{{ route('faq') }}">Preguntas Frecuentes</a>
                            </li>
                            <li class="nav-item px-4">
                                <a class="nav-link active" href="{{ route('Busqueda') }}">Busqueda</a>
                            </li>
                        </ul>
                    @endif
                @break

            @endswitch

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
                <li class="nav-item px-4">
                    <a class="nav-link active" href="{{ route('login') }}">Iniciar sesión</a>
                </li>
            </ul>
        @endif
    </div>
</nav>

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
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <a href="{{ route('logout') }}">
                    <button type="submit" class="btn btn-primary">Cerrar sesión</button>
                </a>
            </div>
        </div>
    </div>
</div>
