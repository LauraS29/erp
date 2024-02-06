
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body>
    <?php require_once "Views/encabezado.php"; ?>
    <?php require_once "Views/busqueda.php"; ?>

    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/repartidor.png" alt="">
            <p class ="medio">Proveedores</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de proveedores</h2>
            </div>
            <form class="fondo_form" action="proveedores2.php" method="post">
                <table>
                    <div class="tabla">
                        <tr>
                            <th>Cod.proveedor</th>
                            <th>Nom.proveedor</th>
                            <th>Telefono</th>
                        </tr> 
                    
                        <?php
                            // Bucle para mostrar los datos de proveedores
                            /* Verifica que $resultadoProveedores sea válido */
                            while ($row = mysqli_fetch_assoc($resultadoProveedores)) 
                            {
                        ?>
                        <tr>
                            <td>
                                <a href="proveedores2.php?codigo=<?php echo $row['Cod_proveedor']; 
                                ?>"><?php echo $row['Cod_proveedor']; ?></a>
                            </td>
                            <td>
                                <a href="proveedores2.php?codigo=<?php echo $row['Cod_proveedor']; ?>"><?php echo $row['Nom_proveedor']; ?></a>
                            </td>
                            <td>
                                <a href="clientes2.php?codigo=<?php echo $row['Cod_proveedor'];?>"><?php echo $row['Tlf_proveedor']; ?></a>
                            </td>
                            <td class="pequeño">
                                <a href="clientes2.php?codigo=<?php echo $row['Cod_proveedor']; ?>">
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

<!-- Manejo del formulario -->
<?php
/* Verifica si el formulario ha sido enviado mediante POST */
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    /* Obtiene los valores de correo y contraseña del formulario */
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

    /* Redirige a la página "proveedores2.php" utilizando header */
    header("Location: proveedores2.php");
    exit();
}
?>
