<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body class = "flex">
    <?php require_once "Views/Encabezado/Menu.php"; ?>
    
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/personal.png" alt="">
            <p class ="medio">Personal</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos del personal</h2>
            </div>
            <form class="flex fondo_form" action="Controllers/personal/personal1_2Controller.php" method="post">
                <div class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre:</p>
                            <input type="text" name="Nom_empleado" required>
                        </div>
                        <div class="pr1">
                            <p>Apellido:</p>
                            <input type="text" name="Ape_empleado" required>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>DNI:</p>
                            <input type="text" name="DNI_empleado" required>
                        </div>
                        <div class="pr1">
                            <p>Teléfono:</p>
                            <input type="text" name="Tlf_empleado" required>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Clave acceso:</p>
                            <input type="text" name="Clave_acceso" required>
                        </div>
                    </div>
                </div>
                <div class="segundo_div imagen-botones">
                    <img src="Assets/img/usuario.png" alt="">
                    <div class="buttons">
                        <div>
                            <input type="submit" name="guardar" id="boton1" value="Guardar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>

                <!------------PHP------------->





