<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body>
    <header>
        <div class="navegacion">
        <a href="clientes.php">Clientes</a><br>
            <a class="negrita" href="proveedores1.php">Proveedores</a><br>
            <a href="personal.php">Personal</a><br>
            <a href="productos.php">Productos</a><br>
            <a href="ventas.php">Ventas</a><br>
            <a href="compra1.php">Compra</a><br>
            <a href="pedido.php">Pedidos</a><br>
        </div>
    </header>
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/repartidor.png" alt="">
            <p>Proveedores</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de proveedores</h2>
            </div>
            <form class="fondo_form" action="proveedores1.php" method="post">
                <table>
                    <tr>
                        <th>Código</th>
                        <th>Proveedores</th>
                        <th>Teléfono</th>
                        <th>.........</th>
                    </tr>
                    <?php
                    $proveedores = array(
                        array("02", "Pepa", "411981627"),
                        array("03", "Ramon", "483271657"),
                        array("04", "Ramona", "671583498"),
                        array("05", "Eustaquio", "561816851")
                    );

                    foreach ($proveedores as $proveedor) {
                        echo "<tr>";
                        foreach ($proveedor as $value) {
                            echo "<td>$value</td>";
                        }
                        echo "</tr>";
                    }
                    ?>
                </table>
                <div class="button_prov">
                     <input type="submit" name="add_proveedor" value="Añadir">
                </div>
            </form>
        </div>
    </section>
</body>
</html>


<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

    header("Location: proveedores2.php");
    exit();
}


?>
