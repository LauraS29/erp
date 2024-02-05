<?php
session_start();
include_once('Db/ConDb.php');

$Nombre_producto = '';
$Precio_producto = '';
$Cantidad_producto = '';
$readonly = '';

// Obtener datos del producto para editar si se proporciona un ID
$productoId = isset($_GET['codigo']) ? $_GET['codigo'] : null;

if ($productoId) {
    $consultaProducto = "SELECT * FROM productos WHERE Cod_producto = $productoId";
    $resultadoProducto = mysqli_query($conexion, $consultaProducto);

    if (!$resultadoProducto) {
        die("Error al obtener datos del producto: " . mysqli_error($conexion));
    }

    // Verificar si se encontraron datos del producto
    if ($rowProducto = mysqli_fetch_assoc($resultadoProducto)) {
        // Datos del producto
        $Nombre_producto = $rowProducto['Nombre_producto'];
        $Precio_producto = $rowProducto['Precio_producto'];
        $Cantidad_producto = $rowProducto['Cantidad_producto'];

        // Agregar readonly solo para las columnas específicas
        $readonly = "readonly";
    } else {
        // Manejar el caso en que no se encuentren datos del producto
        die("Producto no encontrado");
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
    <?php require_once "Views/encabezado.php"; ?>
    
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/caja.png" alt="">
            <p class="medio">Productos</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de los productos</h2>
            </div>
            <form class="flex fondo_form" action="productos2.php?codigo=<?php echo $productoId; ?>" method="post">
                <div class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre del producto:</p>
                            <input type="text" name="Nombre_producto" value="<?php echo $Nombre_producto; ?>" <?php echo $readonly; ?>>
                        </div>
                        <div class="pr1">
                            <p>Precio del producto:</p>
                            <input type="text" name="Precio_producto" value="<?php echo $Precio_producto; ?>" <?php echo $readonly; ?>>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Cantidad del producto:</p>
                            <input type="text" name="Cantidad_producto" value="<?php echo $Cantidad_producto; ?>" <?php echo $readonly; ?>>
                        </div>
                    </div>
                </div>
                <div class="segundo_div imagen-botones">
                    <img src="Assets/img/caja.png" alt="">
                    <div class="buttons">
                        <div>
                            <input type="submit" name="guardar" id="boton1" value="Guardar" <?php echo $readonly; ?>>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
