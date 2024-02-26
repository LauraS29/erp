
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body class = "flex">
    <?php require_once "Views/Encabezado/Menu.php"; ?>
    
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/compra.png" alt="">
            <p class ="medio">Compra</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de las compras</h2>
            </div>
            <div class="fondo_form">
            <?php require_once "Views/busquedas/busqueda_compra.php"; ?>
            <form action="compra2.php" method="post">
                <table>
                    <div class="tabla">
                        <tr>
                            <th>Cód.Cliente</th>
                            <th>Nom.cliente</th>
                            <th>Dni</th>
                            <th></th>
                        </tr>                

                        <?php require_once "Controllers/compra1_1Controller.php"; ?>
                        <!-- <tr>
                            <td class="pequeño">
                                <a href="clientes2.php">
                                <img src="Assets/img/actualizar.png" alt="">
                                </a>
                                <img class="img_elim" src="Assets/img/eliminar.png" alt="">
                            </td>
                        </tr> -->
                    </div>   
                </table>
            </form>
        </div>
        </div>
        </div>
    </section>
</body>
</html>
