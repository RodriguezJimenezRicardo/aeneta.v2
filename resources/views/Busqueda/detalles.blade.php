@extends('layouts.index', ['navbar' => true])

@section('content')
<div class="container mt-5" style="background-color: #bdd1de;">
    <div class="text-center mb-4">
        <h1>Consultar Detalles del Trabajo Academico</h1>
    </div>
    <div class="card mb-4" style="background-color: #e4ebf0">
        <div class="card-body">
            <h2 class="card-title">{{ $trabajo->titulo }}</h2>
            <p class="card-text">{{ $trabajo->descripcion }}</p>
        </div>
    </div>
    <div class="card mb-4" style="background-color: #e4ebf0">
        <div class="card-body">
            <h2 class="card-title">Estatus</h2>
            @if ($trabajo->status == 'Aprobado')
                <p class="card-text">Aprobado : Esperando Asignación de Sinodales</p>
            @else
                <p class="card-text">{{ $trabajo->status }}</p>
            @endif
        </div>
    </div>
    <div class="row mb-4" style="background-color: #e4ebf0">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Sinodales</h3>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($sinodales as $profesor)
                        <li class="list-group-item">{{ $profesor->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-4" style="background-color: #e4ebf0">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Directores</h3>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($directores as $director)
                        <li class="list-group-item">{{ $director->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-md-4" style="background-color: #e4ebf0">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Participantes</h3>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach ($participantes as $participante)
                        <li class="list-group-item">{{ $participante->nombre }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="card mb-4" style="background-color: #e4ebf0">
        <div class="card-body">
            <h1 class="card-title">Previsualización de PDF</h1>
            <iframe src="{{ route('pdf.show', ['id' => $trabajo->id_trabajoAcademico]) }}" width="100%" height="600" class="border-0"></iframe>
        </div>
    </div>
    <div class="text-center">
        <a href="{{ route('Busqueda') }}" class="btn btn-primary">Volver a la busqueda</a>
    </div>
</div>
@endsection