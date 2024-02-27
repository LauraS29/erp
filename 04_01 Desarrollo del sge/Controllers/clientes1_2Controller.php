<?php
require_once '../Db/ConDb.php';

require_once '../Models/clientes1_1Model.php';
$mysqli = Connection::conn1();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
        header("Location: ../clientes1.php");
    } else {
        echo "incorrecto: " . mysqli_error($mysqli);
    }
}

function obtenerClientes() {
    global $mysqli; // Asegúrate de que $mysqli esté disponible en este ámbito

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
