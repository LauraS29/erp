<?php
                // ["(Esto de dentro es el name de los input)"]
                $id = isset($_POST["Cod_proveedor"]) ? $_POST["Cod_proveedor"] : '';
                $nombre = isset($_POST["Nom_proveedor"]) ? $_POST["Nom_proveedor"] : '';
                $telefono = isset($_POST["Tlf_proveedor"]) ? $_POST["Tlf_proveedor"] : '';
                $email = isset($_POST["Email_proveedor"]) ? $_POST["Email_proveedor"] : '';
                $cod_postal = isset($_POST["Cod_postal_proveedor"]) ? $_POST["Cod_postal_proveedor"] : '';
                $provincia = isset($_POST["Provincia_proveedor"]) ? $_POST["Provincia_proveedor"] : '';
                $localidad = isset($_POST["Localidad_proveedor"]) ? $_POST["Localidad_proveedor"] : '';
                $Cod = isset($_POST["Cod_empresa"]) ? $_POST["Cod_empresa"] : '';
                $Nom = isset($_POST["Nom_empresa"]) ? $_POST["Nom_empresa"] : '';

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
                    $query = "UPDATE proveedores SET Nom_proveedor=?,Tlf_proveedor=?, Email_proveedor=?, Cod_postal_proveedor=?, Provincia_proveedor=?,Localidad_proveedor=?, Cod_empresa=?, Nom_empresa=? WHERE Cod_proveedor=?";
                    // Preparar este query
                    $sentencia = mysqli_prepare($getconn1, $query);
                    // Cargaremos los valores que irán en cada ?
                    // e irán a la variable $sentencia, y definiremos el tipo de valores (s=string, i=entero)
                    mysqli_stmt_bind_param($sentencia, "ssssssssi", $nombre, $telefono, $email, $cod_postal, $provincia,$localidad,  $Cod, $Nom, $id);
                    // Ahora podremos hacer toda la ejecución de la sentencia
                    mysqli_stmt_execute($sentencia);
                    // Para saber si se ejecutó y las filas que fueron afectadas
                    $afectado = mysqli_stmt_affected_rows($sentencia);
                    // Condición
                    // Si se editó un registro nos mostrará un mensaje, si no, otro mensaje
                    if ($afectado == 1) {
                        echo "<script> alert('El proveedor $nombre se editó correctamente :) '); location.href='../../proveedores1.php' </script>";
                    } else {
                        echo "<script> alert('El proveedor $nombre no se editó :( '); location.href='../../proveedores1.php' </script>";
                    }
                    // Ahora solo cerramos la sentencia
                    mysqli_stmt_close($sentencia);
                    // Y cerramos la conexión
                    mysqli_close($getconn1);
                }
            ?>