<?php
require_once '../../Db/ConDb.php';
require_once '../../Models/clientes1_1Model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $mysqli = Connection::conn1();

    // Verificamos si la conexión fue exitosa
    if (!$mysqli) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    $DNI_cliente = $_POST['DNI_cliente'];
    $Nom_cliente = $_POST['Nom_cliente'];
    $Ape_cliente = $_POST['Ape_cliente'];
    $Cod_postal_cliente = $_POST['Cod_postal_cliente'];
    $Localidad_cliente = $_POST['Localidad_cliente'];
    $Provincia_cliente = $_POST['Provincia_cliente'];
    $Email_cliente = $_POST['Email_cliente'];
    $Tlf_cliente = $_POST['Tlf_cliente'];
    $Observaciones = $_POST['Observaciones'];

    $insertar = "INSERT INTO cliente(DNI_cliente, Nom_cliente, Ape_cliente, Cod_postal_cliente, Localidad_cliente, Provincia_cliente, Email_cliente, Tlf_cliente, Observaciones) VALUES ('$DNI_cliente','$Nom_cliente','$Ape_cliente','$Cod_postal_cliente','$Localidad_cliente','$Provincia_cliente','$Email_cliente','$Tlf_cliente','$Observaciones')";

    $query = mysqli_query($mysqli, $insertar);

    if($query) {
        header("Location: ../../clientes1.php");
    } else {
        echo "incorrecto: " . mysqli_error($mysqli);
    }
    
    // Cerramos la conexión
    mysqli_close($mysqli);
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
