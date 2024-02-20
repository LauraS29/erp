<?php
session_start();
include_once('Db/ConDb.php');

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

$Cod_cliente = $_GET['Cod_cliente'];

// Actualizar la información del cliente

$consulta = "UPDATE cliente SET 
    Nom_cliente = '{$_POST['Nom_cliente']}',
    Ap_cliente = '{$_POST['Ap_cliente']}',
    Tlf_cliente = '{$_POST['Tlf_cliente']}',
    Email_cliente = '{$_POST['Email_cliente']}',
    DNI_cliente = '{$_POST['DNI_cliente']}',
    Provincia = '{$_POST['Provincia']}',
    Localidad = '{$_POST['Localidad']}'
WHERE Cod_cliente = $Cod_cliente";

$resultado = mysqli_query($conexion, $consulta);

if (!$resultado) {
    die("Error al actualizar: " . mysqli_error($conexion));
}

// Redirigir a clientes1.php
header("Location: clientes1.php");
exit();

?>