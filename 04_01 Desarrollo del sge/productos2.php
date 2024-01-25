<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body class = "flex">
    <header class = "header2">
        <div class="navegacion">
            <a href="clientes1.php">Clientes</a><br>
            <a href="proveedores1.php">Proveedores</a><br>
            <a href="personal1.php">Personal</a><br>
            <a class="negrita" href="productos1.php">Productos</a><br>
            <a href="ventas.php">Ventas</a><br>
            <a href="compra1.php">Compra</a><br>
            <a href="pedido1.php">Pedidos</a><br>
        </div>
    </header>
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/caja.png" alt="">
            <p>Productos</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de los productos</h2>
            </div>
            <form class="flex fondo_form" action="proveedores2.php" method="post">
                <div class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Código del producto:</p>
                            <input type="text" name="codigoProducto">
                        </div>
                        <div class="pr1">
                            <p>Proveedores:</p>
                            <input type="text" name="proveedores">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre del producto:</p>
                            <input type="text" name="nombreProducto">
                        </div>
                        <div class="pr1">
                            <p>Email:</p>
                            <input type="text" name="email">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Apellidos:</p>
                            <input type="text" name="apellidos">
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
                            <p>Información:</p>
                            <textarea name="informacion" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div>
                        <p>Provincia/Pais:</p>
                        <input type="text" name="pais">
                    </div>
                </div>
                <div class="segundo_div imagen-botones">
                    <img src="Assets/img/usuario.png" alt="">
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