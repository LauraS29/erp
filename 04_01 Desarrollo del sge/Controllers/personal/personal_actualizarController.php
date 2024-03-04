<?php
                // ["(Esto de dentro es el name de los input)"]
                $id = isset($_POST["Cod_empleado"]) ? $_POST["Cod_empleado"] : '';
                $nombre = isset($_POST["Nom_empleado"]) ? $_POST["Nom_empleado"] : '';
                $apellido = isset($_POST["Ape_empleado"]) ? $_POST["Ape_empleado"] : '';
                $dni = isset($_POST["DNI_empleado"]) ? $_POST["DNI_empleado"] : '';
                $tlf = isset($_POST["Tlf_empleado"]) ? $_POST["Tlf_empleado"] : '';
                $clave = isset($_POST["Clave_acceso"]) ? $_POST["Clave_acceso"] : '';

                // Condición para que se ejecute el código cuando le hagamos click al botón actualizar
                if (isset($_POST["actualizar"])) {
                    // Esto hará la actualización a la base de datos
                    include_once("../../Db/ConDb.php");
                    // Instancia de la clase
                    $getconnection = new Connection();
                    // Llamamos a la función de esa clase (conn1 = nombre de la función que tenemos en ConDb.php)
                    $getconn1 = $getconnection->conn1();

                    // Query que realizará la edición
                    // 1º nombre de la tabla, 2º cada nombre de las columnas que editaremos
                    // la ? es para la protección contra la inyección sql
                    // WHERE = que edite esos registros donde el id sea igual al id que elijamos
                    $query = "UPDATE empleados SET Nom_empleado=?,Ape_empleado=?, DNI_empleado=?, Tlf_empleado=?,Clave_acceso=? WHERE Cod_empleado=?";
                    // Preparar este query
                    $sentencia = mysqli_prepare($getconn1, $query);
                    // Cargaremos los valores que irán en cada ?
                    // e irán a la variable $sentencia, y definiremos el tipo de valores (s=string, i=entero)
                    mysqli_stmt_bind_param($sentencia, "sssssi", $nombre, $apellido, $dni, $tlf, $clave, $id);
                    // Ahora podremos hacer toda la ejecución de la sentencia
                    mysqli_stmt_execute($sentencia);
                    // Para saber si se ejecutó y las filas que fueron afectadas
                    $afectado = mysqli_stmt_affected_rows($sentencia);
                    // Condición
                    // Si se editó un registro nos mostrará un mensaje, si no, otro mensaje
                    if ($afectado == 1) {
                        echo "<script> alert('El empleados $nombre se editó correctamente :) '); location.href='../../personal1.php' </script>";
                    } else {
                        echo "<script> alert('El empleados $nombre no se editó :( '); location.href='../../personal1.php' </script>";
                    }
                    // Ahora solo cerramos la sentencia
                    mysqli_stmt_close($sentencia);
                    // Y cerramos la conexión
                    mysqli_close($getconn1);
                }
            ?>