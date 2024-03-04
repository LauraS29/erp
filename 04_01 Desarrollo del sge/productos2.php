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
    <?php require_once "Views/Encabezado/Menu.php"; ?>
    
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/caja.png" alt="">
            <p class="medio">Productos</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de los productos</h2>
            </div>
            <form class="flex fondo_form" action="Controllers/productos/productos1_2Controller.php" method="post">
                <div class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre del producto:</p>
                            <input type="text" name="Nom_producto" required>
                        </div>
                        <div class="pr1">
                            <p>Precio del producto:</p>
                            <input type="text" name="Pre_producto" required>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Cantidad del producto:</p>
                            <input type="text" name="Cantidad_producto" required>
                        </div>
                    </div>
                </div>
                <div class="segundo_div imagen-botones">
                    <img src="Assets/img/caja.png" alt="">
                    <div class="buttons">
                        <div>
                            <input type="submit" name="guardar" id="boton1" value="Guardar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
