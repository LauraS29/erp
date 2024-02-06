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
    <?php require_once "Views/busqueda.php"; ?>
    
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/clientes.png" alt="">
            <p class ="medio">Clientes</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de clientes</h2>
            </div>
            <form class="fondo_form" action="clientes2.php" method="post">
                <table>
                    <div class="tabla">
                        <tr>
                            <th>Cod.Cliente</th>
                            <th>Nom.cliente</th>
                            <th>Dni</th>
                        </tr> 
                    
                        <tr>
                            <td>
                                <a href="clientes2.php?codigo="></a>
                            </td>
                            <td>
                                <a href="clientes2.php?codigo="></a>
                            </td>
                            <td>
                                <a href="clientes2.php?codigo="></a>
                            </td>
                            <td class="pequeño">
                                <a href="clientes2.php?codigo=">
                                <img src="Assets/img/actualizar.png" alt="">
                                </a>
                                <img class="img_elim" src="Assets/img/eliminar.png" alt="">
                            </td>
                        </tr>
                    </div>   
                </table>
                <div class="button_prov">
                    <input type="submit" name="add_proveedor" value="Añadir">
                </div>
            </form>
        </div>
    </section>
</body>
</html>
                <!------------PHP------------->
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

    header("Location: clientes2.php");
    exit();
}

?>