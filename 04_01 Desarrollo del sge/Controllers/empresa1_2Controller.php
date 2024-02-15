<?php
require_once '../Db/ConDb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Cod_empresa = $_POST['Cod_empresa'];
    $Nom_empresa = $_POST['Nom_empresa'];
    $Tlf_empresa = $_POST['Tlf_empresa'];
    $Email_empresa = $_POST['Email_empresa'];
    $Cod_postal_empresa = $_POST['Cod_postal_empresa'];
    $Localidad_empresa = $_POST['Localidad_empresa'];
    $Provincia_empresa = $_POST['Provincia_empresa'];
    $Direccion_empresa = $_POST['Direccion_empresa'];
    
    
    $Observaciones = $_POST['Observaciones'];

    $insertar = "INSERT INTO empresa(Cod_empresa, Nom_empresa, Tlf_empresa, Email_empresa, Cod_postal_empresa, Localidad_empresa, Provincia_empresa, Direccion_empresa) VALUES ('$Cod_empresa','$Nom_empresa','$Tlf_empresa','$Email_empresa','$Cod_postal_empresa','$Localidad_empresa','$Provincia_empresa','$Direccion_empresa')";

    $query = mysqli_query($mysqli, $insertar);

    if($query) {
        header("Location: ../empresa1.php");
    } else {
        echo "incorrecto: " . mysqli_error($mysqli);
    }
}

function obtenerEmpresa() {
    global $mysqli; // Asegúrate de que $mysqli esté disponible en este ámbito

    $empresas = array();

    $consulta = "SELECT * FROM empresa";
    $resultado = mysqli_query($mysqli, $consulta);

    if ($resultado) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $empresas[] = $fila;
        }

        mysqli_free_result($resultado);
    } else {
        echo "Error en la consulta: " . mysqli_error($mysqli);
    }

    return $empresas;
}
?>
