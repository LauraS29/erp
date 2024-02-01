<?php
session_start();
include_once('Db/ConDb.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body class = "flex">
    <header class = "header2">
        <div class="navegacion">
            <a href="clientes1.php">Clientes</a><br>
            <a href="proveedores1.php">Proveedores</a><br>
            <a href="personal1.php">Personal</a><br>
            <a href="productos1.php">Productos</a><br>
            <a class="negrita" href="ventas.php">Ventas</a><br>
            <a href="compra1.php">Compra</a><br>
            <a href="pedido1.php">Pedidos</a><br>
        </div>
    </header>
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/venta.png" alt="">
            <p class ="medio">Ventas</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de las ventas</h2>
            </div>
            <form class="fondo_form" action="venta.php" method="post">

            </form>
        </div>
    </section>
</body>
</html>

                <!------------PHP------------->
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

    header("Location: clientes2.php");
    exit();
}

?>