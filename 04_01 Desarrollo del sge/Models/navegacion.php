<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="Assets/css/estilos.css">
</head>
<body>
<header class="header1">
        <div class="navegacion">
            <ul>
                <li>
                    <a href="clientes1.php">
                        <span class="flex alineado icono">
                            <img src="Assets/img/clientes.png" alt="">
                        </span>
                        <span class="flex alineado titulo negrita">Clientes</span>
                    </a>
                </li>    
                <li>
                    <a href="proveedores1.php">
                        <span class="flex alineado icono">
                            <img src="Assets/img/repartidor.png" alt="">
                        </span>
                        <span class="flex alineado titulo negrita">Proveedores</span>
                    </a>
                </li>
                <li>
                    <a href="personal1.php">
                        <span class="flex alineado icono">
                            <img src="Assets/img/personal.png" alt="">
                        </span>
                        <span class="flex alineado titulo negrita">Personal</span>
                    </a>
                </li>
                <li>
                    <a href="productos1.php">
                        <span class="flex alineado icono">
                            <img src="Assets/img/caja.png" alt="">
                        </span>
                        <span class="flex alineado titulo negrita">Productos</span>
                    </a>
                </li>
                <li>
                    <a href="ventas.php">
                        <span class="flex alineado icono">
                            <img src="Assets/img/venta.png" alt="">
                        </span>
                        <span class="flex alineado titulo negrita">Ventas</span>
                    </a>
                </li>
                <li>
                    <a href="compra1.php">
                        <span class="flex alineado icono">
                            <img src="Assets/img/compra.png" alt="">
                        </span>
                        <span class="flex alineado titulo negrita">Compra</span>
                    </a>
                </li>
                <li>
                    <a href="pedido1.php">
                        <span class="flex alineado icono">
                            <img src="Assets/img/pedido.png" alt="">
                        </span>
                        <span class="flex alineado titulo negrita">Pedidos</span>
                    </a>
                </li>
                <li>
                    <a href="empresa1.php">
                        <span class="flex alineado icono">
                            <img src="Assets/img/calendario.png" alt="">
                        </span>
                        <span class="flex alineado titulo negrita">Empresa</span>
                    </a>
                </li>
            </ul>
        </div>
    </header>
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