

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
    <?php require_once "Views/Encabezado/Menu.php"; ?>
    
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/clientes.png" alt="">
            <p class ="medio">Clientes</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de los clientes</h2>
            </div>
<<<<<<< HEAD
            <?php
                // ["(Esto de dentro es el name de los input)"]
                $id=$_POST["Cod_cliente"];
                $nombre = $_POST["Nom_cliente"];
                $apellido = $_POST["Ape_cliente"];
                $email = $_POST["Email_cliente"];
                $telefono = $_POST["Tlf_cliente"];
                $dni = $_POST["DNI_cliente"];
                $cod_postal = $_POST["Cod_postal_cliente"];
                $localidad = $_POST["Localidad_cliente"];
                $provincia = $_POST["Provincia_cliente"];
                $observaciones = $_POST["Observaciones"];

                // Condición para que se ejecute el codigo cuando le hagamos click al boton actualizar
                if(isset($_POST["actualizar"]))
                {
                    // Esto hara la actualizacion a la base de datos
                    include("Db/ConDb.php");
                    // estancia de clase
                    $getconnection=new Connection();
                    // llamamos a la funcion de esa clase
                    // (conex = nombre de la funcion q tenemos en conexion.php)
                    $getconn1=$getconnection->conn1();

                    // query q realizara la edicion
                    // 1º nombre de la tabla, 2º cada nombre de las columnas q editaremos
                    // la ? es para la proteccion a inyeccion sql
                    // WHERE = q edite esos registros don el id sea igual al id q elijamos
                    $query="UPDATE cliente SET Nom_cliente=?, Ape_cliente=?, Email_cliente=?, Tlf_cliente=?, DNI_cliente=?, Cod_postal_cliente=?, Localidad_cliente=?, Provincia_cliente=?, Observaciones=? WHERE Cod_cliente=?";
                    // preparar este query
                    $sentencia=mysqli_prepare($getconn1, $query);
                    // cargaremos los valores q iran en cada ?
                    // e iran a la variable $sentencia, y definiremos el tipo de valores (s=string,  =entero)
                    mysqli_stmt_bind_param($sentencia,"sssssssssi", $nombre, $apellido, $email, $telefono, $dni, $cod_postal, $localidad, $provincia, $observaciones, $id);
                    // ahora podremos hacer toda la ejecucion de la sentencia
                    mysqli_stmt_execute($sentencia);
                    // para saber si se ejecuto y las filas q fueron afectadas
                    $afectado=mysqli_stmt_affected_rows($sentencia);
                    // condicion
                    // si se edito un registro nos mostrara un mensaje, si no pues otro mensaje
                    if($afectado==1)
                    {
                        echo "<script> alert('El empleado $nombre se edito correctamente :) '); location.href='clientes1.php' </script>";
                    } else{
                        echo "<script> alert('El empleado $nombre no se edito :( '); location.href='clientes1.php' </script>";
                    }
                    // ahora solo cerramos la sentencia
                    mysqli_stmt_close($sentencia);
                    // y cerramos la conexion
                    mysqli_close($getconn1);
                }
            ?>
            <?php require_once "Controllers/clientes1_actualizar.php"; ?>
            <form class="flex fondo_form" action="actualizar_fila.php" method="post">
                <div class="primer_div">
                <input type="hidden" value="<?php echo $id ?>" name="Cod_cliente">
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre:</p>
                            <input type="text" name="Nom_cliente" id="Nom_cliente" value="<?php echo $nombre ?>">
                        </div>
                        <div class="pr1">
                            <p>Apellidos:</p>
                            <input type="text" name="Ape_cliente" id="Ape_cliente" value="<?php echo $apellido ?>">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Email:</p>
                            <input type="email" name="Email_cliente" id="Email_cliente" value="<?php echo $email ?>">
                        </div>
                        <div class="pr1">
                            <p>Teléfono:</p>
                            <input type="text" name="Tlf_cliente" id="Tlf_cliente" value="<?php echo $telefono ?>">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>DNI:</p>
                            <input type="text" name="DNI_cliente" id="DNI_cliente" value="<?php echo $dni ?>">
                        </div>
                        <div class="pr1">
                            <p>Codigo Postal:</p>
                            <input type="text" name="Cod_postal_cliente" id="Cod_postal__cliente" value="<?php echo $cod_postal ?>">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Localidad:</p>
                            <input type="text" name="Localidad_cliente" id="Localidad_cliente" value="<?php echo $localidad ?>">
                        </div>
                       <div class="pr1">
                            <p>Dirección:</p>
                            <input type="text" name="Provincia_cliente" id="Provincia_cliente" value="<?php echo $provincia ?>">
                        </div> 
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Observaciones:</p>

                            <textarea name="Observaciones" id="Observaciones" cols="30" rows="10"><?php echo $observaciones ?></textarea>

                            <textarea name="Observaciones" id ="Observaciones" cols="30" rows="10" value="<?php echo $observaciones ?>"></textarea>
                        </div>
                    </div>
                </div>
                <div class="segundo_div imagen-botones">
                    <img src="Assets/img/usuario.png" alt="">
                    <div class="buttons">
                        <div>
                            <input type="submit" name="guardar" id="boton1" value="Guardar">
                        </div>
                        <div>
                            <input type="submit" name="actualizar" value="Actualizar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>