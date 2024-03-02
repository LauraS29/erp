<?php
require_once '../Db/ConDb.php';


require_once '../Models/personal1_1Model.php';




if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $DNI_empleado = $_POST['DNI_empleado'];
    $Nom_empleado = $_POST['Nom_empleado'];
    $Ape_empleado = $_POST['Ape_empleado'];
    $Email_empleado = $_POST['Email_empleado'];
    $Tlf_empleado = $_POST['Tlf_empleado'];
    $clave_acceso = $_POST['clave_acceso'];


    $insertar = "INSERT INTO empleados(DNI_empleado, Nom_empleado, Ape_empleado, Email_empleado, Tlf_empleado, Observaciones) VALUES ('$DNI_empleado','$Nom_empleado','$Ape_empleado','$Email_empleado','$Tlf_empleado','$clave_acceso')";


    $query = mysqli_query($mysqli, $insertar);


    if($query) {
        header("Location: ../personal1.php");
    } else {
        echo "incorrecto: " . mysqli_error($mysqli);
    }
}


function obtenerClientes() {
    global $mysqli;


    $clientes = array();


    $consulta = "SELECT * FROM cliente";
    $resultado = mysqli_query($mysqli, $consulta);


    if ($resultado) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $clientes[] = $fila;
        }


        mysqli_free_result($resultado);
    } else {
        echo "Error en la consulta: " . mysqli_error($mysqli);
    }


    return $clientes;
}






?>
