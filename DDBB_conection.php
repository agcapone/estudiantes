<?php
$servername = "db"; // Cambia localhost por el nombre del servicio
$username = "user"; // Nombre de usuario de la base de datos
$password = "password"; // Contraseña del usuario
$dbname = "calificaciones_db"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
