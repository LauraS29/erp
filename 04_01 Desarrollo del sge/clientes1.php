<?php
    session_start();
    // Base de datos
    include_once('Db/ConDb.php');
    // HEADER
    include_once('Models/navegacion.php');

    // Consulta a la base de datos
    $sqlCliente = "SELECT * FROM cliente";
    $resultadoCliente = mysqli_query($conexion, $sqlCliente);

    if (!$resultadoCliente) 
    {
        die("Error en la consulta: " . mysqli_error($conexion));
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="Assets/css/estilos.css">
</head>
<body>
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
            <form class="fondo_form" action="clientes1.php" method="post">
                <table>
                    <div class="tabla">
                        <tr>
                            <th>Cod.Cliente</th>
                            <th>Nom.cliente</th>
                            <th>Dni</th>
                        </tr> 
                    
                        <?php
                            // Bucle para mostrar los datos de proveedores
                            /* Verifica que $resultadoProveedores sea válido */
                            while ($row = mysqli_fetch_assoc($resultadoCliente)) 
                            {
                        ?>
                        <tr>
                            <td>
                                <a href="clientes2.php?codigo=<?php echo $row['Cod_cliente']; 
                                ?>"><?php echo $row['Cod_cliente']; ?></a>
                            </td>
                            <td>
                                <a href="clientes2.php?codigo=<?php echo $row['Cod_cliente']; ?>"><?php echo $row['Nom_cliente']; ?></a>
                            </td>
                            <td>
                                <a href="clientes2.php?codigo=<?php echo $row['Cod_cliente'];?>"><?php echo $row['DNI_cliente']; ?></a>
                            </td>
                            <td class="pequeño">
                                <a href="clientes2.php?codigo=<?php echo $row['Cod_cliente']; ?>">
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

    header("Location: clientes2.php");
    exit();
}

?>