<?php
    session_start();
    // Base de datos
    include_once('Db/ConDb.php');
    // HEADER
    include_once('Models/navegacion.php');

// Formulario

/* verifica si la solicitud es de tipo POST */
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    /* verifica si se ha enviado el formulario con el botón "guardar" */
    if (isset($_POST['guardar'])) 
    {
        /* Obtener los datos del formulario ($_POST) y se asignan a variables */
        $Cod_empresa = $_POST['Cod_empresa'];
        $Nom_empresa = $_POST['Nom_empresa'];
        $Tlf_empresa = $_POST['Tlf_empresa'];
        $Email_empresa = $_POST['Email_empresa'];
        $Cod_postal_empresa = $_POST['Cod_postal_empresa'];
        $Provincia_pais_empresa = $_POST['Provincia_pais_empresa'];
        $Localidad_empresa = $_POST['Localidad_empresa'];
        $Provincia_empresa = $_POST['Provincia_empresa'];
        $Direccion_empresa = $_POST['Direccion_empresa'];
        
        // Insertar todos los datos en la tabla empresa
        $insertarDatos = "INSERT INTO Empresa (Cod_empresa, Nom_empresa, Tlf_empresa, Email_empresa, Cod_postal_empresa, Localidad_empresa,Provincia_empresa,  Direccion_empresa) VALUES ('$Cod_empresa', '$Nombre_empresa', '$Telefono_empresa', '$Email_empresa', '$Codigo_postal_empresa', '$Provincia_pais_empresa', '$Localidad_empresa', '$Direccion_empresa')";

        /* mysqli_query (ejecuta la consulta y devuelve un resultado que se almacena en $ejecutarInsertar) */
        $ejecutarInsertar = mysqli_query($conexion, $insertarDatos);

        if (!$ejecutarInsertar) 
        {
            die("Error al insertar datos: " . mysqli_error($conexion));
        }
    }
}

// Obtener datos de empresas para mostrar en la tabla
$consultaEmpresas = "SELECT Cod_empresa, Nom_empresa, Tlf_empresa FROM empresa";
$resultadoEmpresas = mysqli_query($conexion, $consultaEmpresas);

if (!$resultadoEmpresas) {
    die("Error al obtener datos de empresas: " . mysqli_error($conexion));
}
?>

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
    <header class = "header2">
        <div class="navegacion">
            <a href="clientes1.php">Clientes</a><br>
            <a href="proveedores1.php">Proveedores</a><br>
            <a href="personal1.php">Personal</a><br>
            <a href="productos1.php">Productos</a><br>
            <a href="ventas.php">Ventas</a><br>
            <a href="compra1.php">Compra</a><br>
            <a href="pedido1.php">Pedidos</a><br>
            <a class="negrita" href="empresa1.php">Empresa</a><br>
        </div>
    </header>
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/repartidor.png" alt="">
            <p class ="medio">Proveedores</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de las empresas</h2>
            </div>
            <form class="flex fondo_form" action="empresa2.php" method="post">
                <div class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre Empresa:</p>
                            <input type="text" name="Nom_empresa">
                        </div>
                        <div class="pr1">
                            <p>Teléfono Empresa:</p>
                            <input type="text" name="Tlf_empresa">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Email:</p>
                            <input type="email" name="Email_empresa">
                        </div>
                        <div class="pr1">
                            <p>Código Postal:</p>
                            <input type="text" name="Cod_postal_empresa">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr1">
                            <p>Localidad:</p>
                            <input type="text" name="Localidad_empresa">
                        </div>
                        <div class="pr">
                            <p>Provincia:</p>
                            <input type="text" name="Provincia_empresa">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Dirección:</p>
                            <input type="text" name="Direccion_empresa">
                        </div>
                        <div class="pr1">
                            <p>Código Empresa:</p>
                            <input type="text" name="Cod_empresa">
                        </div>
                    </div>
                </div>
                <div class="segundo_div imagen-botones">
                    <img src="Assets/img/usuario.png" alt="">
                    <div class="buttons">
                        <div>
                            <input type="submit" name = "guardar" id="boton1" value="Guardar">
                        </div>
                        <div>
                            <input type="button" value="Actualizar" disabled>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>

                <!------------PHP------------->

