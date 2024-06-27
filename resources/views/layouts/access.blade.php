<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title >Aeneta</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js','resources/css/FAQ.css'])
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

<body style="background-color: #8ab3cf;">

<div class="titulo">
    <img src="/img/Poli.png" alt="Poli" style="height: 100px;">
    <div class="content">
        <h1>Instituto Politécnico Nacional</h1>
        <h2>Escuela Superior de Cómputo</h2>
        <h3>Repositorio de Trabajos Académicos</h3>
    </div>
    <img src="/img/escom.png" alt="Escom" style="height: 100px;">
</div>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4" >
        <div class="container">
            <a class="navbar-brand" href="{{ URL('/') }}">Aeneta</a>
        </div>
    </nav>
    @include('inc.messages')


    <div class="container">
        @yield('content')
    </div>
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Incluye la librería de jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <input type="hidden" id="user"
        value="{{ \Request::get('user') ? json_encode(\Request::get('user')) : null }}">
</body>
@stack('scripts')

</html>
