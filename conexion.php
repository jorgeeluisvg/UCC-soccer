<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "admin";
$dbname = "bd_ed";

// Conexión a la base de datos
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificación de conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
?>