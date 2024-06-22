@extends('layouts.base', ['navbar' => true])
@section('content')

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
                    <td>{{ $trabajo->status }}</td>
                    <td>
                        <a href="{{ route('pdf.show', ['id' => $trabajo->id_trabajoAcademico]) }}" class="btn btn-info">Ver PDF</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.ttDetails', ['id' => $trabajo->id_trabajoAcademico]) }}" class="btn btn-info">Ver Detalles</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.agregarSinodal', ['id' => $trabajo->id_trabajoAcademico]) }}" class="btn btn-info">Agregar Sinodales</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.index') }}" class="btn btn-primary">Volver a Panel de Admin</a>
</div>
@endsection