<?php
session_start();
include_once('Db/ConDb.php');

// Obtener la conexión utilizando el método estático
$mysqli = Connection::conn1();

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];

    // Hash de la contraseña (para mayor seguridad)
    $hash_contrasena = password_hash($contrasena, PASSWORD_DEFAULT);

    // Insertar datos en la base de datos
    $sql = "INSERT INTO usuarios (Nom_usuario, Email_usuario, Contraseña_usuario) VALUES ('$nombre', '$email', '$hash_contrasena')";

    if ($mysqli->query($sql) === TRUE) {
        header("Location: Inicio.php");
        exit();
    } else {
        echo "Error al registrar el usuario: " . $mysqli->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <h2>Registrarse</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="nombre">Usuario:</label>
        <input type="text" name="nombre" required>

        <label for="email">Email:</label>
        <input type="email" name="email" required>

        <label for="contrasena">Contraseña:</label>
        <input type="password" name="contrasena" required>

        <button type="submit">Añadir</button>
    </form>
</body>
</html>
