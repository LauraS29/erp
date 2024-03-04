<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body class = "flex">
    <?php require_once "Views/Encabezado/Menu.php"; ?>
    
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/personal.png" alt="">
            <p class ="medio">Personal</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos del personal</h2>
            </div>
            <div class="fondo_form">
                <?php require_once "Views/busquedas/busqueda_personal.php"; ?> 
                <form action="personal2.php" method="post">
                    <table>
                        <div class="tabla">
                            <tr>
                                <th>Cód.Empleado</th>
                                <th>Nombre</th>
                                <th>Teléfono contacto</th>
                                <th></th>
                            </tr>

                            <?php require_once "Controllers/personal/personal1_1Controller.php"; ?>

                        </div>
                    </table>
                    <div class="button_prov">
                        <input type="submit" name="add_proveedor" value="Añadir">
                    </div>
                </form>
            </div>

        </div>
    </section>
</body>
</html>