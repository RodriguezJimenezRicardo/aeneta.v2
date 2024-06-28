<div class="modal" id="deleteModal{{ $titulacion->id_titulacion }}" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModal{{ $titulacion->id_titulacion }}Label">Eliminar forma de
                    titulación</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de eliminar la forma de titulación {{ $titulacion->tipo }}?

            </div>
            <div class="modal-footer">
                <form action="{{ route('titulacion.destroy') }}" method="POST">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="id_titulacion" id="id_titulacion"
                        value="{{ $titulacion->id_titulacion }}">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Eliminar</button>

                </form>
            </div>
        </div>
    </div>
</div>
</div>
