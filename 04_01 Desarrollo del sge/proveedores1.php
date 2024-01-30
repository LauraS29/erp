<?php
// Conexión a la base de datos
$host = 'localhost';
$usuario = 'admin';
$contraseña = 'madrid';
$base_Datos = 'trabajo';

$conexion = mysqli_connect($host, $usuario, $contraseña, $base_Datos);

if (!$conexion) 
{
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta a la base de datos
$sqlProveedores = "SELECT * FROM proveedores";
$resultadoProveedores = mysqli_query($conexion, $sqlProveedores);

if (!$resultadoProveedores) 
{
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body class = "flex">
    <header class="header2">
        <div class="navegacion">
            <a href="clientes1.php">Clientes</a><br>
            <a class="negrita" href="proveedores1.php">Proveedores</a><br>
            <a href="personal1.php">Personal</a><br>
            <a href="productos1.php">Productos</a><br>
            <a href="ventas.php">Ventas</a><br>
            <a href="compra1.php">Compra</a><br>
            <a href="pedido1.php">Pedidos</a><br>
            <a href="empresa1.php">Empresa</a><br>
        </div>
    </header>
    <section class="fondo_section">
        <div class="flex1">
            <div class="flex">
                <img src="Assets/img/repartidor.png" alt="">
                <p class ="medio">Proveedores</p>
            </div>
            <div>
                <img src="Assets/img/ayudar.png" alt="">
                <a href="Inicio.php">
                    <img class="mg" src="Assets/img/cerrar-sesion.png" alt="">
                </a>
            </div>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de proveedores</h2>
            </div>
            <form class="fondo_form" action="proveedores1.php" method="post">
                <table>
                    <div class="tabla">
                        <tr>
                            <th>Código</th>
                            <th>Proveedores</th>
                            <th>Teléfono</th>
                        </tr> 
                    
                        <?php
                        // Bucle para mostrar los datos de proveedores
                        /* Verifica que $resultadoProveedores sea válido */
                        while ($row = mysqli_fetch_assoc($resultadoProveedores)) 
                        {
                        ?>
                            <tr>
                                <td><?php echo $row['Cod_proveedor']; ?></td>
                                <td><a href="proveedores2.php?codigo=<?php echo $row['Cod_proveedor']; ?>&modo=editar"><?php echo $row['Nombre_proveedor']; ?></a></td>
                                <td><?php echo $row['Telefono_proveedor']; ?></td>
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

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

    header("Location: proveedores2.php");
    exit();
}
?>

