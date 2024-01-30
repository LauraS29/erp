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
    $Cod_empleado = '';
    $Nom_empleado = '';
    $Ape_empleado = '';
    $DNI_empleado = '';
    $Tlf_empleado = '';
    $readonly = '';
    
    // Proceso del formulario
    if (isset($_POST['guardar'])) 
    {
        // Obtener los datos del formulario
        $Cod_empleado = $_POST['Cod_empleado'];
        $Nom_empleado = $_POST['Nom_empleado'];
        $DNI_empleado = $_POST['DNI_empleado'];
        $Tlf_empleado = $_POST['Tlf_empleado'];
        $Ape_empleado = $_POST['Ape_empleado'];
        
        // Verificar si se recibió un ID para la edición
        $personalId = isset($_GET['codigo']) ? $_GET['codigo'] : null;
    
        if ($personalId) 
        {
            // Actualizar los datos del proveedor existente
            $actualizarDatos = "UPDATE empleados SET Cod_empleado='$Cod_empleado', Nom_empleado='$Nom_empleado', Tlf_empleado='$Tlf_empleado', DNI_empleado='$DNI_empleado', Ape_empleado='$Ape_empleado' WHERE Cod_empleado = $personalId";

    
            $ejecutarActualizar = mysqli_query($conexion, $actualizarDatos);
    
            if (!$ejecutarActualizar) 
            {
                die("Error al actualizar datos: " . mysqli_error($conexion));
            }
    
            // Redireccionar a personal1.php
            header("Location: personal1.php");
            exit();
        } else {
            // Insertar todos los datos en la tabla proveedores
            $insertarDatos = "INSERT INTO empleados (Cod_empleado, Nom_empleado, Tlf_empleado, DNI_empleado, Ape_empleado) VALUES ('$Cod_empleado', '$Nom_empleado', '$Tlf_empleado', '$Ape_empleado', '$DNI_empleado')";
    
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
            $Cod_empleado= $rowPersonal['Cod_empleado'];
            $Nom_empleado = $rowPersonal['Nom_empleado'];
            $Tlf_empleado = $rowPersonal['Tlf_empleado'];
            $Ape_empleado= $rowPersonal['Ape_empleado'];

    
            // Agregar readonly a los campos si se está editando un proveedor existente
            $readonly = "readonly";
        } else {
            // Manejar el caso en que no se encuentren datos del proveedor
            die("Empleado no encontrado");
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
    <header class = "header2">
        <div class="navegacion">
            <a href="clientes1.php">Clientes</a><br>
            <a href="proveedores1.php">Proveedores</a><br>
            <a class="negrita" href="personal1.php">Personal</a><br>
            <a href="productos1.php">Productos</a><br>
            <a href="ventas.php">Ventas</a><br>
            <a href="compra1.php">Compra</a><br>
            <a href="pedido1.php">Pedidos</a><br>
        </div>
    </header>
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/personal.png" alt="">
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
                            <p>Código empleado:</p>
                            <input type="text" name="Cod_empleado" value="<?php echo $Cod_empleado; ?>" <?php echo $readonly; ?>>
                        </div>
                        <div class="pr1">
                            <p>Teléfono de contacto:</p>
                            <input type="text" name="Tlf_empleado" value="<?php echo $Tlf_empleado; ?>" <?php echo $readonly; ?>>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre:</p>
                            <input type="text" name="Nom_empleado" value="<?php echo $Nom_empleado; ?>" <?php echo $readonly; ?>>
                        </div>
                        
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Apellidos:</p>
                            <input type="text" name="Ape_empleado" value="<?php echo $Ape_empleado; ?>" <?php echo $readonly; ?>>
                        </div>
                        <div class="pr1">
                            <p>DNI:</p>
                            <input type="text" name="DNI_empleado" value="<?php echo $DNI_empleado; ?>" <?php echo $readonly; ?>>
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
            </div>
            </form>
        </div>
    </section>
</body>
</html>