<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Trabajos Terminales</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Trabajos Terminales</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha Final</th>
                    <th>Área</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trabajos as $trabajo)
                    <tr>
                        <td>{{ $trabajo->id_trabajoAcademico }}</td>
                        <td>{{ $trabajo->titulo }}</td>
                        <td>{{ $trabajo->descripcion }}</td>
                        <td>{{ $trabajo->fecha_inicio }}</td>
                        <td>{{ $trabajo->fecha_final }}</td>
                        <td>{{ $trabajo->id_area }}</td>
                        <td>{{ $trabajo->estatus }}</td>
                        <td>
                            <a href="{{ route('pdf.show', ['id' => $trabajo->id_trabajoAcademico]) }}" class="btn btn-info">Ver PDF</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('estudiante.index') }}" class="btn btn-primary">Volver a Panel de Estudiante</a>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>