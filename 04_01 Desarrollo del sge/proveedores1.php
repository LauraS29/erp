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
            <a href="#">Clientes</a><br>
            <a href="#">Proveedores</a><br>
            <a href="#">Personal</a><br>
            <a href="#">Productos</a><br>
            <a href="#">Ventas</a><br>
            <a href="#">Compra</a><br>
            <a href="#">Pedidos</a><br>
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
                    <tr>
                        <td onclick>01</td>
                        <td onclick>Pepe</td>
                        <td onclick>516516849</td>
                        <!-- <td class="image">
                            <img src="Assets/img/eliminar.png">
                        </td>
                        <td class="image">
                            <img src="Assets/img/flechas-girando.png">
                        </td>   -->
                    </tr>

                    <tr>
                        <td onclick>02</td>
                        <td onclick>Pepa</td>
                        <td onclick>411981627</td>
                    </tr>
                    <tr>
                        <td onclick>03</td>
                        <td onclick>Ramon</td>
                        <td onclick>483271657</td>
                    </tr>
                    <tr>
                        <td onclick>04</td>
                        <td onclick>Ramona</td>
                        <td onclick>671583498</td>
                    </tr>
                    <tr>
                        <td onclick>05</td>
                        <td onclick>Eustaquio</td>
                        <td onclick>561816851</td>
                    </tr>
                </table>
                <div>
                     <input class="button_prov" type="submit" value="Añadir">
                </div>
            </form>
        </div>
    </section>
</body>
</html>