<?php
require_once '../Db/ConDb.php';

require_once '../Models/proveedores1_1Model.php';
$mysqli = Connection::conn1();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nom_proveedor = $_POST['Nom_proveedor'];
    $Tlf_proveedor = $_POST['Tlf_proveedor'];
    $Email_proveedor = $_POST['Email_proveedor'];
    $Cod_postal_proveedor = $_POST['Cod_postal_proveedor'];
    $Provincia_proveedor = $_POST['Provincia_proveedor'];
    $Localidad_proveedor = $_POST['Localidad_proveedor'];
    $Cod_empresa = $_POST['Cod_empresa'];
    $Nom_empresa = $_POST['Nom_empresa'];

    $insertar = "INSERT INTO proveedores (Nom_proveedor, Tlf_proveedor, Email_proveedor, Cod_postal_proveedor, Provincia_proveedor, Localidad_proveedor, Cod_empresa, Nom_empresa) VALUES ('$Nom_proveedor','$Tlf_proveedor','$Email_proveedor','$Cod_postal_proveedor','$Provincia_proveedor','$Localidad_proveedor','$Cod_empresa','$Nom_empresa')";

    $query = mysqli_query($mysqli, $insertar);

    if($query) {
        header("Location: ../proveedores1.php");
    } else {
        echo "incorrecto: " . mysqli_error($mysqli);
    }
}

function obtenerProveedores() {
    global $mysqli;

    $proveedores = array();

    $consulta = "SELECT * FROM proveedores";
    $resultado = mysqli_query($mysqli, $consulta);

    if ($resultado) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $proveedores[] = $fila;
        }

        mysqli_free_result($resultado);
    } else {
        echo "Error en la consulta: " . mysqli_error($mysqli);
    }

    return $proveedores;
}
?>
