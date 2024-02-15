<?php
require_once '../Db/ConDb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nom_proveedor = $_POST['Nom_proveedor'];
    $Tlf_proveedor = $_POST['Tlf_proveedor'];
    $Email_proveedor = $_POST['Email_proveedor'];
    $Cod_postal_proveedor = $_POST['Cod_postal_proveedor'];
    $Provincia_cliente = $_POST['Provincia_cliente'];
    $Localidad_cliente = $_POST['Localidad_cliente'];
    $Cod_empresa = $_POST['Cod_empresa'];
    $Nom_empresa = $_POST['Nom_empresa'];

    $insertar = "INSERT INTO cliente (Nom_proveedor, Nom_proveedor, Ape_cliente, Cod_postal_cliente, Localidad_cliente, Provincia_cliente, Email_cliente, Tlf_cliente, Observaciones) VALUES ('$DNI_cliente','$Nom_proveedor','$Ape_cliente','$Cod_postal_cliente','$Localidad_cliente','$Provincia_cliente','$Email_cliente','$Tlf_cliente','$Observaciones')";

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
