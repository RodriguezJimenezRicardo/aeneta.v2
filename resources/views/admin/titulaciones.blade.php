@extends('layouts.base', ['navbar' => true])

@section('content')
    <div class="row justify-content-center" style="padding: 25px">
        <div class="col-md-7">
            <div class="row">
                <div class="col-3">
                    <a class="dropdown-item arrow_back me-2" href="{{ route('admin.index') }}">
                        <i class="bi bi-arrow-left" style="font-size: 1.5rem;"></i>
                    </a>
                </div>
                <div class="col-7">
                    <h2>Formas de titulación</h2>
                </div>
                <div class="col text-end">
                    {{-- BUTTON ADD TITULACION --}}
                    <button type="button" title="Agregar forma de titulacion" class="btn btn-primary"
                        data-bs-toggle="modal" data-bs-target="#addtitulacionModal">
                        <i class="bi bi-mortarboard-fill"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="table-dark">Forma de titulación</th>
                            <th scope="col" class="table-dark">Descripción</th>
                            <th scope="col" class="table-dark">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($titulaciones as $titulacion)
                            <tr>
                                <td>
                                    {{ $titulacion->tipo }}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#showModal{{ $titulacion->id_titulacion }}">
                                        Abrir <i class="bi bi-box-arrow-up-right"></i>
                                    </button>
                                </td>
                                <td class="text-center">

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal{{ $titulacion->id_titulacion }}">
                                        <i class="bi bi-trash3-fill"></i>
                                    </button>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $titulacion->id_titulacion }}">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>

                                </td>
                            </tr>
                            @include('titulacion.delete', ['titulacion' => $titulacion])
                            @include('titulacion.edit', ['titulacion' => $titulacion])
                            @include('titulacion.showDesc', ['titulacion' => $titulacion])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- MODAL ADD USER --}}
        <div class="modal" id="addtitulacionModal" data-bs-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addtitulacionModalLabel">Agregar nueva forma de titulación</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('titulacion.create') }}" method="POST">
                            @csrf
                            <div class="mb-3 row">
                                <label for="tipo" class="form-label">Tipo / Modalidad</label>
                                <input type="text" name="tipo" id="tipo" value="{{ old('tipo') }}"
                                    class="form-control @error('tipo') is-invalid @enderror">
                                <div class="form-text" id="basic-addon4">
                                    Este campo es requerido.
                                </div>
                                @if ($errors->has('tipo'))
                                    <span class="text-danger">{{ $errors->first('tipo') }}</span>
                                @endif
                            </div>
                            <div class="mb-3 row">
                                <label for="desc" class="form-label">Descripción / Pasos</label>
                                <textarea class="form-control @error('desc') is-invalid @enderror" id="floatingTextarea" name="desc">{{ old('desc') }}</textarea>
                                <div class="form-text" id="basic-addon4">Este campo es requerido. No debe exceder los 500
                                    caracteres.
                                </div>
                                @if ($errors->has('desc'))
                                    <span class="text-danger">{{ $errors->first('desc') }}</span>
                                @endif
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secundario" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-principal">Enviar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
