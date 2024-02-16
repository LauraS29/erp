<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="Assets/css/estilos.css">
</head>
<body>
    <?php require_once "Views/Encabezado/Menu.php"; ?>
    
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/calendario.png" alt="">
            <p class ="medio">Empresa</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de la empresa</h2>
            </div>
            
            <form class="fondo_form" action="empresa2.php" method="post">
                <table>
                  <?php require_once "Views/busqueda.php"; ?>  
                    <div class="tabla">
                        <tr>
                            <th>Cód.Empresa</th>
                            <th>Nom.Empresa</th>
                            <th>Tlf_empresa</th>
                            <th></th>
                        </tr>                

                        <?php require_once "Controllers/empresa1_1Controller.php"; ?>
                        <!-- <tr>
                            <td class="pequeño">
                                <a href="empresa2.php">
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
    </section>
</body>
</html>

