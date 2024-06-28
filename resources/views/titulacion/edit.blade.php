<div class="modal" id="editModal{{ $titulacion->id_titulacion }}" data-bs-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModal{{ $titulacion->id_titulacion }}Label">Eliminar forma de
                    titulación</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cancelar"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('titulacion.update') }}" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <label for="tipoE" class="form-label">Tipo / Modalidad</label>
                        <input type="text" name="tipoE" id="tipoE" value="{{ $titulacion->tipo }}"
                            class="form-control @error('tipoE') is-invalid @enderror">
                        <div class="form-text" id="basic-addon4">
                            Este campo es requerido.
                        </div>
                        @if ($errors->has('tipoE'))
                            <span class="text-danger">{{ $errors->first('tipoE') }}</span>
                        @endif
                    </div>
                    <div class="mb-3 row">
                        <label for="descE" class="form-label">Descripción / Pasos</label>
                        <textarea class="form-control @error('descE') is-invalid @enderror" id="floatingTextarea" name="descE">{{ $titulacion->descripcion }}</textarea>
                        <div class="form-text" id="basic-addon4">Este campo es requerido. No debe exceder los 500
                            caracteres.
                        </div>
                        @if ($errors->has('descE'))
                            <span class="text-danger">{{ $errors->first('descE') }}</span>
                        @endif
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_titulacionE" id="id_titulacionE"
                    value="{{ $titulacion->id_titulacion }}">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>
