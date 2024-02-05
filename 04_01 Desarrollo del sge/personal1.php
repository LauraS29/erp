<?php
session_start();
include_once('Db/ConDb.php');

// Consulta a la base de datos
$sqlPersonal = "SELECT * FROM empleados";
$resultadoPersonal = mysqli_query($conexion, $sqlPersonal);

if (!$resultadoPersonal) 
{
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>

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
    <?php require_once "Views/encabezado.php"; ?>
    
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/personal.png" alt="">
            <p class ="medio">Personal</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos del personal</h2>
            </div>
            <form class="fondo_form" action="personal1.php" method="post">
                <table>
                    <div class="tabla">
                        <tr>
                            <th>Cód.Empleado</th>
                            <th>Nombre</th>
                            <th>Teléfono contacto</th>
                        </tr> 
                    
                        <?php
                        // Bucle para mostrar los datos de proveedores
                        /* Verifica que $resultadoProveedores sea válido */
                        while ($row = mysqli_fetch_assoc($resultadoPersonal)) 
                        {
                        ?>
                            <tr>
                            <td><?php echo $row['Cod_empleado']; ?></td>
                            <td><a href="personal2.php?codigo=<?php echo $row['Cod_empleado']; ?>&modo=editar"><?php echo $row['Nom_empleado']; ?></a></td>
                            <td><?php echo $row['Tlf_empleado']; ?></td>
                            <td class="pequeño">
                                <div class="rect1">
                                    <img src="Assets/img/actualizar.png" alt="Actualizar">
                                </div>
                                <div class="rect2">
                                    <img src="Assets/img/eliminar.png" alt="Eliminar">
                                </div>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </div>
                </table>
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

    header("Location: personal2.php");
    exit();
}

?>