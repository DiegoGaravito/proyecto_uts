<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include('conexion.php');

// Obtener el ID del usuario de la sesión
$user_id = $_SESSION['user_id'];

// Consultar los datos del usuario
$sql = "SELECT * FROM usuarios WHERE id = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "No se encontraron datos del usuario.";
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del Estudiante</title>
    <link rel="stylesheet" href="perfil.css">
    <link rel="icon" href="img/iconUTS.png" type="image/png">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="img/LogoUTS.png" width="110px" alt="Logo UTS" class="logo">
            <h1>Portal de Estudiantes UTS</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="perfil.php" class="active">Perfil</a></li>
                <li><a href="noticias.html">Noticias</a></li>
                <li><a href="asignaturas.html">Gestión Académica</a></li>
                <li><a href="login.php">Iniciar sesión</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section class="perfil-container">
            <div class="perfil-header" style="background-color: <?php echo $user['background_color'] ?? '#108b2b'; ?>;">
                <div class="foto-perfil">
                    <?php if (!empty($user['foto_perfil'])): ?>
                        <img src="<?php echo $user['foto_perfil']; ?>" alt="Foto de perfil">
                    <?php else: ?>
                        <div class="foto-placeholder"></div>
                    <?php endif; ?>
                </div>
                <h2 id="nombre-estudiante"><?php echo $user['username']; ?></h2>
                <p class="email">
                    <img src="img/correo-icon.png" alt="Correo Icono">
                    <span id="correo-estudiante"><?php echo $user['email']; ?></span>
                </p>
            </div>

            <div class="perfil-info">
                <div class="info-item">
                    <h3>Jornada</h3>
                    <p id="jornada-estudiante"><?php echo $user['jornada']; ?></p>
                </div>
                <div class="info-item">
                    <h3>Carrera</h3>
                    <p id="carrera-estudiante"><?php echo $user['carrera']; ?></p>
                </div>
                <div class="info-item">
                    <h3>Estado</h3>
                    <p id="estado-estudiante"><?php echo $user['estado']; ?></p>
                </div>
            </div>

            <!-- Formulario para editar la foto y el fondo -->
            <div class="editar-perfil">
                <form action="actualizar_perfil.php" method="POST" enctype="multipart/form-data">
                    <label for="foto-perfil">Foto de perfil:</label>
                    <input type="file" name="foto_perfil" id="foto-perfil" accept="image/*">

                    <label for="background-perfil">Color o imagen de fondo:</label>
                    <input type="color" name="background_color" id="background-perfil" value="<?php echo $user['background_color'] ?? '#108b2b'; ?>">

                    <button type="submit" class="guardar-cambios-btn">Guardar Cambios</button>
                </form>
            </div>

            <!-- Botón para cerrar sesión -->
            <div class="cerrar-sesion-container">
                <a href="logout.php" class="cerrar-sesion-btn">Cerrar sesión</a>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 UTS. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
