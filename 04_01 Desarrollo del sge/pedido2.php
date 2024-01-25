<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body>
    <header class = "header2">
        <div class="navegacion">
            <a href="clientes1.php">Clientes</a><br>
            <a href="proveedores1.php">Proveedores</a><br>
            <a href="personal1.php">Personal</a><br>
            <a href="productos1.php">Productos</a><br>
            <a href="ventas.php">Ventas</a><br>
            <a href="compra1.php">Compra</a><br>
            <a class="negrita" href="pedido1.php">Pedidos</a><br>
        </div>
    </header>
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/pedido.png" alt="">
            <p>Pedidos</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de los pedidos</h2>
            </div>
            <form class="flex fondo_form" action="pedido2.php" method="post">
                <div class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Código del pedido:</p>
                            <input type="text" name="codigoPedido">
                        </div>
                        <div class="pr1">
                            <p>Nombre:</p>
                            <input type="text" name="nombre">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Código Producto:</p>
                            <input type="text" name="codigoProducto">
                        </div>
                        <div class="pr1">
                            <p>Apellidos:</p>
                            <input type="text" name="apellidos">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Nº de objetos:</p>
                            <input type="text" name="cantidad">
                        </div>
                        <div class="pr1">
                            <p>Provincia/Pais:</p>
                            <input type="text" name="pais">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Fecha del pedido:</p>
                            <input type="text" name="fechaPedido">
                        </div>
                        <div class="pr1">
                            <p>Localidad:</p>
                            <input type="text" name="localidad">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Fecha de entraga:</p>
                            <input type="text" name="fechaEntrega">
                        </div>
                        <div class="pr1">
                            <p>Tlf de contacto:</p>
                            <input type="text" name="tlfContacto">
                        </div>
                    </div>
                    <div>
                        <p>Total:</p>
                        <input type="text" name="total">
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>