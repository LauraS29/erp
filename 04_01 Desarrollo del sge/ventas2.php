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
            <form class="flex fondo_form" action="ventas2.php" method="post">
                <section class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Nº de factura:</p>
                            <input type="text" name="numeroFactura" required>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Fecha de emisión:</p>
                            <input type="text" name="fechaRealizacion"  required>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Nº del pedido:</p>
                            <input type="text" name="Cod_pedido"  required>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Vencimiento:</p>
                            <input type="text" name="pais"  required>
                        </div>
                    </div>
                </section>
                <section class="primer_div">
                    <h3>Cliente</h3>
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre del Cliente:</p>
                            <input type="text" name="Nom_cliente"  required>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Domicilio:</p>
                            <input type="text" name="Localidad_cliente"  required>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Provincia:</p>
                            <input type="text" name="Provincia_cliente"  required>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Dni:</p>
                            <input type="text" name="DNI_cliente"  required>
                        </div>
                    </div>
                </section>
               
            </form>
            <div class="fondo_form">
                    <table class="tabla">
                        <tr>
                            <th>Nº</th>
                            <th>Productos</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario Neto</th>
                            <th>Total neto</th>
                            <th>IVA%</th>
                            <th>IVA Total</th>
                            <th>Precio total</th>
                        </tr>
                    </table>
                </div>
        </div>
    </section>
</body>
</html>
