<?php
mysqli_report(MYSQLI_REPORT_OFF); // o MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT si prefieres excepciones

$host = getenv('DB_HOST') ?: 'estudiantes-mysql';
$db   = getenv('DB_NAME') ?: 'formulario_db';
$user = getenv('DB_USER') ?: 'app';
$pass = getenv('DB_PASS') ?: 'app';

$conn = @new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die('Conexión fallida: ' . $conn->connect_error . " (host=$host user=$user db=$db)");
}
$conn->set_charset('utf8mb4');
