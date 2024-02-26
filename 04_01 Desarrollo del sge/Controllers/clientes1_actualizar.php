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
        $query="UPDATE cliente SET Nom_cliente=?, Ape_cliente=?, Email_cliente=?, Tlf_cliente=?, DNI_cliente=?, Cod_postal_cliente=?, Localidad_cliente=?, Provincia_cliente=? WHERE Cod_cliente=?";
        // preparar este query
        $sentencia=mysqli_prepare($getconn1, $query);
        // cargaremos los valores q iran en cada ?
        // e iran a la variable $sentencia, y definiremos el tipo de valores (s=string,  =entero)
        mysqli_stmt_bind_param($sentencia,"ssssssssi", $nombre, $apellido, $email, $telefono, $dni, $cod_postal, $localidad, $provincia, $id);
        // ahora podremos hacer toda la ejecucion de la sentencia
        mysqli_stmt_execute($sentencia);
        // para saber si se ejecuto y las filas q fueron afectadas
        $afectado=mysqli_stmt_affected_rows($sentencia);

        // condicion
        // si se edito un registro nos mostrara un mensaje, si no pues otro mensaje
        if($afectado==1)
        {
            echo "<script> alert('El empleado $nombre se ha editado correctamente :) '); location.href='clientes1.php' </script>";
        } 
        else{
            echo "<script> alert('El empleado $nombre no se ha editado :( '); location.href='clientes1.php' </script>";
        }
        // ahora solo cerramos la sentencia
        mysqli_stmt_close($sentencia);
        // y cerramos la conexion
        mysqli_close($getconn1);
    }
?>