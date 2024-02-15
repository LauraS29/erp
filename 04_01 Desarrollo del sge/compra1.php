
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
            <form class="fondo_form" action="compra1.php" method="post">
                
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
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

    header("Location: compra2.php");
    exit();
}

?>