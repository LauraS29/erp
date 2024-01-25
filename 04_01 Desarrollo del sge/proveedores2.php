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
    <header class = "header2">
        <div class="navegacion">
            <a href="clientes1.php">Clientes</a><br>
            <a class="negrita" href="proveedores1.php">Proveedores</a><br>
            <a href="personal1.php">Personal</a><br>
            <a href="productos1.php">Productos</a><br>
            <a href="ventas.php">Ventas</a><br>
            <a href="compra1.php">Compra</a><br>
            <a href="pedido1.php">Pedidos</a><br>
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
            <form class="flex fondo_form" action="proveedores1.php" method="post">
                <div class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Código:</p>
                            <input type="text" name="codigo">
                        </div>
                        <div class="pr1">
                            <p>Teléfono:</p>
                            <input type="text" name="telefono">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre Empresa:</p>
                            <input type="text" name="nombreEmpresa">
                        </div>
                        <div class="pr1">
                            <p>Email:</p>
                            <input type="text" name="email">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre Proveedor:</p>
                            <input type="text" name="nombreProveedor">
                        </div>
                        <div class="pr1">
                            <p>Código Postal:</p>
                            <input type="text" name="codigoPostal">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Localidad:</p>
                            <input type="text" name="localidad">
                        </div>
                        <div class="pr1">
                            <p>Provincia/Pais:</p>
                            <input type="text" name="pais">
                        </div>
                    </div>
                </div>
                <div class="segundo_div imagen-botones">
                    <img src="Assets/img/usuario.png" alt="">
                    <div class="buttons">
                        <div>
                            <input type="submit" value="Guardar">
                        </div>
                        <div>
                            <input type="button" value="Actualizar" disabled>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>

                <!------------PHP------------->
<?php

?>




