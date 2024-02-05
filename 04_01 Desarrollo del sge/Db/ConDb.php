<?php
// Conexión a la base de datos
$host = 'localhost';
$usuario = 'root';
$contraseña = '';
$base_Datos = 'trabajo';

/* mysqli_connect (se utiliza para establecer la conexión) */
$conexion = mysqli_connect($host, $usuario, $contraseña, $base_Datos);

/* verifica si la conexión fue exitosa. Si no, termina el script y muestra un mensaje de error */
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>
