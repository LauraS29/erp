<?php
session_start();
// Base de datos
require_once('Db/ConDb.php');

require_once('Models/Inicio_Model.php');

// Verifica si la conexión se estableció correctamente
if (!$mysqli) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}

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
            // Realiza la consulta para obtener el nombre del usuario
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

<!-- <?php
require_once('Db/ConDb.php');

require_once('Models/Inicio_Model.php');

class UserController {
    // Método para mostrar el formulario de inicio de sesión
    public function showLoginForm() {
        require('Inicio.php');
    }

    // Método para procesar el inicio de sesión
    public function login() {
        // Verifica si se han enviado datos de inicio de sesión
        if(isset($_POST['usuario']) && isset($_POST['contraseña'])) {
            $usuario = $_POST['usuario'];
            $contraseña = $_POST['contraseña'];

            // Instancia del modelo User
            $data = new Data();

            // Verifica las credenciales del usuario
            if($data->authenticate($usuario, $contraseña)) {
                // Inicio de sesión exitoso
                echo "Inicio de sesión exitoso";
            } else {
                // Inicio de sesión fallido
                echo "Nombre de usuario o contraseña incorrectos";
            }
        } else {
            echo "Por favor, ingrese nombre de usuario y contraseña";
        }
    }
}

?> -->
