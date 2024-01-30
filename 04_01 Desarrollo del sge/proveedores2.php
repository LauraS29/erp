<?php
    $host = 'localhost';
    $usuario = 'admin';
    $contraseña = 'madrid';
    $base_Datos = 'trabajo';

    $conexion = mysqli_connect($host, $usuario, $contraseña, $base_Datos);


    if (!$conexion) 
    {
        die("Error de conexión: " . mysqli_connect_error());
    }
    
    /* Inicio de los input y para la variable $readonly que se utilizará para controlar si los campos son de solo lectura */
    $Nombre_proveedor = '';
    $Telefono_proveedor = '';
    $Email_proveedor = '';
    $Codigo_postal_proveedor = '';
    $Provincia_pais_proveedor = '';
    $Localidad_proveedor = '';
    $Cod_empresa = '';
    $Nombre_empresa = '';
    $readonly = '';
    
    // Proceso del formulario
    if (isset($_POST['guardar'])) 
    {
        // Obtener los datos del formulario
        $Nombre_proveedor = $_POST['Nombre_proveedor'];
        $Telefono_proveedor = $_POST['Telefono_proveedor'];
        $Email_proveedor = $_POST['Email_proveedor'];
        $Codigo_postal_proveedor = $_POST['Codigo_postal_proveedor'];
        $Provincia_pais_proveedor = $_POST['Provincia_pais_proveedor'];
        $Localidad_proveedor = $_POST['Localidad_proveedor'];
        $Cod_empresa = $_POST['Cod_empresa'];
        $Nombre_empresa = $_POST['Nombre_empresa'];
    
        // Verificar si se recibió un ID para la edición
        $proveedorId = isset($_GET['codigo']) ? $_GET['codigo'] : null;
    
        if ($proveedorId) 
        {
            // Actualizar los datos del proveedor existente
            $actualizarDatos = "UPDATE proveedores SET Nombre_proveedor='$Nombre_proveedor', Telefono_proveedor='$Telefono_proveedor', Email_proveedor='$Email_proveedor', Codigo_postal_proveedor='$Codigo_postal_proveedor',Provincia_pais_proveedor='$Provincia_pais_proveedor', Localidad_proveedor='$Localidad_proveedor', Cod_empresa='$Cod_empresa', Nombre_empresa='$Nombre_empresa' WHERE Cod_proveedor = $proveedorId";
    
            $ejecutarActualizar = mysqli_query($conexion, $actualizarDatos);
    
            if (!$ejecutarActualizar) 
            {
                die("Error al actualizar datos: " . mysqli_error($conexion));
            }
    
            // Redireccionar a proveedores1.php
            header("Location: proveedores1.php");
            exit();
        } else {
            // Insertar todos los datos en la tabla proveedores
            $insertarDatos = "INSERT INTO proveedores (Nombre_proveedor, Telefono_proveedor, Email_proveedor, Codigo_postal_proveedor, Provincia_pais_proveedor, Localidad_proveedor, Cod_empresa, Nombre_empresa) VALUES ('$Nombre_proveedor', '$Telefono_proveedor', '$Email_proveedor', '$Codigo_postal_proveedor', '$Provincia_pais_proveedor', '$Localidad_proveedor', '$Cod_empresa', '$Nombre_empresa')";
    
            $ejecutarInsertar = mysqli_query($conexion, $insertarDatos);
    
            if (!$ejecutarInsertar) {
                die("Error al insertar datos: " . mysqli_error($conexion));
            }
    
            // Obtener el ID del último registro insertado
            $lastInsertId = mysqli_insert_id($conexion);
    
            // Redireccionar a proveedores1.php con el ID del nuevo proveedor
            header("Location: proveedores1.php?id=$lastInsertId");
            exit();
        }
    }
    
    // Obtener datos del proveedor para editar si se proporciona un ID
    $proveedorId = isset($_GET['codigo']) ? $_GET['codigo'] : null;
    
    if ($proveedorId) 
    {
        $consultaProveedor = "SELECT * FROM proveedores WHERE Cod_proveedor = $proveedorId";
        $resultadoProveedor = mysqli_query($conexion, $consultaProveedor);
    
        if (!$resultadoProveedor) 
        {
            die("Error al obtener datos del proveedor: " . mysqli_error($conexion));
        }
    
        // Verificar si se encontraron datos del proveedor
        if ($rowProveedor = mysqli_fetch_assoc($resultadoProveedor)) 
        {
            // Datos del proveedor
            $Nombre_proveedor = $rowProveedor['Nombre_proveedor'];
            $Telefono_proveedor = $rowProveedor['Telefono_proveedor'];
            $Email_proveedor = $rowProveedor['Email_proveedor'];
            $Codigo_postal_proveedor = $rowProveedor['Codigo_postal_proveedor'];
            $Provincia_pais_proveedor = $rowProveedor['Provincia_pais_proveedor'];
            $Localidad_proveedor = $rowProveedor['Localidad_proveedor'];
            $Cod_empresa = $rowProveedor['Cod_empresa'];
            $Nombre_empresa = $rowProveedor['Nombre_empresa'];
    
            // Agregar readonly a los campos si se está editando un proveedor existente
            $readonly = "readonly";
        } else {
            // Manejar el caso en que no se encuentren datos del proveedor
            die("Proveedor no encontrado");
        }
    }
