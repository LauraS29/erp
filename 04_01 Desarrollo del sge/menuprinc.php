<?php
session_start();
include_once('Db/ConDb.php');

// Verificar si el usuario está autenticado
if (!isset($_SESSION['UsuarioNombre'])) {
    header("Location: Inicio.php");
    exit();
}

$nombreUsuario = $_SESSION['UsuarioNombre'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú principal</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body class="fondo_section">
    <header class="flex espacio">
        <div class="left">
            <img src="Assets/img/usuario.png" alt="">
            <h2 class="mg">Hola, <?php echo $nombreUsuario; ?></h2>
        </div>
        <div class="right">
            <img src="Assets/img/ayudar.png" alt="">
            <a href="Inicio.php">
                <img class="mg" src="Assets/img/cerrar-sesion.png" alt="">
            </a>
        </div>
    </header>

    <section class="flex separacion">
    <div>
        <a href="clientes1.php">
            <img src="Assets/img/clientes.png" alt="">
            <p>Clientes</p>
        </a>
    </div>
    <div>
        <a href="proveedores1.php">
            <img src="Assets/img/repartidor.png" alt="">
            <p>Proveedores</p>
        </a>
    </div>
    <div>
        <a href="personal1.php">
            <img src="Assets/img/personal.png" alt="">
            <p>Personal</p>
        </a>
    </div>
    <div>
        <a href="productos1.php">
            <img src="Assets/img/caja.png" alt="">
            <p>Productos</p>
        </a>
    </div>
</section>

<section class="flex separacion">
    <div>
        <a href="ventas.php">
            <img src="Assets/img/venta.png" alt="">
            <p>Ventas</p>
        </a>
    </div>
    <div>
        <a href="compra1.php">
            <img src="Assets/img/compra.png" alt="">
            <p>Compras</p>
        </a>
    </div>
    <div>
        <a href="pedido1.php">
            <img src="Assets/img/pedido.png" alt="">
            <p>Pedidos</p>
        </a>
    </div>
    <div>
        <a href="empresa1.php">
            <img src="Assets/img/calendario.png" alt="">
            <p>Empresa</p>
        </a>
    </div>
</section>
    
</body>
</html>