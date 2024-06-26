@php
    $layout = 'layouts.index';
    $navbar = ['navbar' => true];

    if (Session::get('user')) {
        if (Session::get('user')->rol === 'Estudiante') {
            $layout = 'layouts.baseUser';
            $navbar = ['navbar' => true, 'id_estudiante' => Session::get('user')->id_estudiante];
        } elseif (Session::get('user')->rol === 'Docente') {
            $layout = 'layouts.baseUser';
            $navbar = ['navbar' => true, 'id_docente' => Session::get('user')->id_docente];
        }
    }
@endphp

@extends($layout, $navbar)

@section('title', 'Búsqueda Avanzada')

@section('content')
<div class="container mt-5">
    <div class="card shadow floating-container">
        <div class="card-body">
            <h4 class="card-title">Búsqueda Avanzada</h4>
            <form action="{{ route('buscar.trabajos.avanzada') }}" method="GET">
                <div class="form-group">
                    <label for="tipoTrabajo">Tipo de trabajo académico:</label>
                    <input type="text" class="form-control" id="tipoTrabajo" name="tipoTrabajo" value="{{ request('tipoTrabajo') }}">
                </div>
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ request('titulo') }}">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ request('descripcion') }}">
                </div>
                <div class="form-group">
                    <label for="fechaInicio">Fecha de inicio:</label>
                    <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" value="{{ request('fechaInicio') }}">
                </div>
                <div class="form-group">
                    <label for="fechaFin">Fecha de fin:</label>
                    <input type="date" class="form-control" id="fechaFin" name="fechaFin" value="{{ request('fechaFin') }}">
                </div>
                <div class="form-group">
                    <label for="area">Área:</label>
                    <input type="text" class="form-control" id="area" name="area" value="{{ request('area') }}">
                </div>
                <div class="form-group">
                    <label for="nombreAlumno">Nombre del Alumno:</label>
                    <input type="text" class="form-control" id="nombreAlumno" name="nombreAlumno" value="{{ request('nombreAlumno') }}">
                </div>
                <div class="form-group">
                    <label for="nombreProfesor">Nombre del Profesor:</label>
                    <input type="text" class="form-control" id="nombreProfesor" name="nombreProfesor" value="{{ request('nombreProfesor') }}">
                </div>
                <button type="submit" class="btn btn-primary float-left">Realizar Búsqueda</button>
            </form>
        </div>
    </div>

    @if (isset($trabajos))
        <div class="card shadow mt-4 results-container">
            <div class="card-body">
                <h4>Resultados de la Búsqueda</h4>
                @if ($trabajos->isEmpty())
                    <p>No se encontraron resultados para los criterios especificados.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Área</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trabajos as $trabajo)
                                <tr>
                                    <td>{{ $trabajo->titulo }}</td>
                                    <td>{{ $trabajo->descripcion }}</td>
                                    <td>{{ $trabajo->id_area }}</td>
                                    <td>
                                        <a href="{{ route('pdf.show', ['id' => $trabajo->id_trabajoAcademico]) }}" class="btn btn-info">Ver PDF</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('Busqueda.detalles', ['id' => $trabajo->id_trabajoAcademico]) }}" class="btn btn-info">Ver Detalles</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    @endif
</div>
@endsection

@section('styles')
<style>
    .floating-container {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
    .container {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
    }
    .results-container {
        width: 100%;
    }
</style>
@endsection

@section('scripts')
<!-- Incluir jQuery y Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection