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

@section('title', 'Búsqueda Académica')

@section('content')
<div class="container mt-5" style="background-color: #bdd1de;">
    <div class="card shadow search-container">
        <div class="card-body">
            <form action="{{ route('buscar.trabajos') }}" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control search-bar" placeholder="Buscar Trabajo Académico" name="query" value="{{ request('query') }}">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                        <a href="{{ route('busqueda.avanzada') }}" class="btn btn-secondary ml-2">Búsqueda Avanzada</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @if (isset($query))
        <div class="card shadow mt-4 results-container" style="background-color: #bdd1de;">
            <div class="card-body">
                <h4>Resultados de la Búsqueda</h4>
                @if ($trabajos->isEmpty())
                    <p>No se encontraron resultados para "{{ $query }}".</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Título</th>
                                <th>Descripción</th>
                                <th>Área</th>
                                <th>Acciones</th>
                                <th>Detalles</th>
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
<footer class="faq-footer" style="margin-top: 300px;">
   <p>&copy; 2024 Challenge team</p>
</footer>
@endsection

@section('scripts')
<!-- Incluir jQuery y Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

@section('styles')
<style>
    .search-bar {
        max-width: 300px;
    }
</style>
@endsection