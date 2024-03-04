<?php
require_once '../../Db/ConDb.php';
require_once '../../Models/empresa1_1Model.php';

// Verificamos si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $mysqli = Connection::conn1();

    // Verificamos si la conexión fue exitosa
    if (!$mysqli) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    $Cod_empresa = $_POST['Cod_empresa'];
    $Nom_empresa = $_POST['Nom_empresa'];
    $Tlf_empresa = $_POST['Tlf_empresa'];
    $Email_empresa = $_POST['Email_empresa'];
    $Cod_postal_empresa = $_POST['Cod_postal_empresa'];
    $Localidad_empresa = $_POST['Localidad_empresa'];
    $Provincia_empresa = $_POST['Provincia_empresa'];
    $Direccion_empresa = $_POST['Direccion_empresa'];

    $insertar = "INSERT INTO empresa(Cod_empresa, Nom_empresa, Tlf_empresa, Email_empresa, Cod_postal_empresa, Localidad_empresa, Provincia_empresa,  Direccion_empresa) 
                 VALUES ('$Cod_empresa', '$Nom_empresa','$Tlf_empresa', '$Email_empresa', '$Cod_postal_empresa','$Localidad_empresa', '$Provincia_empresa', '$Direccion_empresa')";

    $query = mysqli_query($mysqli, $insertar);

    if ($query) {
        header("Location: ../../empresa1.php");
    } else {
        echo "incorrecto: " . mysqli_error($mysqli);
    }

    // Cerramos la conexión
    mysqli_close($mysqli);
}

function obtenerEmpresa() {
    global $mysqli;

    $empresa = array();

    $consulta = "SELECT * FROM empresa";
    $resultado = mysqli_query($mysqli, $consulta);

    if ($resultado) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $empresa[] = $fila;
        }

        mysqli_free_result($resultado);
    } else {
        echo "Error en la consulta: " . mysqli_error($mysqli);
    }

    return $empresa;
}
?>
