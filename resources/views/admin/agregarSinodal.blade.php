@extends('layouts.base', ['navbar' => true])
<script>
    function addSinodal() {
        const sinodalesContainer = document.getElementById('sinodalesContainer');
        const newSinodalDiv = document.createElement('div');
        newSinodalDiv.className = 'input-group mb-3';
        newSinodalDiv.innerHTML = `
            <select name="sinodales[]" class="form-control sinodal-select" required onchange="updateOptions()">
                <option value="" disabled selected>Selecciona un Sinodal</option>
                @foreach ($docentes as $docente)
                    <option value="{{ $docente->id_docente }}">{{ $docente->nombre }} ({{ $docente->id_docente }})</option>
                @endforeach
            </select>
            <button type="button" class="btn btn-danger" onclick="removeSinodal(this)">Eliminar</button>
        `;
        sinodalesContainer.appendChild(newSinodalDiv);
        updateOptions(); // Update options when a new select is added
    }

    function removeSinodal(button) {
        const sinodalDiv = button.parentNode;
        sinodalDiv.parentNode.removeChild(sinodalDiv);
        updateOptions(); // Update options when a select is removed
    }

    function updateOptions() {
        const selects = document.querySelectorAll('.sinodal-select');
        const selectedValues = Array.from(selects).map(select => select.value).filter(value => value);

        selects.forEach(select => {
            const options = select.querySelectorAll('option');
            options.forEach(option => {
                if (selectedValues.includes(option.value) && option.value !== select.value) {
                    option.disabled = true;
                } else {
                    option.disabled = false;
                }
            });
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        updateOptions(); // Initial update on page load
    });
</script>
@section('content')
<div class="container mt-5" style="background-color: #bdd1de;">
    <h1>Agregar Sinodal</h1>
    <form action="{{ route('admin.addSinodales') }}" method="POST">
        @csrf
        <div class="form-group" style="background-color: #e4ebf0;">
            <label for="tt">Selecciona un Trabajo Terminal:</label>
            <select name="tt_id" id="tt" class="form-control">
                @foreach ($trabajos as $trabajo)
                    <option value="{{ $trabajo->id_trabajoAcademico }}">{{ $trabajo->titulo }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div id="sinodalesContainer" class="mb-3" style="background-color: #e4ebf0;" >
            <label for="sinodales" class="form-label">Sinodales</label>
            <div class="input-group mb-3">
                <select name="sinodales[]" class="form-control sinodal-select" required onchange="updateOptions()">
                    <option value="" disabled selected>Selecciona un Sinodal</option>
                    @foreach ($docentes as $docente)
                        <option value="{{ $docente->id_docente }}">{{ $docente->nombre }} ({{ $docente->id_docente }})</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="button" class="btn btn-secondary mb-3" onclick="addSinodal()">Agregar Sinodal</button>
        <br><br>
        <button type="submit" class="btn btn-primary">Guardar Sinodales</button>
    </form>
</div>
<footer class="faq-footer" style="margin-top: 100px;">
    <p>&copy; 2024 Challenge team</p>
</footer>
@endsection