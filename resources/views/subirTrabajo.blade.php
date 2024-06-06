<!DOCTYPE html>
<html>
<head>
    <title>Página para subir un trabajo</title>
</head>
<body>
    <h1>Página para subir un trabajo</h1>
    <form action="/upload" method="POST" enctype="multipart/form-data">
        <label for="file">Seleccionar archivo:</label>
        <input type="file" id="file" name="file" required><br><br>
        <input type="submit" value="Subir archivo">
    </form>
</body>
</html>