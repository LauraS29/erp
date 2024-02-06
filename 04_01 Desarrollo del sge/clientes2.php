<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body class = "flex">
    <?php require_once "Views/encabezado.php"; ?>
    
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/clientes.png" alt="">
            <p class ="medio">Clientes</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de clientes</h2>
            </div>
            <form class="flex fondo_form" action="clientes2.php" method="post">
                <div class="primer_div">
                    <div class="flex">
                        <div class="pr1">
                            <p>Nombre:</p>
                            <input type="text" name="Nom_cliente">
                        </div>
                        <div class="pr">
                            <p>Apellidos:</p>
                            <input type="text" name="Ap_cliente">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Email:</p>
                            <input type="email" name="Email_cliente">
                        </div>
                        <div class="pr1">
                            <p>Teléfono:</p>
                            <input type="text" name="Tlf_cliente">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr1">
                            <p>DNI:</p>
                            <input type="text" name="DNI_cliente">
                        </div>
                        <div class="pr1">
                            <p>Localidad:</p>
                            <input type="text" name="Localidad">
                        </div>
                    </div>
                    <div class="flex">
                       <div class="pr">
                            <p>Dirección:</p>
                            <input type="text" name="Provincia">
                        </div> 
                    </div>
                </div>
                <div class="segundo_div imagen-botones">
                    <img src="Assets/img/usuario.png" alt="">
                    <div class="buttons">
                        <div>
                            <input type="submit" name="guardar" id="boton1" value="Guardar">
                        </div>
                        <div>
                            <input type="button" value="Actualizar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
