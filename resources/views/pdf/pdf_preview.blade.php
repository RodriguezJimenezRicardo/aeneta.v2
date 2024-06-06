<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Previsualización de PDF</title>
</head>
<body>
    <div style="width: 800px; margin: 0 auto;">
        <h1>Previsualización de PDF</h1>
        <iframe src="{{ route('pdf.show', ['id' => $pdfDocument->id_trabajoAcademico]) }}" width="100%" height="600"></iframe>
    </div>
</body>
</html>
