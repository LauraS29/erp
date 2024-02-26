<?php
session_start();
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
            $data = new Datos();

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

?>
