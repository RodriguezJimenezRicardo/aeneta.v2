<script>
    function addSinodal() {
        const sinodalesContainer = document.getElementById('sinodalesContainer');
        const sinodalesCount = sinodalesContainer.getElementsByClassName('sinodal-field').length;
        if (sinodalesCount < 3) {
            const newSinodalDiv = document.createElement('div');
            newSinodalDiv.className = 'sinodal-field';
            newSinodalDiv.innerHTML = `
                <input type="text" class="form-control" name="sinodales[]" placeholder="Boleta del Sinodal de Trabajo Terminal" required>
                <button type="button" class="btn btn-danger" onclick="removeSinodal(this)">Eliminar</button>
            `;
            sinodalesContainer.appendChild(newSinodalDiv);
        } else {
            alert('Solo puedes agregar hasta 3 sinodales.');
        }
    }

    function removeSinodal(button) {
        const sinodalDiv = button.parentNode;
        sinodalDiv.parentNode.removeChild(sinodalDiv);
    }

    function addIntegrante() {
        const integrantesContainer = document.getElementById('integrantesContainer');
        const integrantesCount = integrantesContainer.getElementsByClassName('integrante-field').length;
        if (integrantesCount < 5) {
            const newIntegranteDiv = document.createElement('div');
            newIntegranteDiv.className = 'integrante-field';
            newIntegranteDiv.innerHTML = `
                <input type="text" class="form-control" name="integrantes[]" placeholder="Boleta del Integrante de Trabajo Terminal" required>
                <button type="button" class="btn btn-danger" onclick="removeIntegrante(this)">Eliminar</button>
            `;
            integrantesContainer.appendChild(newIntegranteDiv);
        } else {
            alert('Solo puedes agregar hasta 5 integrantes.');
        }
    }

    function removeIntegrante(button) { 
        const integranteDiv = button.parentNode;
        integranteDiv.parentNode.removeChild(integranteDiv);
    }
</script>
@extends('layouts.base', ['navbar' => true])


@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Subir Trabajo Academico Terminado</h1>
    <form action="{{ route('admin.SubirTerminado') }}" method="POST" enctype="multipart/form-data">
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
            <label for="descripcion" class="form-label">Descripción del Trabajo Academico</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción del Trabajo Academico" required>
        </div>
        <div class="mb-3">
            <label for="fechaInicio" class="form-label">Fecha Inicio</label>
            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
        </div>
        <div class="mb-3">
            <label for="fechaFinal" class="form-label">Fecha Final</label>
            <input type="date" class="form-control" id="fechaFinal" name="fechaFinal" required>
        </div>
        <div class="mb-3">
            <label for="area" class="form-label">Área</label>
            <input type="text" class="form-control" id="area" name="area" placeholder="Área" required>
        </div>
        <div class="mb-3">
            <label for="director" class="form-label">Director de Trabajo Terminal</label>
            <input type="text" class="form-control" id="director" name="director" placeholder="Director de Trabajo Terminal" required>
        </div>
        <div class="mb-3" id="sinodalesContainer">
            <label class="form-label">Sinodales</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="sinodales[]" placeholder="Boleta del Sinodal de Trabajo Terminal" required>
                <button type="button" class="btn btn-danger" onclick="removeSinodal(this)">Eliminar</button>
            </div>
        </div>
        <button type="button" class="btn btn-secondary mb-3" onclick="addSinodal()">Agregar Sinodal</button>
        <div class="mb-3" id="integrantesContainer">
            <label class="form-label">Integrantes</label>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="integrantes[]" placeholder="Boleta del Integrante de Trabajo Terminal" required>
                <button type="button" class="btn btn-danger" onclick="removeIntegrante(this)">Eliminar</button>
            </div>
        </div>
        <button type="button" class="btn btn-secondary mb-3" onclick="addIntegrante()">Agregar Integrante</button>
        <div class="mb-3">
            <label for="pdf_file" class="form-label">PDF de la Solicitud</label>
            <input type="file" class="form-control" id="pdf_file" name="pdf_file" required>
        </div>
        <button type="submit" class="btn btn-primary">Subir PDF</button>
    </form>
</div>
@endsection
