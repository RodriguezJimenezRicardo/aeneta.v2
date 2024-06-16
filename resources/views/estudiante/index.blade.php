@extends('layouts.baseUser', ['navbar' => true])

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Panel del Estudiante {{ $estudiante->nombre }} con boleta
                    {{ $estudiante->id_estudiante }}</h1>
                <button class="btn btn-primary mt-4"
                    onclick="window.location.href='{{ route('estudiante.consultarTrabajos', ['id_estudiante' => $estudiante->id_estudiante]) }}'">Consultar
                    trabajo(s)
                    terminales</button>
            </div>
        </div>
    </div>
@endsection
