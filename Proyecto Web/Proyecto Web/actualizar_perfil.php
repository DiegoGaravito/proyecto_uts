<?php

session_start();

include('conexion.php');

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Inicializar variables para la foto de perfil y el color de fondo
$ruta_destino = null;
$background_color = null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Manejar la subida de la foto de perfil
    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == 0) {
        $foto = $_FILES['foto_perfil'];
        $extension = pathinfo($foto['name'], PATHINFO_EXTENSION);
        $nuevo_nombre = "foto_" . $user_id . "." . $extension;
        $ruta_destino = "img/perfiles/" . $nuevo_nombre;

        if (!move_uploaded_file($foto['tmp_name'], $ruta_destino)) {
            echo "Error al subir la foto de perfil.";
            exit();
        }
    }

    // Manejar el color de fondo
    if (isset($_POST['background_color'])) {
        $background_color = $_POST['background_color'];
    }

    // Construir la consulta SQL
    $set_clause = [];
    if ($ruta_destino) {
        $set_clause[] = "foto_perfil = '$ruta_destino'";
    }
    if ($background_color) {
        $set_clause[] = "background_color = '$background_color'";
    }

    if (!empty($set_clause)) {
        $sql = "UPDATE usuarios SET " . implode(", ", $set_clause) . " WHERE id = '$user_id'";
        if (!$conn->query($sql)) {
            echo "Error al actualizar el perfil: " . $conn->error;
            exit();
        }
    }
}

// Cerrar la conexión y redirigir de vuelta al perfil
$conn->close();
header("Location: perfil.php");
exit();
?>

