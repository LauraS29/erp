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
    $Cod_cliente = '';
    $Nom_cliente = '';
    $Ap_cliente = '';
    $Tlf_cliente = '';
    $Email_cliente = '';
    $DNI_cliente = '';
    $Provincia = '';
    $Localidad = '';
    $readonly = '';
    
    // Proceso del formulario
    if (isset($_POST['guardar'])) 
    {
        // Obtener los datos del formulario
        $Cod_cliente = $_POST['Cod_cliente'];
        $Nom_cliente = $_POST['Nom_cliente'];
        $Ap_cliente = $_POST['Ap_cliente'];
        $Tlf_cliente = $_POST['Tlf_cliente'];
        $Email_cliente = $_POST['Email_cliente'];
        $DNI_cliente = $_POST['DNI_cliente'];
        $Provincia = $_POST['Provincia'];
        $Localidad = $_POST['Localidad'];
        
        // Verificar si se recibió un ID para la edición
        $clienteId = isset($_GET['codigo']) ? $_GET['codigo'] : null;
    
        if ($clienteId) 
        {
            // Actualizar los datos del cliente existente
            $actualizarDatos = "UPDATE Cliente SET Cod_cliente='$Cod_cliente', Nom_cliente='$Nom_cliente', Ap_cliente='$Ap_cliente', Tlf_cliente='$Tlf_cliente', Email_cliente='$Email_cliente', DNI_cliente='$DNI_cliente', Provincia='$Provincia', Localidad='$Localidad' WHERE Cod_cliente = $clienteId";
    
            $ejecutarActualizar = mysqli_query($conexion, $actualizarDatos);
    
            if (!$ejecutarActualizar) 
            {
                die("Error al actualizar datos: " . mysqli_error($conexion));
            }
    
            // Redireccionar a clientes1.php
            header("Location: clientes1.php");
            exit();
        } else {
            // Insertar todos los datos en la tabla proveedores
            $insertarDatos = "INSERT INTO Cliente (Cod_cliente, Nom_cliente, Ap_cliente, Tlf_cliente, Email_cliente, DNI_cliente, Provincia, Localidad) VALUES ('$Cod_cliente', '$Nom_cliente', '$Ap_cliente', '$Tlf_cliente', '$Email_cliente', '$DNI_cliente', '$Provincia', '$Localidad')";
    
            $ejecutarInsertar = mysqli_query($conexion, $insertarDatos);
    
            if (!$ejecutarInsertar) {
                die("Error al insertar datos: " . mysqli_error($conexion));
            }
    
            // Obtener el ID del último registro insertado
            $lastInsertId = mysqli_insert_id($conexion);
    
            // Redireccionar a clientes1.php con el ID del nuevo proveedor
            header("Location: clientes1.php?id=$lastInsertId");
            exit();
        }
    }
    
    // Obtener datos del proveedor para editar si se proporciona un ID
    $clienteId = isset($_GET['codigo']) ? $_GET['codigo'] : null;
    
    if ($clienteId) 
    {
        $consultacliente = "SELECT * FROM cliente WHERE Cod_cliente = $clienteId";
        $resultadocliente = mysqli_query($conexion, $consultacliente);
    
        if (!$resultadocliente) 
        {
            die("Error al obtener datos del cliente: " . mysqli_error($conexion));
        }
    
        // Verificar si se encontraron datos del proveedor
        if ($rowcliente = mysqli_fetch_assoc($resultadocliente)) 
        {
            // Datos del proveedor
            $Cod_cliente = $rowcliente['Cod_cliente'];
            $Nom_cliente = $rowcliente['Nom_cliente'];
            $Ap_cliente = $rowcliente['Ap_cliente'];
            $Tlf_cliente = $rowcliente['Tlf_cliente'];
            $Email_cliente = $rowcliente['Email_cliente'];
            $DNI_cliente = $rowcliente['DNI_cliente'];
            $Provincia= $rowcliente['Provincia'];
            $Localidad = $rowcliente['Localidad'];
    
            // Agregar readonly a los campos si se está editando un proveedor existente
            $readonly = "readonly";
        } else {
            // Manejar el caso en que no se encuentren datos del proveedor
            die("Cliente no encontrado");
        }
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body class = "flex">
<header class = "header2">
        <div class="navegacion" id="p1">
            <a class="negrita" href="clientes1.php">Clientes</a><br>
            <a href="proveedores1.php">Proveedores</a><br>
            <a href="personal1.php">Personal</a><br>
            <a href="productos1.php">Productos</a><br>
            <a href="ventas.php">Ventas</a><br>
            <a href="compra1.php">Compra</a><br>
            <a href="pedido1.php">Pedidos</a><br>
        </div>
    </header>
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/clientes.png" alt="">
            <p>Clientes</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de clientes</h2>
            </div>
            <form class="flex fondo_form" action="clientes2.php?codigo=
            <?php echo $clienteId; ?>" method="post">
                <div class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Código:</p>
                            <input type="text" name="Cod_cliente" value="<?php echo $Cod_cliente; ?>" <?php echo $readonly; ?>>
                        </div>
                        <div class="pr1">
                            <p>Nombre:</p>
                            <input type="text" name="Nom_cliente" value="<?php echo $Nom_cliente; ?>" <?php echo $readonly; ?>>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Apellidos:</p>
                            <input type="text" name="Ap_cliente" value="<?php echo $Ap_cliente; ?>" <?php echo $readonly; ?>>
                        </div>
                        <div class="pr1">
                            <p>Localidad:</p>
                            <input type="text" name="Localidad" value="<?php echo $Localidad; ?>" <?php echo $readonly; ?>>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Dirección:</p>
                            <input type="text" name="Provincia" value="<?php echo $Provincia; ?>" <?php echo $readonly; ?>>
                        </div>
                        <div class="pr1">
                            <p>Teléfono:</p>
                            <input type="text" name="Tlf_cliente" value="<?php echo $Tlf_cliente; ?>" <?php echo $readonly; ?>>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Email:</p>
                            <input type="email" name="Email_cliente" value="<?php echo $Email_cliente; ?>" <?php echo $readonly; ?>>
                        </div>
                        <div class="pr1">
                            <p>DNI:</p>
                            <input type="text" name="DNI_cliente" value="<?php echo $DNI_cliente; ?>" <?php echo $readonly; ?>>
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
