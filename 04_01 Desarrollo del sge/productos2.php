<?php
$host = 'localhost';
$usuario = 'admin';
$contraseña = 'madrid';
$base_Datos = 'trabajo';

$conexion = mysqli_connect($host, $usuario, $contraseña, $base_Datos);

if (!$conexion) 
{
    die("Error de conexión: " . mysqli_connect_error());
}

$Nombre_producto = '';
$Precio_producto = '';
$Cantidad_producto = '';
$readonly = '';

$productoId = isset($_GET['codigo']) ? $_GET['codigo'] : null;
$modoEditar = isset($_GET['modo']) && $_GET['modo'] === 'editar';

if ($productoId && $modoEditar) 
{
    // Realizar la consulta para obtener los datos del producto
    $consultaProducto = "SELECT * FROM Productos WHERE Cod_producto = $productoId";
    $resultadoProducto = mysqli_query($conexion, $consultaProducto);

    if (!$resultadoProducto) 
    {
        die("Error al obtener datos del producto: " . mysqli_error($conexion));
    }

    if ($rowProducto = mysqli_fetch_assoc($resultadoProducto)) 
    {
        $Nombre_producto = $rowProducto['Nombre_producto'];
        $Precio_producto = $rowProducto['Precio_producto'];
        $Cantidad_producto = $rowProducto['Cantidad_producto'];

        $readonly = "readonly";
    } 
    else 
    {
        die("Producto no encontrado");
    }
}

if (isset($_POST['guardar'])) 
{
    $Nombre_producto = $_POST['Nombre_producto'];
    $Precio_producto  = $_POST['Precio_producto'];
    $Cantidad_producto = $_POST['Cantidad_producto'];

    if ($productoId) 
    {
        $actualizarDatos = "UPDATE Productos SET Nombre_producto='$Nombre_producto', Precio_producto='$Precio_producto', Cantidad_producto='$Cantidad_producto' WHERE Cod_producto = $productoId";

        $ejecutarActualizar = mysqli_query($conexion, $actualizarDatos);

        if (!$ejecutarActualizar) 
        {
            die("Error al actualizar datos: " . mysqli_error($conexion));
        }

        // Redirigir a productos1.php después de actualizar
        header("Location: productos1.php");
        exit();
    } 
    else 
    {
        // Manejar la inserción de un nuevo producto
        $insertarDatos = "INSERT INTO Productos (Nombre_producto, Precio_producto, Cantidad_producto) VALUES ('$Nombre_producto', '$Precio_producto', '$Cantidad_producto')";

        $ejecutarInsertar = mysqli_query($conexion, $insertarDatos);

        if (!$ejecutarInsertar) 
        {
            die("Error al insertar datos: " . mysqli_error($conexion));
        }

        $lastInsertId = mysqli_insert_id($conexion);

        // Redirigir a productos1.php después de insertar
        header("Location: productos1.php?id=$lastInsertId");
        exit();
    }
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
<body class="flex">
    <header class="header2">
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
            <form class="flex fondo_form" action="productos2.php?codigo=<?php echo $productoId; ?>&modo=editar" method="post">
                <div class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre del producto:</p>
                            <input type="text" name="Nombre_producto" value="<?php echo $Nombre_producto; ?>" <?php echo $modoEditar ? '' : 'readonly'; ?>>
                        </div>
                        <div class="pr1">
                            <p>Precio del producto:</p>
                            <input type="text" name="Precio_producto" value="<?php echo $Precio_producto; ?>" <?php echo $modoEditar ? '' : 'readonly'; ?>>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Cantidad del producto:</p>
                            <input type="text" name="Cantidad_producto" value="<?php echo $Cantidad_producto; ?>" <?php echo $modoEditar ? '' : 'readonly'; ?>>
                        </div>
                    </div>
                </div>
                <div class="segundo_div imagen-botones">
                    <img src="Assets/img/caja.png" alt="">
                    <div class="buttons">
                        <div>
                            <?php if ($modoEditar) : ?>
                                <input type="submit" name="guardar" id="boton1" value="Guardar">
                            <?php else : ?>
                                <span>Modo de visualización</span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
