<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="Assets/css/estilos.css">
</head>
<body>
    <?php require_once "Views/Encabezado/Menu.php"; ?>
    
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/clientes.png" alt="">
            <p class ="medio">Clientes</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de clientes</h2>
            </div>
        <div class="fondo_form">
            <?php require_once "Views/busqueda.php"; ?>
            <form action="clientes2.php" method="post">
                <table>
                    <div class="tabla">
                        <tr>
                            <th>Cód.Cliente</th>
                            <th>Nom.cliente</th>
                            <th>Dni</th>
                            <th></th>
                        </tr>                

                        <?php require_once "Controllers/clientes1_1Controller.php"; ?>
                    </div>   
                </table>
                <div class="button_prov">
                    <input class="negrita" type="submit" name="add_proveedor" value="Añadir">
                </div>
            </form>
        </div>
        </div>
    </section>
</body>
</html>

