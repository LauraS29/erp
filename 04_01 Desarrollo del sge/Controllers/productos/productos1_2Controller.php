<?php
require_once '../../Db/ConDb.php';
require_once '../../Models/productos1_1Model.php';

// Verificamos si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $mysqli = Connection::conn1();

    // Verificamos si la conexión fue exitosa
    if (!$mysqli) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    $Cod_producto = $_POST['Cod_producto'];
    $Nom_producto = $_POST['Nom_producto'];
    $Pre_producto = $_POST['Pre_producto'];
    $Cantidad_producto = $_POST['Cantidad_producto'];

    $insertar = "INSERT INTO productos(Cod_producto, Nom_producto, Pre_producto, Cantidad_producto) 
                 VALUES ('$Cod_producto', '$Nom_producto','$Pre_producto', '$Cantidad_producto')";

    $query = mysqli_query($mysqli, $insertar);

    if ($query) {
        header("Location: ../../productos1.php");
    } else {
        echo "incorrecto: " . mysqli_error($mysqli);
    }

    // Cerramos la conexión
    mysqli_close($mysqli);
}

function obtenerProducto() {
    global $mysqli;

    $producto = array();

    $consulta = "SELECT * FROM productos";
    $resultado = mysqli_query($mysqli, $consulta);

    if ($resultado) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $producto[] = $fila;
        }

        mysqli_free_result($resultado);
    } else {
        echo "Error en la consulta: " . mysqli_error($mysqli);
    }

    return $producto;
}
?>
