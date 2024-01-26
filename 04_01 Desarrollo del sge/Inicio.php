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
                <input type="text" name="email" placeholder="Usuario /Correo">
                <input type="password" name="contrasena" placeholder="Contraseña">

                <a class= "flex links" href="#">¿Olvidaste la contraseña?</a>
                <button type="submit" class="btn" name="inicio">Iniciar</button>
            </form>

        </div>
    </section>
</body>
</html>

<!-- PHP -->
<?php

?>