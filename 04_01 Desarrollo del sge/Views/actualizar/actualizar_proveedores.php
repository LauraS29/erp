<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <script src="./../../Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./../../Assets/css/estilos.css">
</head>
<body class="flex">
    <?php require_once "../Encabezado/Menu.php"; ?>
   
    <section class="fondo_section">
        <div class="flex div1">
            <img src="./../../Assets/img/repartidor.png" alt="">
            <p class="medio">Proveedores</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de los proveedores</h2>
            </div>

            <?php require_once "./../../Controllers/proveedores/proveedores_actualizarController.php"; ?>

            <form class="flex fondo_form" action="actualizar_proveedores.php" method="post">
                <div class="primer_div">
                    <input type="hidden" value="<?php echo $id ?>" name="Cod_proveedor">
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre:</p>
                            <input type="text" name="Nom_proveedor" id="Nom_proveedor" value="<?php echo $nombre ?>">
                        </div>
                        <div class="pr1">
                            <p>Teléfono:</p>
                            <input type="text" name="Tlf_proveedor" id="Tlf_proveedor" value="<?php echo $telefono ?>">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Email:</p>
                            <input type="email" name="Email_proveedor" id="Email_proveedor" value="<?php echo $email ?>">
                        </div>
                        <div class="pr1">
                            <p>Codigo Postal:</p>
                            <input type="text" name="Cod_postal_proveedor" id="Cod_postal__proveedor" value="<?php echo $cod_postal ?>">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Provincia:</p>
                            <input type="text" name="Provincia_proveedor" id="Provincia_proveedor" value="<?php echo $provincia ?>">
                        </div>
                        <div class="pr1">
                            <p>Localidad:</p>
                            <input type="text" name="Localidad_proveedor" id="Localidad_proveedor" value="<?php echo $localidad ?>">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Cod_empresa:</p>
                            <input type="text" name="Cod_empresa" id="Cod_empresa" value="<?php echo $Cod ?>">
                        </div>
                        <div class="pr1">
                            <p>Cod_empresa:</p>
                            <input type="text" name="Nom_empresa" id="Nom_empresa" value="<?php echo $Nom ?>">
                        </div>
                    </div>
                </div>
                <div class="segundo_div imagen-botones">
                    <img src="../../Assets/img/usuario.png" alt="">
                    <div class="buttons">
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


