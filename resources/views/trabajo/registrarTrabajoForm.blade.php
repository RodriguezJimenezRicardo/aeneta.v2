<script>
        function addIntegrante() {
            const integrantesContainer = document.getElementById('integrantesContainer');
            const newIntegranteDiv = document.createElement('div');
            newIntegranteDiv.className = 'integrante-field';
            newIntegranteDiv.innerHTML = `
                <input type="text" name="integrantes[]" placeholder="Boleta del Integrante de Trabajo terminal">
                <button type="button" onclick="removeIntegrante(this)">Eliminar</button>
            `;
            integrantesContainer.appendChild(newIntegranteDiv);
        }

        function removeIntegrante(button) { 
            const integranteDiv = button.parentNode;
            integranteDiv.parentNode.removeChild(integranteDiv);
        }
    </script>

h1>Registrar Trabajo Academico nuevo</h1>

<form action="{{ route('RegistrarTrabajo') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="tipoTrabajoAcademico" placeholder="Tipo de Trabajo Academico">
    <input type="text" name="titulo" placeholder="Título del Trabajo Academico">
    <input type="text" name="descripcion" placeholder="Breve descripcion del trabajo academico ">
    <input type="date" name="fechaInicio" placeholder="Fecha Inicio">
    <input type="text" name="area" placeholder="Area">
    <div id="integrantesContainer">
        <input type="text" name="integrantes[]" placeholder="Boleta del Integrante de Trabajo terminal">
    </div>
    <button type="button" onclick="addIntegrante()">Agregar Integrante</button>
    <br><br>
    <input type="file" name="pdf_file">
    <button type="submit">PDF de la solicitud</button>
</form>
