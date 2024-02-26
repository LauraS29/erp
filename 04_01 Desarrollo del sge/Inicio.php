<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>

<body class="inicio fondo_inicio">
    <section class="contenedor_inicio">
        <div class="iniciar">
            <img src="./Assets/img/usuario.png" alt="">
            <h2>Inicio de sesión</h2>
            <form action="./Controllers/Inicio_Controller.php" method="post">
                <input type="email" name="usuario" placeholder="Correo" required>
                <input type="password" name="contraseña" placeholder="Contraseña" required>
                <div class="links">
                    <p><a href="#">¿Olvidaste la contraseña?</a></p>
                    <p><a href="registrar.php">Registrarse</a></p>
                </div>
                <!-- Mostrar el mensaje de error justo debajo del botón -->
                <?php if (!empty($errorMsg)) : ?>
                    <div class="error-msg">
                        <?php echo $errorMsg; ?>
                    </div>
                <?php endif; ?>
                <button type="submit" class="btn">Iniciar</button>
            </form>
        </div>
    </section>
</body>
</html>
