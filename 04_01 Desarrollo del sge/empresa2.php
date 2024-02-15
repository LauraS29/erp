<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empresa</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body class = "flex">
    <?php require_once "Views/Encabezado/Menu.php"; ?>
    
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/calendario.png" alt="">
            <p class ="medio">Empresa</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de la empresa</h2>
            </div>
            <form class="flex fondo_form" action="Controllers/empresa1_2Controller.php" method="post">
                <div class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Código:</p>
                            <input type="text" name="Cod_empresa" required>
                        </div>
                        <div class="pr1">
                            <p>Nombre:</p>
                            <input type="text" name="Nom_empresa" required>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Teléfono:</p>
                            <input type="email" name="Tlf_empresa" required>
                        </div>
                        <div class="pr1">
                            <p>Email:</p>
                            <input type="text" name="Email_empresa" required>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Código Postal:</p>
                            <input type="text" name="Cod_postal_empresa" required>
                        </div>
                        <div class="pr1">
                            <p>Provincia:</p>
                            <input type="text" name="Localidad_empresa" required>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Dirección:</p>
                            <input type="text" name="Provincia_empresa" required>
                        </div>
                       <div class="pr1">
                            <p>Dirección:</p>
                            <input type="text" name="Direccion_empresa" required>
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
