<?php
session_start();
require_once('Models/Inicio_Model.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];

    $datos = new Datos();

    if ($datos->authenticate($usuario, $contraseña)) {
        // Usuario autenticado
        $_SESSION['usuario'] = $usuario;
        header("Location: Inicio.php"); // Redirige a la página de inicio
    } else {
        // Usuario no autenticado
        echo "Nombre de usuario o contraseña incorrectos";
    }
}
?>


