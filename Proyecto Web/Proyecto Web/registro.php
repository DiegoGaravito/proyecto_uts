<?php
// Incluir el archivo de conexión a la base de datos
include('conexion.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $jornada = $_POST['jornada'];

    // Encriptar la contraseña antes de almacenarla (opcional, pero recomendable)
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $carrera = "Desarrollo de sistemas informáticos";  // Valor predeterminado para la carrera
    $estado = "Activo";

    // Insertar los datos en la base de datos
    $sql = "INSERT INTO usuarios (username, email, password, carrera, estado, jornada)
           VALUES ('$username', '$email', '$password_hash', '$carrera', '$estado', '$jornada')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="registro.css" />
    <link rel="icon" href="img/iconUTS.png" type="image/png">
  </head>
  <body class="registro-page">
    <div class="container">
      <div class="registro-container">
        <!-- Logo UTS -->
        <img src="img/LogoUTS.png" width="50px" alt="Logo UTS" class="logo">
      </div>
      <h2>Registro</h2>
      <!-- Formulario de registro -->
      <form method="POST" action="registro.php">
        <label for="username">Nombre de usuario:</label>
        <input type="text" id="username" name="username" required />

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required />

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required />

        <label for="jornada">Jornada:</label>
          <select id="jornada" name="jornada">
            <option value="Diurna" selected>Diurna</option>
            <option value="Nocturna">Nocturna</option>
          </select>


        <button type="submit">Registrarse</button>
      </form>
    </div>

    <script src="script.js"></script>
  </body>
</html>
