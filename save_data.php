<?php
include 'DDBB_conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $calificacion = $_POST['calificacion'];

    // Validar los datos
    if (!empty($nombre) && !empty($calificacion)) {
        // Insertar datos en la base de datos
        $sql = "INSERT INTO estudiantes (nombre, calificacion) VALUES ('$nombre', '$calificacion')";

        if ($conn->query($sql) === TRUE) {
            echo "Datos guardados correctamente.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Por favor, complete todos los campos.";
    }

    $conn->close();
}
?>

<br><br>
<a href="index.php">Volver al formulario</a>
