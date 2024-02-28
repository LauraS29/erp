<?php
                // ["(Esto de dentro es el name de los input)"]
                $id = isset($_POST["Cod_cliente"]) ? $_POST["Cod_cliente"] : '';
                $nombre = isset($_POST["Nom_cliente"]) ? $_POST["Nom_cliente"] : '';
                $apellido = isset($_POST["Ape_cliente"]) ? $_POST["Ape_cliente"] : '';
                $email = isset($_POST["Email_cliente"]) ? $_POST["Email_cliente"] : '';
                $telefono = isset($_POST["Tlf_cliente"]) ? $_POST["Tlf_cliente"] : '';
                $dni = isset($_POST["DNI_cliente"]) ? $_POST["DNI_cliente"] : '';
                $cod_postal = isset($_POST["Cod_postal_cliente"]) ? $_POST["Cod_postal_cliente"] : '';
                $localidad = isset($_POST["Localidad_cliente"]) ? $_POST["Localidad_cliente"] : '';
                $provincia = isset($_POST["Provincia_cliente"]) ? $_POST["Provincia_cliente"] : '';
                $observaciones = isset($_POST["Observaciones"]) ? $_POST["Observaciones"] : '';




                // Condición para que se ejecute el código cuando le hagamos click al botón actualizar
                if (isset($_POST["actualizar"])) {
                    // Esto hará la actualización a la base de datos
                    include("./Db/ConDb.php");
                    // Instancia de la clase
                    $getconnection = new Connection();
                    // Llamamos a la función de esa clase (conn1 = nombre de la función que tenemos en ConDb.php)
                    $getconn1 = $getconnection->conn1();


                    // Query que realizará la edición
                    // 1º nombre de la tabla, 2º cada nombre de las columnas que editaremos
                    // la ? es para la protección contra la inyección sql
                    // WHERE = que edite esos registros donde el id sea igual al id que elijamos
                    $query = "UPDATE cliente SET Nom_cliente=?, Ape_cliente=?, Email_cliente=?, Tlf_cliente=?, DNI_cliente=?, Cod_postal_cliente=?, Localidad_cliente=?, Provincia_cliente=?, Observaciones=? WHERE Cod_cliente=?";
                    // Preparar este query
                    $sentencia = mysqli_prepare($getconn1, $query);
                    // Cargaremos los valores que irán en cada ?
                    // e irán a la variable $sentencia, y definiremos el tipo de valores (s=string, i=entero)
                    mysqli_stmt_bind_param($sentencia, "sssssssssi", $nombre, $apellido, $email, $telefono, $dni, $cod_postal, $localidad, $provincia, $observaciones, $id);
                    // Ahora podremos hacer toda la ejecución de la sentencia
                    mysqli_stmt_execute($sentencia);
                    // Para saber si se ejecutó y las filas que fueron afectadas
                    $afectado = mysqli_stmt_affected_rows($sentencia);
                    // Condición
                    // Si se editó un registro nos mostrará un mensaje, si no, otro mensaje
                    if ($afectado == 1) {
                        echo "<script> alert('El empleado $nombre se editó correctamente :) '); location.href='clientes1.php' </script>";
                    } else {
                        echo "<script> alert('El empleado $nombre no se editó :( '); location.href='clientes1.php' </script>";
                    }
                    // Ahora solo cerramos la sentencia
                    mysqli_stmt_close($sentencia);
                    // Y cerramos la conexión
                    mysqli_close($getconn1);
                }
?>