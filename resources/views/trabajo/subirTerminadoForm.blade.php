<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Trabajo Academico Terminado</title>
    <script>
        function addSinodal() {
            const sinodalesContainer = document.getElementById('sinodalesContainer');
            const sinodalesCount = sinodalesContainer.getElementsByClassName('sinodal-field').length;
            if (sinodalesCount < 3) {
                const newSinodalDiv = document.createElement('div');
                newSinodalDiv.className = 'sinodal-field';
                newSinodalDiv.innerHTML = `
                    <input type="text" name="sinodales[]" placeholder="Boleta del Sinodal de Trabajo terminal">
                    <button type="button" onclick="removeSinodal(this)">Eliminar</button>
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
                    <input type="text" name="integrantes[]" placeholder="Boleta del Integrante de Trabajo terminal">
                    <button type="button" onclick="removeIntegrante(this)">Eliminar</button>
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
</head>
<body>
    <h1>Subir Trabajo Academico Terminado</h1>
    <form action="{{ route('SubirTerminado') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="tipoTrabajoAcademico" placeholder="Tipo de Trabajo Academico">
        <input type="text" name="titulo" placeholder="Título del Trabajo Academico">
        <input type="text" name="descripcion" placeholder="Descripcion del Trabajo Academico">
        <input type="date" name="fechaInicio" placeholder="Fecha Inicio">
        <input type="date" name="fechaFinal" placeholder="Fecha Final">
        <input type="text" name="area" placeholder="Area">
        <input type="text" name="director" placeholder="Director de Trabajo terminal">
        <div id="sinodalesContainer">
            <input type="text" name="sinodales[]" placeholder="Boleta del Sinodal de Trabajo terminal">
        </div>
        <button type="button" onclick="addSinodal()">Agregar Sinodal</button>
        <br><br>
        <div id="integrantesContainer">
            <input type="text" name="integrantes[]" placeholder="Boleta del Integrante de Trabajo terminal">
        </div>
        <button type="button" onclick="addIntegrante()">Agregar Integrante</button>
        <br><br>
        <input type="file" name="pdf_file">
        <button type="submit">Subir PDF</button>
    </form>
</body>
</html>
