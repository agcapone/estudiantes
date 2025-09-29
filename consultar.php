<?php
include 'DDBB_conection.php';

$sql = "SELECT id, nombre, calificacion FROM estudiantes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Estudiantes</title>
</head>
<body>
    <h1>Lista de Estudiantes</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Calificación</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["nombre"]. "</td><td>" . $row["calificacion"]. "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No hay datos almacenados</td></tr>";
        }
        ?>

    </table>

    <br>
    <a href="index.php">Volver al formulario</a>
</body>
</html>

<?php
$conn->close();
?>
