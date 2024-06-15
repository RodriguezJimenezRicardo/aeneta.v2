<div class="modal" id="deleteModal{{ $user->id_user }}" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModal{{ $user->id_providerUser }}Label">Eliminar usuario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de eliminar al usuario @if ($user->rol == 'Estudiante')
                    {{ $user->estudiantes[0]->nombre }} {{ $user->estudiantes[0]->apellido }}
                @elseif($user->rol == 'Docente')
                    {{ $user->docentes[0]->nombre }} {{ $user->docentes[0]->apellido }}
                @else
                    Administrador
                @endif
                ?

            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.destroyUser') }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="id_user" id="id_user" value="{{ $user->id_user }}">
                    <input type="hidden" name="rol" id="rol" value="{{ $user->rol }}">
                    <button type="button" class="btn btn-principal" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
