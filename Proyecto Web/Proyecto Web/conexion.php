<?php
$servername = "localhost";
$username = "root"; // El nombre de usuario por defecto de MySQL
$password = ""; // La contraseña por defecto de MySQL es vacía
$dbname = "portal_estudiantes";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
