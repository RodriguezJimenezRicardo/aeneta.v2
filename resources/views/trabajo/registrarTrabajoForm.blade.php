<script>
        function addIntegrante() {
            const integrantesContainer = document.getElementById('integrantesContainer');
            const newIntegranteDiv = document.createElement('div');
            newIntegranteDiv.className = 'integrante-field';
            newIntegranteDiv.innerHTML = `
                <input type="text" class="form-control" name="integrantes[]" placeholder="Boleta del Integrante de Trabajo terminal">
                <br>
                <button type="button" class="btn btn-danger" onclick="removeIntegrante(this)">Eliminar</button>
            `;
            integrantesContainer.appendChild(newIntegranteDiv);
        }

        function removeIntegrante(button) { 
            const integranteDiv = button.parentNode;
            integranteDiv.parentNode.removeChild(integranteDiv);
        }
    </script>


@extends('layouts.baseUser', ['navbar' => true,'id_estudiante' => $estudiante->id_estudiante])

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Registrar Trabajo Academico Nuevo</h1>
    <form action="{{ route('estudiante.RegistrarTrabajo',['id_estudiante' => $estudiante->id_estudiante] ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="tipoTrabajoAcademico" class="form-label">Tipo de Trabajo Academico</label>
            <input type="text" class="form-control" id="tipoTrabajoAcademico" name="tipoTrabajoAcademico" placeholder="Tipo de Trabajo Academico" required>
        </div>
        <div class="mb-3">
            <label for="titulo" class="form-label">Título del Trabajo Academico</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título del Trabajo Academico" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Breve Descripción del Trabajo Academico</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Breve descripcion del trabajo academico" required>
        </div>
        <div class="mb-3">
            <label for="fechaInicio" class="form-label">Fecha de Inicio</label>
            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
        </div>
        <div class="mb-3">
            <label for="area" class="form-label">Área</label>
            <input type="text" class="form-control" id="area" name="area" placeholder="Área" required>
        </div>
        <div id="integrantesContainer" class="mb-3">
            <label class="form-label">Integrantes</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="integrantes[]" value="{{ $estudiante->id_estudiante }}" readonly required>
            </div>
        </div>
        <button type="button" class="btn btn-success mb-3" onclick="addIntegrante()">Agregar Integrante</button>
        <div class="mb-3">
            <label for="pdf_file" class="form-label">PDF de la Solicitud</label>
            <input type="file" class="form-control" id="pdf_file" name="pdf_file" required>
        </div>
        <button type="submit" class="btn btn-primary">Registrar Trabajo</button>
    </form>
</div>
@endsection