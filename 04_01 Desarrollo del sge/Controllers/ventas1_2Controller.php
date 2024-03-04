<?php
require_once '../Db/ConDb.php';


// No necesitamos incluir el modelo de ventas1_1Model.php ya que no se usa en este código.


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Cod_cliente = $_POST['Cod_cliente'];
    $Fecha_venta = $_POST['Fecha_venta'];
    $Total_venta = $_POST['Total_venta'];


    $insertar = "INSERT INTO ventas (Cod_cliente, Fecha_venta, Total_venta) VALUES ('$Cod_cliente','$Fecha_venta','$Total_venta')";


    $query = mysqli_query($mysqli, $insertar);


    if($query) {
        header("Location: ../clientes1.php");
    } else {
        echo "incorrecto: " . mysqli_error($mysqli);
    }
}


function obtenerventas() {
    global $mysqli;


    $ventas = array();


    $consulta = "SELECT * FROM ventas";
    $resultado = mysqli_query($mysqli, $consulta);


    if ($resultado) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $ventas[] = $fila;
        }


        mysqli_free_result($resultado);
    } else {
        echo "Error en la consulta: " . mysqli_error($mysqli);
    }


    return $ventas;
}


?>
