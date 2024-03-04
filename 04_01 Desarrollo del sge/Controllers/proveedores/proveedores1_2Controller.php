<?php
require_once '../../Db/ConDb.php';
require_once '../../Models/proveedores1_1Model.php';

// Verificamos si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $mysqli = Connection::conn1();

    // Verificamos si la conexión fue exitosa
    if (!$mysqli) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    $Cod_proveedor = $_POST['Cod_proveedor'];
    $Nom_proveedor = $_POST['Nom_proveedor'];
    $Tlf_proveedor = $_POST['Tlf_proveedor'];
    $Email_proveedor = $_POST['Email_proveedor'];
    $Cod_postal_proveedor = $_POST['Cod_postal_proveedor'];
    $Provincia_proveedor = $_POST['Provincia_proveedor'];
    $Localidad_proveedor = $_POST['Localidad_proveedor'];
    $Cod_empresa = $_POST['Cod_empresa'];
    $Nom_empresa = $_POST['Nom_empresa'];

    $insertar = "INSERT INTO proveedores(Cod_proveedor, Nom_proveedor, Tlf_proveedor, Email_proveedor, Cod_postal_proveedor, Provincia_proveedor, Localidad_proveedor,  Cod_empresa, Nom_empresa) 
    VALUES ('$Cod_proveedor', '$Nom_proveedor', '$Tlf_proveedor', '$Email_proveedor', '$Cod_postal_proveedor', '$Provincia_proveedor','$Localidad_proveedor', '$Cod_empresa', '$Nom_empresa')";

    $query = mysqli_query($mysqli, $insertar);

    if ($query) {
        header("Location: ../../proveedores1.php");
    } else {
        echo "incorrecto: " . mysqli_error($mysqli);
    }

    // Cerramos la conexión
    mysqli_close($mysqli);
}

function obtenerproveedor() {
    global $mysqli;

    $proveedor = array();

    $consulta = "SELECT * FROM proveedores";
    $resultado = mysqli_query($mysqli, $consulta);

    if ($resultado) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $proveedor[] = $fila;
        }

        mysqli_free_result($resultado);
    } else {
        echo "Error en la consulta: " . mysqli_error($mysqli);
    }

    return $proveedor;
}
?>
