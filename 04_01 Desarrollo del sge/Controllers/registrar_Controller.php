<?php
session_start();
require_once('Db/ConDb.php');
require_once('Models/registrar_Model.php');

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