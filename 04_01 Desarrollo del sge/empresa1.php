<?php
    session_start();
    // Base de datos
    include_once('Db/ConDb.php');
    // HEADER
    include_once('Models/navegacion.php');

    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
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
<body>
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/repartidor.png" alt="">
            <p class ="medio">Empresas</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de las empresas</h2>
            </div>
            <form class="fondo_form" action="empresa1.php" method="post">
            <table>
                    <div class="tabla">
                        <tr>
                            <th>Cod.empresa</th>
                            <th>Nom.empresa</th>
                            <th>Telefono</th>
                        </tr> 
                    
                        <?php
                            // Bucle para mostrar los datos de proveedores
                            /* Verifica que $resultadoProveedores sea válido */
                            while ($row = mysqli_fetch_assoc($resultadoEmpresas)) 
                            {
                        ?>
                        <tr>
                            <td>
                                <a href="empresa2.php?codigo=<?php echo $row['Cod_empresa']; 
                                ?>"><?php echo $row['Cod_empresa']; ?></a>
                            </td>
                            <td>
                                <a href="proveedores2.php?codigo=<?php echo $row['Cod_empresa']; ?>"><?php echo $row['Nom_empresa']; ?></a>
                            </td>
                            <td>
                                <a href="clientes2.php?codigo=<?php echo $row['Cod_empresa'];?>"><?php echo $row['Tlf_empresa']; ?></a>
                            </td>
                            <td class="pequeño">
                                <a href="clientes2.php?codigo=<?php echo $row['Cod_empresa']; ?>">
                                <img src="Assets/img/actualizar.png" alt="">
                                </a>
                                <img class="img_elim" src="Assets/img/eliminar.png" alt="">
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

    header("Location: empresa2.php");
    exit();
}

?>
