<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>

<body class="inicio">

    <section class="contenedor_inicio">
        <div class="iniciar">
            <img src="./Assets/img/usuario.png" alt="">
            <h2>Inicio de sesión</h2>
            <form action="menuprinc.php" method="post" onsubmit="return onSubmitForm()">
                <input type="text" name="correo" placeholder="Correo">
                <input type="password" name="contrasena" placeholder="Contraseña">
                <div class="links">
                    <p><a href="#">¿Olvidaste la contraseña?</a></p>
                    <p><a href="#">Registrarse</a></p>
                </div>
                <button type="submit" class="btn">Iniciar</button>
            </form>

        </div>

        <p>------------------------ o ------------------------</p>
    </section>

    
</body>
</html>

<!-- PHP -->

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Obtén los datos del formulario
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

    // Validar el correo y la contraseña si es necesario
    // Aquí deberías realizar una validación adecuada antes de redirigir

    // Redirige a menuprinc.php
    header("Location: menuprinc.php");
    exit(); // Asegura que no se procese nada más después de la redirección
}
?>