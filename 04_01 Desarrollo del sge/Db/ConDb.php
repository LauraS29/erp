<?php
$host = 'localhost';
$usuario = 'admin';
$contraseña = 'madrid';
$base_Datos = 'trabajo';

$conexion = mysqli_connect($host, $usuario, $contraseña, $base_Datos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
