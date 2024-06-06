<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Trabajo Terminal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>descripcion del Trabajo Terminal</h1>
        <h2>{{ $trabajo->titulo }}</h2>
        <p>{{ $trabajo->descripcion }}</p>
        <h3>Lista de Sinodales</h3>
        <ul>
            @foreach ($sinodales as $profesor)
                <li>{{ $profesor->nombre }}</li>
            @endforeach
        </ul>
        <a href="{{ route('admin.agregarSinodal') }}" class="btn btn-primary">Volver a Agregar Sinodales</a>
        
        <a href="{{ route('admin.index') }}" class="btn btn-primary">Volver a Panel de Administración</a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
