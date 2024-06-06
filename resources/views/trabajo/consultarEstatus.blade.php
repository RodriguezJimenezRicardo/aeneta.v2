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
        <h1>Consultar Estado del Trabajo Terminal</h1>
        <h2>{{ $trabajo->titulo }}</h2>
        <p>{{ $trabajo->descripcion }}</p>
        <h3>Lista de Sinodales</h3>
        <ul>
            @foreach ($sinodales as $profesor)
                <li>{{ $profesor->nombre }}</li>
            @endforeach
        </ul>
        <h3>Lista de Directores</h3>
        <ul>
            @foreach ($sinodales as $profesor)
                <li>{{ $profesor->nombre }}</li>
            @endforeach
        </ul>
        <h3>Lista de Participantes</h3>
        <ul>
            @foreach ($sinodales as $profesor)
                <li>{{ $profesor->nombre }}</li>
            @endforeach
        </ul>
        <div style="width: 800px; margin: 0 auto;">
            <h1>Previsualización de PDF</h1>
            <iframe src="{{ route('pdf.show', ['id' => $pdfDocument->id_trabajoAcademico]) }}" width="100%" height="600"></iframe>
        </div>
        <a href="{{ route('admin.index') }}" class="btn btn-primary">Volver a Panel de Administración</a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>