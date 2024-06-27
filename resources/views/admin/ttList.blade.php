@extends('layouts.base', ['navbar' => true])
@section('content')

<div class="container mt-5" style="background-color: #bdd1de;">
    <h1>Lista de Trabajos Academicos</h1>
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
                <th>Detalles</th>
                <th>  </th>
                <th> </th>
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
                    <td>{{ $trabajo->status }}</td>
                    <td>
                        <a href="{{ route('pdf.show', ['id' => $trabajo->id_trabajoAcademico]) }}" class="btn btn-info">Ver PDF</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.ttDetails', ['id' => $trabajo->id_trabajoAcademico]) }}" class="btn btn-info">Ver Detalles</a>
                    </td>
                    @if ($trabajo->status == 'En proceso de registro')
                        <td>
                            <form action="{{ route('admin.Aprobar', ['id' => $trabajo->id_trabajoAcademico, 'aprobado' => 'Si']) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Aprobar</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.Aprobar', ['id' => $trabajo->id_trabajoAcademico, 'aprobado' => 'No']) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-danger">Rechazar</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.index') }}" class="btn btn-primary">Volver a Panel de Admin</a>
</div>
<footer class="faq-footer" style="margin-top: 100px;">
   <p>&copy; 2024 Challenge team</p>
</footer>
@endsection