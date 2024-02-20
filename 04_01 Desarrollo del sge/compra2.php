
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body class = "flex">
    <?php require_once "Views/Encabezado/Menu.php"; ?>
    
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/compra.png" alt="">
            <p class ="medio">Compra</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de las compras</h2>
            </div>
            <form class="flex fondo_form" action="compra2.php" method="post">
                <section class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Nº de factura:</p>
                            <input type="text" name="numeroFactura">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Fecha de emisión:</p>
                            <input type="text" name="fechaRealizacion">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Nº del pedido:</p>
                            <input type="text" name="Cod_pedido">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Vencimiento:</p>
                            <input type="text" name="pais">
                        </div>
                    </div>
                </section>
                <section class="primer_div">
                    <h3>Cliente</h3>
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre del Cliente:</p>
                            <input type="text" name="Nom_cliente">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Domicilio:</p>
                            <input type="text" name="Localidad_cliente">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Provincia:</p>
                            <input type="text" name="Provincia_cliente">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Dni:</p>
                            <input type="text" name="DNI_cliente">
                        </div>
                    </div>
                </section>
                <div class="fondo-div primer_div">
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
            </form>
            
        </div>
    </section>
</body>
</html>

                <!------------PHP------------->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Verifica si todos los campos están llenos
    $campos_llenos = true;
    $campos = ['codigo', 'telefono', 'nombre', 'email', 'apellidos', 'dni', 'localidad', 'codigopostal', 'pais', 'observaciones'];

    foreach ($campos as $campo) 
    {
        if (empty($_POST[$campo])) 
        {
            $campos_llenos = false;
            break;
        }
    }

    if ($campos_llenos) 
    {
        // Aquí puedes realizar la lógica de guardar en la base de datos u otras operaciones necesarias

        // Muestra una alerta de éxito en JavaScript
        echo '<script>alert("Guardado exitosamente");</script>';
    }
}
?>