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
    $Nom_empleado = '';
    $Ape_empleado = '';
    $DNI_empleado= '';
    $Tlf_empleado= '';
    $Clave_acceso = '';
    $readonly = '';
    
    // Proceso del formulario
    if (isset($_POST['guardar'])) 
    {
        // Obtener los datos del formulario
        $Nom_empleado = $_POST['Nom_empleado'];
        $Ape_empleado = $_POST['Ape_empleado'];
        $DNI_empleado = $_POST['DNI_empleado'];
        $Tlf_empleado = $_POST['Tlf_empleado'];
        $Clave_acceso = $_POST['Clave_acceso'];
    
        // Verificar si se recibió un ID para la edición
        $personalId = isset($_GET['codigo']) ? $_GET['codigo'] : null;
    
        if ($personalId) 
        {
            // Actualizar los datos del proveedor existente
            $actualizarDatos = "UPDATE empleados SET Nom_empleado='$Nom_empleado', 
            Ape_empleado='$Ape_empleado', 
            DNI_empleado='$DNI_empleado',
            Tlf_empleado='$Tlf_empleado',
            Clave_acceso='$Clave_acceso'
            WHERE Cod_empleado = $personalId";
    
            $ejecutarActualizar = mysqli_query($conexion, $actualizarDatos);
    
            if (!$ejecutarActualizar) 
            {
                die("Error al actualizar datos: " . mysqli_error($conexion));
            }
    
            // Redireccionar a proveedores1.php
            header("Location: personal1.php");
            exit();
        } else {
            // Insertar todos los datos en la tabla proveedores
            $insertarDatos = "INSERT INTO empleados (Nom_empleado, Ape_empleado, DNI_empleado, Tlf_empleado, Clave_acceso) VALUES ('$Nom_empleado', '$Ape_empleado', '$DNI_empleado', '$Tlf_empleado', '$Clave_acceso')";
    
            $ejecutarInsertar = mysqli_query($conexion, $insertarDatos);
    
            if (!$ejecutarInsertar) {
                die("Error al insertar datos: " . mysqli_error($conexion));
            }
    
            // Obtener el ID del último registro insertado
            $lastInsertId = mysqli_insert_id($conexion);
    
            // Redireccionar a proveedores1.php con el ID del nuevo proveedor
            header("Location: personal1.php?id=$lastInsertId");
            exit();
        }
    }
    
    // Obtener datos del proveedor para editar si se proporciona un ID
    $personalId = isset($_GET['codigo']) ? $_GET['codigo'] : null;
    
    if ($personalId) 
    {
        $consultaPersonal = "SELECT * FROM empleados WHERE Cod_empleado = $personalId";
        $resultadoPersonal = mysqli_query($conexion, $consultaPersonal);
    
        if (!$resultadoPersonal) 
        {
            die("Error al obtener datos del personal: " . mysqli_error($conexion));
        }
    
        // Verificar si se encontraron datos del proveedor
        if ($rowPersonal = mysqli_fetch_assoc($resultadoPersonal)) 
        {
            // Datos del proveedor
            $Nom_empleado = $rowPersonal['Nom_empleado'];
            $Ape_empleado = $rowPersonal['Ape_empleado'];
            $DNI_empleado = $rowPersonal['DNI_empleado'];
            $Tlf_empleado = $rowPersonal['Tlf_empleado'];
            $Clave_acceso = $rowPersonal['Clave_acceso'];
    
            // Agregar readonly a los campos si se está editando un proveedor existente
            $readonly = "readonly";
        } else {
            // Manejar el caso en que no se encuentren datos del proveedor
            die("Personal no encontrado");
        }
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
    <header class="header2">
        <div class="navegacion">
            <a href="clientes1.php">Clientes</a><br>
            <a href="proveedores1.php">Proveedores</a><br>
            <a href="personal1.php">Personal</a><br>
            <a href="productos1.php">Productos</a><br>
            <a href="ventas.php">Ventas</a><br>
            <a href="compra1.php">Compra</a><br>
            <a class="negrita" href="pedido1.php">Pedidos</a><br>
            <a href="empresa1.php">Empresa</a><br>
        </div>
    </header>
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/repartidor.png" alt="">
            <p class ="medio">Personal</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos del personal</h2>
            </div>
            <form class="flex fondo_form" action="personal2.php?codigo=
            <?php echo $personalId; ?>" method="post">
                <div class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre Empleado:</p>
                            <input type="text" name="Nom_empleado" value="<?php echo $Nom_empleado; ?>" <?php echo $readonly; ?>>
                        </div>
                        <div class="pr1">
                            <p>Apellido:</p>
                            <input type="text" name="Ape_empleado" value="<?php echo $Ape_empleado; ?>" <?php echo $readonly; ?>>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>DNI:</p>
                            <input type="text" name="DNI_empleado" value="<?php echo $DNI_empleado; ?>" <?php echo $readonly; ?>>
                        </div>
                        <div class="pr1">
                            <p>Teléfono:</p>
                            <input type="text" name="Tlf_empleado" value="<?php echo $Tlf_empleado; ?>" <?php echo $readonly; ?>>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Clave acceso:</p>
                            <input type="text" name="Clave_acceso" value="<?php echo $Clave_acceso; ?>" <?php echo $readonly; ?>>
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