?>

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
    <header class="header2">
        <div class="navegacion">
            <a href="clientes1.php">Clientes</a><br>
            <a class="negrita" href="proveedores1.php">Proveedores</a><br>
            <a href="personal1.php">Personal</a><br>
            <a href="productos1.php">Productos</a><br>
            <a href="ventas.php">Ventas</a><br>
            <a href="compra1.php">Compra</a><br>
            <a href="pedido1.php">Pedidos</a><br>
            <a href="empresa1.php">Empresa</a><br>
        </div>
    </header>
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/repartidor.png" alt="">
            <p class ="medio">Proveedores</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de proveedores</h2>
            </div>
            <form class="flex fondo_form" action="proveedores2.php?codigo=
            <?php echo $proveedorId; ?>" method="post">
                <div class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre Proveedor:</p>
                            <input type="text" name="Nombre_proveedor" value="<?php echo $Nombre_proveedor; ?>" <?php echo $readonly; ?>>
                        </div>
                        <div class="pr1">
                            <p>Teléfono:</p>
                            <input type="text" name="Telefono_proveedor" value="<?php echo $Telefono_proveedor; ?>" <?php echo $readonly; ?>>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Email:</p>
                            <input type="email" name="Email_proveedor" value="<?php echo $Email_proveedor; ?>" <?php echo $readonly; ?>>
                        </div>
                        <div class="pr1">
                            <p>Código Postal:</p>
                            <input type="text" name="Codigo_postal_proveedor" value="<?php echo $Codigo_postal_proveedor; ?>" <?php echo $readonly; ?>>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Provincia/Pais:</p>
                            <input type="text" name="Provincia_pais_proveedor" value="<?php echo $Provincia_pais_proveedor; ?>" <?php echo $readonly; ?>>
                        </div>
                        <div class="pr1">
                            <p>Localidad:</p>
                            <input type="text" name="Localidad_proveedor" value="<?php echo $Localidad_proveedor; ?>" <?php echo $readonly; ?>>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Código Empresa:</p>
                            <input type="text" name="Cod_empresa" value="<?php echo $Cod_empresa; ?>" <?php echo $readonly; ?>>
                        </div>
                        <div class="pr1">
                            <p>Nombre Empresa:</p>
                            <input type="text" name="Nombre_empresa" value="<?php echo $Nombre_empresa; ?>" <?php echo $readonly; ?>>
                        </div>
                    </div>
                </div>
                <div class="segundo_div imagen-botones">
                    <img src="Assets/img/usuario.png" alt="">
                    <div class="buttons">
                        <div>
                            <input type="submit" name="guardar" id="boton1" value="Guardar" <?php echo $readonly; ?>>
                        </div>
                        <div>
                            <input type="button" value="Actualizar" <?php echo (isset($_GET['modo']) && $_GET['modo'] === 'editar') ? '' : 'disabled'; ?>>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>

                <!------------PHP------------->





