<?php
session_start();
include_once('Db/ConDb.php');

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Hash de la contraseña (para mayor seguridad)
    $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO Usuarios (Nombre_usuario, Contraseña_usuario, Correo_usuario) VALUES ('$nombre', '$hash_contrasena', '$correo')";

    if ($conexion->query($sql) === TRUE) {
        echo "Usuario registrado con éxito.";
    } else {
        echo "Error al registrar el usuario: " . $conexion->error;
    }
}

// Cerrar la conexión
$conexion->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h2>Registro</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nombre">Usuario:</label>
        <input type="text" name="nombre" required>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" required>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>

        <button type="submit">Añadir</button>
    </form>
</body>
</html>
