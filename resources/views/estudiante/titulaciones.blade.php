@extends('layouts.baseUser', ['navbar' => true, 'id_estudiante' => $estudiante->id_estudiante])

@section('content')
    <div class="row justify-content-center" style="padding: 25px; background-color: #e4ebf0;">
        <div class="col-md-8">
            <div class="row">
                <div class="col-3">
                    <a class="dropdown-item arrow_back me-2" href="{{ route('admin.index') }}">
                        <i class="bi bi-arrow-left" style="font-size: 1.5rem;"></i>
                    </a>
                </div>
                <div class="col-7">
                    <h2>Formas de titulación</h2>
                </div>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="table-dark">Forma de titulación</th>
                            <th scope="col" class="table-dark text-center">Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($titulaciones as $titulacion)
                            <tr>
                                <td>
                                    {{ $titulacion->tipo }}
                                </td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#showModal{{ $titulacion->id_titulacion }}">
                                        Abrir <i class="bi bi-box-arrow-up-right"></i>
                                    </button>
                                </td>
                            </tr>
                            @include('titulacion.showDesc', ['titulacion' => $titulacion])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <div class="container" style="background-color: #e4ebf0;">
                <div class="row pt-2">
                    <div class="col-12">
                       <p>&copy; 2024 Challenge team</p>
                    </div>
                </div>
    </div>

@endsection
