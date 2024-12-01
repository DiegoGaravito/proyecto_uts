<?php
session_start();

// Eliminar todos los datos de la sesión
session_unset();

// Destruir la sesión
session_destroy();

// Redirigir al usuario al login
header("Location: login.php");
exit();
?>
