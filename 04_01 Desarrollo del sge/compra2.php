<?php
session_start();
include_once('Db/ConDb.php');
?>

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
    <?php require_once "Views/encabezado.php"; ?>
    
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
                <div class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Nº de factura:</p>
                            <input type="text" name="numeroFactura">
                        </div>
                        <div class="pr1">
                            <p>Detalles:</p>
                            <textarea name="detalles" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Fecha de realización:</p>
                            <input type="text" name="fechaRealizacion">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Provincia/Pais:</p>
                            <input type="text" name="pais">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Localidad:</p>
                            <input type="text" name="localidad">
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