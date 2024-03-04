<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <script src="./../../Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./../../Assets/css/estilos.css">
</head>
<body class="flex">
    <?php require_once "../Encabezado/Menu.php"; ?>
   
    <section class="fondo_section">
        <div class="flex div1">
            <img src="./../../Assets/img/caja.png" alt="">
            <p class="medio">Productos</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de los productos</h2>
            </div>

            <?php require_once "./../../Controllers/productos/productos_actualizarController.php"; ?>

            <form class="flex fondo_form" action="actualizar_productos.php" method="post">
                <div class="primer_div">
                    <input type="hidden" value="<?php echo $id ?>" name="Cod_producto">
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre:</p>
                            <input type="text" name="Nom_producto" id="Nom_producto" value="<?php echo $nombre ?>">
                        </div>
                        <div class="pr1">
                            <p>Precio:</p>
                            <input type="text" name="Pre_producto" id="Pre_producto" value="<?php echo $precio ?>">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Cantidad:</p>
                            <input type="text" name="Cantidad_producto" id="Cantidad_producto" value="<?php echo $cantidad ?>">
                        </div>
                    </div>
                </div>
                <div class="segundo_div imagen-botones">
                    <img src="../../Assets/img/usuario.png" alt="">
                    <div class="buttons">
                        <div>
                            <input type="submit" name="actualizar" value="Actualizar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>


