@extends('layouts.base', ['navbar' => true])

@section('content')
    <div class="row justify-content-center" style="padding: 25px; background-color: #bdd1de;"> 
        <div class="col-md-9">
            <div class="row">
                <div class="col-4">
                    <a class="dropdown-item arrow_back me-2" href="{{ route('admin.index') }}">
                        <i class="bi bi-arrow-left" style="font-size: 1.5rem;"></i>
                    </a>
                </div>
                <div class="col-7">
                    <h2>Usuarios del sistema</h2>
                </div>
                <div class="col text-end">
                    {{-- BUTTON ADD CONTACT --}}
                    <button type="button" title="Agregar usuario" class="btn btn-principal" data-bs-toggle="modal"
                        data-bs-target="#adduserModal">
                        <i class="bi bi-person-fill-add"></i>
                    </button>
                </div>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="table-dark">Boleta</th>
                            <th scope="col" class="table-dark">Nombre</th>
                            <th scope="col" class="table-dark">Correo</th>
                            <th scope="col" class="table-dark">Rol</th>
                            <th scope="col" class="table-dark">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    @if ($user->rol == 'Estudiante')
                                        {{ $user->id_estudiante }}
                                    @else
                                        {{ $user->id_docente }}
                                    @endif
                                </td>
                                <td>
                                    @if ($user->rol == 'Estudiante')
                                        {{ $user->estudiantes[0]->nombre }} {{ $user->estudiantes[0]->apellido }}
                                    @elseif($user->rol == 'Docente')
                                        {{ $user->docentes[0]->nombre }} {{ $user->docentes[0]->apellido }}
                                    @else
                                        Administrador
                                    @endif
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->rol }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal{{ $user->id_user }}"
                                            @if ($user->rol == 'Administrador') disabled @endif>
                                            <i class="bi bi-trash3-fill"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @include('admin.user_delete', ['user' => $user])
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{-- MODAL ADD USER --}}
        <div class="modal" id="adduserModal" data-bs-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="adduserModalLabel">Agregar nuevo usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.addUser') }}" method="POST">
                            @csrf
                            <div class="mb-3 row">
                                <label for="email" class="form-label">Correo electrónico</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}">
                                <div class="form-text" id="basic-addon4">Este campo es requerido. No debe exceder los 150
                                    caracteres.
                                </div>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="mb-3 row">
                                <label for="name" class="form-label">Nombre</label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror">
                                <div class="form-text" id="basic-addon4">Este campo es requerido. No debe exceder los 150
                                    caracteres.
                                </div>
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="mb-3 row">
                                <label for="apellido" class="form-label">Apellido</label>
                                <input type="text" name="apellido" id="apellido" value="{{ old('apellido') }}"
                                    class="form-control @error('apellido') is-invalid @enderror">
                                <div class="form-text" id="basic-addon4">Este campo es requerido. No debe exceder los 150
                                    caracteres.
                                </div>
                                @if ($errors->has('apellido'))
                                    <span class="text-danger">{{ $errors->first('apellido') }}</span>
                                @endif
                            </div>
                            <div class="mb-3 row">
                                <label for="boleta" class="form-label">Boleta</label>
                                <input type="text" name="boleta" id="boleta" value="{{ old('boleta') }}"
                                    class="form-control @error('boleta') is-invalid @enderror">
                                <div class="form-text" id="basic-addon4">Este campo es requerido. No debe contener 10
                                    caracteres.
                                </div>
                                @if ($errors->has('boleta'))
                                    <span class="text-danger">{{ $errors->first('boleta') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="rol" class="form-label">Tipo de usuario</label>
                                <div class="row">
                                    <select name="rol" id="role" class="form-select">
                                        <option value="{{ old('rol') }}" selected="selected">
                                            @if (old('rol') == null)
                                                Seleccione un tipo de usuario
                                            @else
                                                {{ old('rol') }}
                                            @endif
                                        </option>
                                        <option value="Estudiante">Estudiante</option>
                                        <option value="Docente">Docente</option>
                                        <option value="Administrador">Administrador</option>
                                    </select>
                                </div>
                                <div class="form-text" id="basic-addon4">Este campo es requerido.</div>
                                @if ($errors->has('rol'))
                                    <span class="text-danger">{{ $errors->first('rol') }}</span>
                                @endif
                            </div>
                            <div class="mb-3" id="dep">
                                <label for="department" class="form-label">Departamento y Area</label>
                                <div class="row">
                                    <select name="department" id="department" class="form-select">
                                        <option value="{{ old('department') }}" selected>
                                            @if (old('department') == null)
                                                Seleccione un departamento
                                            @else
                                                {{ old('department') }}
                                            @endif
                                        </option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id_departamento }}">
                                                {{ $department->id_departamento }}, {{ $department->id_area }}</option>
                                        @endforeach
                                        <option value="Estudiante">Basicas</option>
                                        <option value="Docente">Fisico Matematicas</option>
                                        <option value="Administrador">Administrador</option>
                                    </select>
                                </div>
                                <div class="form-text" id="basic-addon4">Este campo es requerido.</div>
                                @if ($errors->has('department'))
                                    <span class="text-danger">{{ $errors->first('department') }}</span>
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
    <script>
        const lineSelect = document.getElementById('role');
        const otraActividadDiv = document.getElementById('dep');
        const other_bussines_line = document.getElementById('department');

        lineSelect.addEventListener('change', function() {
            const selectedValue = lineSelect.value;

            if (selectedValue === 'Docente') {
                otraActividadDiv.style.display = 'block';
                other_bussines_line.value = null;
            } else {

                otraActividadDiv.style.display = 'none';
                other_bussines_line.value = selectedValue;
            }

        });
    </script>
<footer class="faq-footer" style="margin-top: 100px;">
   <p>&copy; 2024 Challenge team</p>
</footer>
@endsection
