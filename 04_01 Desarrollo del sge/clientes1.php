<?php
session_start();
include_once('Db/ConDb.php');

// Consulta a la base de datos
$sqlCliente = "SELECT * FROM cliente";
$resultadoCliente = mysqli_query($conexion, $sqlCliente);

if (!$resultadoCliente) 
{
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body class = "flex">
    <header class = "header2">
        <div class="navegacion">
            <a class="negrita" href="clientes1.php">Clientes</a><br>
            <a href="proveedores1.php">Proveedores</a><br>
            <a href="personal1.php">Personal</a><br>
            <a href="productos1.php">Productos</a><br>
            <a href="ventas.php">Ventas</a><br>
            <a href="compra1.php">Compra</a><br>
            <a href="pedido1.php">Pedidos</a><br>
        </div>
    </header>
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/clientes.png" alt="">
            <p class ="medio">Clientes</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de clientes</h2>
            </div>
            <form class="fondo_form" action="clientes1.php" method="post">
            <table>
                <div class="tabla">
                        <tr>
                            <th>Cód.Cliente</th>
                            <th>Nom.cliente</th>
                            <th>Dni</th>
                        </tr> 
                    
                        <?php
                        // Bucle para mostrar los datos de proveedores
                        /* Verifica que $resultadoProveedores sea válido */
                        while ($row = mysqli_fetch_assoc($resultadoCliente)) 
                        {
                        ?>
                            <tr>
                                <td><?php echo $row['Cod_cliente']; ?></td>
                                <td><a href="clientes2.php?codigo=<?php echo $row['Cod_cliente']; ?>&modo=editar"><?php echo $row['Nom_cliente']; ?></a></td>
                                <td><?php echo $row['DNI_cliente']; ?></td>
                                <td class="pequeño">
                                    <div class="rect1">
                                        <img src="Assets/img/actualizar.png" alt="Actualizar">
                                    </div>
                                    <div class="rect2">
                                        <img src="Assets/img/eliminar.png" alt="Eliminar">
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                </div>
                    
                </table>
  
                <div class="button_prov">
                     <input type="submit" name="add_proveedor" value="Añadir">
                </div>
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