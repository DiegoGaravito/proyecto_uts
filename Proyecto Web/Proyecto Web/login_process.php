<?php
// Incluir el archivo de conexión a la base de datos
include('conexion.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Buscar el usuario en la base de datos
    $sql = "SELECT * FROM usuarios WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Si el usuario existe, verificar la contraseña
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Contraseña correcta, iniciar sesión (puedes usar sesiones para recordar al usuario)
            session_start();  // Iniciar sesión
            $_SESSION['user_id'] = $row['id'];  // Guardar el ID del usuario en la sesión
            $_SESSION['username'] = $row['username'];  // Guardar el nombre de usuario
            header("Location: perfil.php");  // Redirigir al perfil (o página de inicio)
            exit();
        } else {
            // Contraseña incorrecta
            echo "Contraseña incorrecta.";
        }
    } else {
        // Usuario no encontrado
        echo "Usuario no encontrado.";
    }

    // Cerrar la conexión
    $conn->close();
}
?>
