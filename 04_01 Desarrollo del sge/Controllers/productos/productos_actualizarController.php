<?php
// ["(Esto de dentro es el name de los input)"]
$id = isset($_POST["Cod_producto"]) ? $_POST["Cod_producto"] : '';
$nombre = isset($_POST["Nom_producto"]) ? $_POST["Nom_producto"] : '';
$precio = isset($_POST["Pre_producto"]) ? $_POST["Pre_producto"] : '';
$cantidad = isset($_POST["Cantidad_producto"]) ? $_POST["Cantidad_producto"] : '';

// Condición para que se ejecute el código cuando le hagamos click al botón actualizar
if (isset($_POST["actualizar"])) {
    // Esto hará la actualización a la base de datos
    include_once("../../Db/ConDb.php");
    // Instancia de la clase
    $getconnection = new Connection();
    // Llamamos a la función de esa clase (conn1 = nombre de la función que tenemos en ConDb.php)
    $getconn1 = $getconnection->conn1();

    // Query que realizará la edición
    // Añadimos el WHERE para indicar qué registro actualizar
    $query = "UPDATE productos SET Nom_producto=?, Pre_producto=?, Cantidad_producto=? WHERE Cod_producto=?";
    // Preparar este query
    $sentencia = mysqli_prepare($getconn1, $query);
    // Cargaremos los valores que irán en cada ?
    // e irán a la variable $sentencia, y definiremos el tipo de valores (s=string, i=entero)
    mysqli_stmt_bind_param($sentencia, "siii", $nombre, $precio, $cantidad, $id);
    // Ahora podremos hacer toda la ejecución de la sentencia
    mysqli_stmt_execute($sentencia);
    // Para saber si se ejecutó y las filas que fueron afectadas
    $afectado = mysqli_stmt_affected_rows($sentencia);
    // Condición
    // Si se editó un registro nos mostrará un mensaje, si no, otro mensaje
    if ($afectado == 1) {
        echo "<script> alert('El producto $nombre se editó correctamente :) '); location.href='../../productos1.php' </script>";
    } else {
        echo "<script> alert('El producto $nombre no se editó :( '); location.href='../../productos1.php' </script>";
    }
    // Ahora solo cerramos la sentencia
    mysqli_stmt_close($sentencia);
    // Y cerramos la conexión
    mysqli_close($getconn1);
}
?>
