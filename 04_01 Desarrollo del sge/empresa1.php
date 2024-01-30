<?php
$servidor = 'localhost';
$usuario = 'root';
$clave = '';
$baseDeDatos = 'trabajo';

$conexion = mysqli_connect($servidor, $usuario, $clave, $baseDeDatos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener datos de empresas para mostrar en la tabla
$consultaEmpresas = "SELECT Cod_empresa, Nombre_empresa, Telefono_empresa FROM Empresa";
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
<body class="flex">
    <header class="header2">
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
            <p class ="medio">Empresas</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de las empresas</h2>
            </div>
            <form class="fondo_form" action="empresa1.php" method="post">
                <table>
                    <tr>
                        <th>Código</th>
                        <th>Nombre_empresa</th>
                        <th>Teléfono_empresa</th>
                    </tr>
                    <?php
                    /* Inicia un bucle while que recorre cada fila del conjunto de resultados obtenido de la consulta SQL en $resultadoEmpresas */
                        while ($row = mysqli_fetch_assoc($resultadoEmpresas)) {
                    ?>
                    <tr>
                        <!--  Muestra el valor de la columna 'Cod_empresa' de la fila actual en una celda de la tabla. -->
                        <td><?php echo $row['Cod_empresa']; ?></td>
                        <td><?php echo $row['Nombre_empresa']; ?></td>
                        <td><?php echo $row['Telefono_empresa']; ?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </table>
                <div class="button_prov">
                    <input type="submit" name="add_proveedor" value="Añadir">
                </div>
            </form>
        </div>
    </section>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = isset($_POST['correo']) ? $_POST['correo'] : '';
    $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

    header("Location: empresa2.php");
    exit();
}
?>
