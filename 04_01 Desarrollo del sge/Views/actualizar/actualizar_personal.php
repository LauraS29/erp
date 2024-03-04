<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal</title>
    <script src="./../../Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./../../Assets/css/estilos.css">
</head>
<body class="flex">
    <?php require_once "../Encabezado/Menu.php"; ?>
   
    <section class="fondo_section">
        <div class="flex div1">
            <img src="./../../Assets/img/personal.png" alt="">
            <p class="medio">Personal</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de los empleados</h2>
            </div>

            <?php require_once "./../../Controllers/personal/personal_actualizarController.php"; ?>

            <form class="flex fondo_form" action="actualizar_personal.php" method="post">
                <div class="primer_div">
                    <input type="hidden" value="<?php echo $id ?>" name="Cod_empleado">
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre:</p>
                            <input type="text" name="Nom_empleado" id="Nom_empleado" value="<?php echo $nombre ?>">
                        </div>
                        <div class="pr1">
                            <p>Apellido:</p>
                            <input type="text" name="Ape_empleado" id="Ape_empleado" value="<?php echo $apellido ?>">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>DNI:</p>
                            <input type="text" name="DNI_empleado" id="DNI_empleado" value="<?php echo $dni ?>">
                        </div>
                        <div class="pr1">
                            <p>Teléfono:</p>
                            <input type="text" name="Tlf_empleado" id="Tlf__empleado" value="<?php echo $tlf ?>">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Clave_acceso:</p>
                            <input type="text" name="Clave_acceso" id="Clave_acceso" value="<?php echo $clave ?>">
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


