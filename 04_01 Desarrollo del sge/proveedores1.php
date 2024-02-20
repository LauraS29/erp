<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="Assets/css/estilos.css">
</head>
<body>
    <?php require_once "Views/Encabezado/Menu.php"; ?>
    
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/repartidor.png" alt="">
            <p class ="medio">Proveedores</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de los proveedores</h2>
            </div>
            <div class="fondo_form">
                <?php require_once "Views/busqueda.php"; ?>
                 
                <form class="fondo_form" action="proveedores2.php" method="post">
                    <table>
                        <div class="tabla">
                            <tr>
                                <th>Cód.Proveedor</th>
                                <th>Nom.proveedor</th>
                                <th>Tlf_proveedor</th>
                                <th></th>
                            </tr>                

                            <?php require_once "Controllers/proveedores1_1Controller.php"; ?>
                            <!-- <tr>
                                <td class="pequeño">
                                    <a href="proveedores2.php">
                                    <img src="Assets/img/actualizar.png" alt="">
                                    </a>
                                    <img class="img_elim" src="Assets/img/eliminar.png" alt="">
                                </td>
                            </tr> -->
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

