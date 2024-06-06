<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aeneta</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
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
