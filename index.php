<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Estudiantes</title>
</head>
<body>
    <h1>Ingresar Nombre y Calificación</h1>
    <form action="save_data.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="calificacion">Calificación:</label>
        <input type="number" id="calificacion" name="calificacion" required><br><br>

        <input type="submit" value="Guardar">
    </form>

    <br>
    <form action="consultar.php" method="GET">
        <input type="submit" value="Consultar">
    </form>
</body>
</html>

