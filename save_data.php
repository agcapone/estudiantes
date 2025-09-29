<?php
require_once 'DDBB_conection.php';

$nombre = $_POST['nombre'] ?? '';
$calif  = isset($_POST['calificacion']) ? (int)$_POST['calificacion'] : null;

if ($nombre === '' || $calif === null) {
    http_response_code(400);
    die('Faltan campos requeridos: nombre y calificacion');
}

$stmt = $conn->prepare("INSERT INTO estudiantes (nombre, calificacion) VALUES (?, ?)");
$stmt->bind_param("si", $nombre, $calif);
$stmt->execute();

echo "OK";
