<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body class = "flex">
    <?php require_once "Views/Encabezado/Menu.php"; ?>

    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/venta.png" alt="">
            <p class ="medio">Ventas</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de las ventas</h2>
            </div>
            <form class="fondo_form" action="venta.php" method="post">
                <table>
                    <th>Cód.Venta</th>
                    <th>Nom.cliente</th>
                    <th>Dni</th>
                    <th></th>

                </table>
                <div class="button_prov">
                    <input class="negrita" type="submit" name="add_proveedor" value="Añadir">
                </div>
            </form>
        </div>
    </section>
</body>
</html>

