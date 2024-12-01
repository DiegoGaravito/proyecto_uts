<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - Portal de Estudiantes UTS</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="img/iconUTS.png" type="image/png">
</head>
<body class="login-page">
    <div class="login-container">
        <!-- Logo UTS -->
        <div class="logo-container2">
            <img src="img/LogoUTS.png" width="50px" alt="Logo UTS" class="logo">
        </div>
        
        <!-- Formulario de inicio de sesión -->
        <h2>Iniciar Sesión</h2>
        <form action="login_process.php" method="post">
            <label for="username">Usuario</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Ingresar</button>
        </form>
        <p><a href="registro.php">¿No tienes una cuenta? Regístrate aquí</a></p>
    </div>
</body>
</html>

