<?php
session_start();
include_once('Db/ConDb.php');

// Consulta a la base de datos
$sqlProductos = "SELECT * FROM productos";
$resultadoProductos = mysqli_query($conexion, $sqlProductos);

if (!$resultadoProductos) 
{
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body class = "flex">
    <header class = "header2">
        <div class="navegacion">
            <a href="clientes1.php">Clientes</a><br>
            <a href="proveedores1.php">Proveedores</a><br>
            <a href="personal1.php">Personal</a><br>
            <a class="negrita" href="productos1.php">Productos</a><br>
            <a href="ventas.php">Ventas</a><br>
            <a href="compra1.php">Compra</a><br>
            <a href="pedido1.php">Pedidos</a><br>
        </div>
    </header>
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/caja.png" alt="">
            <p class ="medio">Productos</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de los productos</h2>
            </div>
            <form class="fondo_form" action="productos1.php" method="post">
                <table>
                    <div class="tabla">
                        <tr>
                            <th>Código</th>
                            <th>Nombre del Producto</th>
                            <th>Precio del Producto</th>
                            <th>Cantidad del Producto</th>
                        </tr> 
                    
                        <?php
                        while ($row = mysqli_fetch_assoc($resultadoProductos)) 
                        {
                        ?>
                            <tr>
                                <td><a href="productos2.php?codigo=<?php echo $row['Cod_producto']; ?>&modo=editar"><?php echo $row['Cod_producto']; ?></a></td>
                                <td><a href="productos2.php?codigo=<?php echo $row['Cod_producto']; ?>&modo=editar"><?php echo $row['Nombre_producto']; ?></a></td>
                                <td><a href="productos2.php?codigo=<?php echo $row['Cod_producto']; ?>&modo=editar"><?php echo $row['Precio_producto']; ?></a></td>
                                <td><a href="productos2.php?codigo=<?php echo $row['Cod_producto']; ?>&modo=editar"><?php echo $row['Cantidad_producto']; ?></a></td>
                                <td class="pequeño">
                                    <div class="rect1">
                                        <a href="productos2.php?codigo=<?php echo $row['Cod_producto']; ?>&modo=editar"><img src="Assets/img/actualizar.png" alt="Actualizar"></a>
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

    header("Location: productos2.php");
    exit();
}
?>