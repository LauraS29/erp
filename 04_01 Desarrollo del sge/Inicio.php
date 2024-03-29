<?php
session_start();

require_once('Db/ConDb.php'); 

$mysqli = Connection::conn1();

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Obtén los datos del formulario
    $correo = isset($_POST['usuario']) ? $_POST['usuario'] : '';
    $contrasena = isset($_POST['contraseña']) ? $_POST['contraseña'] : '';

    // Validar que ambos campos estén completos
    if (empty($correo) || empty($contrasena)) 
    {
        $errorMsg = "Ambos campos (correo y contraseña) son obligatorios.";
    } else {
        // Validar el formato del correo electrónico
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) 
        {
            $errorMsg = "Formato de correo electrónico no válido.";
        } else {
           
            $sql = "SELECT Nom_usuario, Contraseña_usuario FROM Usuarios WHERE Email_usuario = '$correo'";
            $resultado = mysqli_query($mysqli, $sql); 

            if ($resultado && mysqli_num_rows($resultado) > 0) 
            {
                $row = mysqli_fetch_assoc($resultado);
                $hashContrasena = $row['Contraseña_usuario'];

                // Verificar la contraseña
                if (password_verify($contrasena, $hashContrasena)) 
                {
                    $_SESSION['UsuarioNombre'] = $row['Nom_usuario'];

                    // Redirige a index.php solo si la autenticación es exitosa
                    header("Location: menuprinc.php");
                    // Asegura que no se procese nada más después de la redirección
                    exit(); 
                } else {
                    $errorMsg = "Contraseña incorrecta";
                }
            } else {
                $errorMsg = "Usuario no encontrado";
            }
        }
    }
}
?>


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

            <form action="Inicio.php" method="post" onsubmit="return onSubmitForm()">

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
