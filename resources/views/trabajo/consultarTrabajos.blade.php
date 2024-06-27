@extends('layouts.baseUser', ['navbar' => true,'id_estudiante' => $estudiante->id_estudiante])
@section('content')
<div class="container mt-5" style="background-color: #bdd1de;">
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
                <th>Detalles</th>
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
                        <a href="{{ route('estudiante.ttDetails', ['id_estudiante' => $estudiante->id_estudiante,'id' => $trabajo->id_trabajoAcademico]) }}" class="btn btn-info">Ver Detalles</a>
                    </td>
                    @if ($trabajo->status == 'Sinodales asignados')
                        <td>
                            <form action="{{ route('estudiante.ConfirmarSinodales', ['id_estudiante' => $estudiante->id_estudiante, 'id' => $trabajo->id_trabajoAcademico, 'aprobado' => 'Si']) }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Confirmar</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('estudiante.index',['id_estudiante' => $estudiante->id_estudiante]) }}" class="btn btn-primary">Volver a Panel de Estudiante</a>
</div>
@endsection