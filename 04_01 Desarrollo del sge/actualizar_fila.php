

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
    <?php require_once "Views/Encabezado/Menu.php"; ?>
    
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/clientes.png" alt="">
            <p class ="medio">Clientes</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de los clientes</h2>
            </div>
            <?php require_once "Controllers/clientes1_actualizar.php"; ?>
            <form class="flex fondo_form" action="actualizar_fila.php" method="post">
                <div class="primer_div">
                <input type="hidden" value="<?php echo $id ?>" name="Cod_cliente">
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre:</p>
                            <input type="text" name="Nom_cliente" id="Nom_cliente" value="<?php echo $nombre ?>">
                        </div>
                        <div class="pr1">
                            <p>Apellidos:</p>
                            <input type="text" name="Ape_cliente" id="Ape_cliente" value="<?php echo $apellido ?>">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Email:</p>
                            <input type="email" name="Email_cliente" id="Email_cliente" value="<?php echo $email ?>">
                        </div>
                        <div class="pr1">
                            <p>Teléfono:</p>
                            <input type="text" name="Tlf_cliente" id="Tlf_cliente" value="<?php echo $telefono ?>">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>DNI:</p>
                            <input type="text" name="DNI_cliente" id="DNI_cliente" value="<?php echo $dni ?>">
                        </div>
                        <div class="pr1">
                            <p>Codigo Postal:</p>
                            <input type="text" name="Cod_postal_cliente" id="Cod_postal__cliente" value="<?php echo $cod_postal ?>">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Localidad:</p>
                            <input type="text" name="Localidad_cliente" id="Localidad_cliente" value="<?php echo $localidad ?>">
                        </div>
                       <div class="pr1">
                            <p>Dirección:</p>
                            <input type="text" name="Provincia_cliente" id="Provincia_cliente" value="<?php echo $provincia ?>">
                        </div> 
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Observaciones:</p>
                            <textarea name="Observaciones" id ="Observaciones" cols="30" rows="10" value="<?php echo $observaciones ?>"></textarea>
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
                            <input type="submit" name="actualizar" value="Actualizar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>