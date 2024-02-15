<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body class = "flex">
    <?php require_once "Views/Encabezado/Menu.php"; ?>
    
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/repartidor.png" alt="">
            <p class ="medio">Proveedores</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de los proveedores</h2>
            </div>
            <form class="flex fondo_form" action="Controllers/proveedores1_2Controller.php" method="post">
                <div class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre:</p>
                            <input type="text" name="Nom_proveedor" required>
                        </div>
                        <div class="pr1">
                            <p>Teléfono:</p>
                            <input type="text" name="Tlf_proveedor" required>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Email:</p>
                            <input type="email" name="Email_proveedor" required>
                        </div>
                        <div class="pr1">
                            <p>Codigo Postal:</p>
                            <input type="text" name="Cod_postal_proveedor" required>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Provincia:</p>
                            <input type="text" name="Provincia_proveedor" required>
                        </div>
                        <div class="pr1">
                            <p>Localidad:</p>
                            <input type="text" name="Localidad_proveedor" required>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Cod.Empresa:</p>
                            <input type="text" name="Cod.empresa" required>
                        </div>
                       <div class="pr1">
                            <p>Nom.empresa:</p>
                            <input type="text" name="Nom_empresa" required>
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
