
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
<body>
    <?php require_once "Controllers/registrar_Controller.php"; ?>
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
