<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Sinodal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <script>
        function addSinodal() {
            const sinodalesContainer = document.getElementById('sinodalesContainer');
            if (sinodalesContainer.children.length < 3) {  // Limita a 3 sinodales
                const newSinodalDiv = document.createElement('div');
                newSinodalDiv.className = 'sinodal-field mb-2';
                newSinodalDiv.innerHTML = `
                    <input type="text" name="sinodales[]" class="form-control mb-1" placeholder="Boleta del Sinodal de Trabajo terminal" required>
                    <button type="button" class="btn btn-danger" onclick="removeSinodal(this)">Eliminar</button>
                `;
                sinodalesContainer.appendChild(newSinodalDiv);
            } else {
                alert("Solo puedes agregar hasta 3 sinodales.");
            }
        }

        function removeSinodal(button) {
            const sinodalDiv = button.parentNode;
            sinodalDiv.parentNode.removeChild(sinodalDiv);
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h1>Agregar Sinodal</h1>
        <form action="{{ route('admin.addSinodales') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tt">Selecciona un Trabajo Terminal:</label>
                <select name="tt_id" id="tt" class="form-control">
                    @foreach ($trabajos as $trabajo)
                        <option value="{{ $trabajo->id_trabajoAcademico }}">{{ $trabajo->titulo }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div id="sinodalesContainer">
                <div class="sinodal-field mb-2">
                    <input type="text" name="sinodales[]" class="form-control mb-1" placeholder="Boleta del Sinodal de Trabajo terminal" required>
                </div>
            </div>
            <button type="button" class="btn btn-secondary" onclick="addSinodal()">Agregar Sinodal</button>
            <br><br>
            <button type="submit" class="btn btn-primary">Guardar Sinodales</button>
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
