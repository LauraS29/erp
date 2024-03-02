<?php
require_once '../Db/ConDb.php';


require_once '../Models/empresa1_1Model.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Tlf_empresa = $_POST['Tlf_empresa'];
    $Nom_empresa = $_POST['Nom_empresa'];
    $Cod_postal_empresa = $_POST['Cod_postal_empresa'];
    $Localidad_empresa = $_POST['Localidad_empresa'];
    $Provincia_empresa = $_POST['Provincia_empresa'];
    $Email_empresa = $_POST['Email_empresa'];
    $Tlf_empresa = $_POST['Tlf_empresa'];
    $Observaciones = $_POST['Observaciones'];


    $insertar = "INSERT INTO empresa(Tlf_empresa, Nom_empresa, Cod_postal_empresa, Localidad_empresa, Provincia_empresa, Email_empresa, Tlf_empresa, Observaciones) VALUES ('$Tlf_empresa','$Nom_empresa','$Cod_postal_empresa','$Localidad_empresa','$Provincia_empresa','$Email_empresa','$Tlf_empresa','$Observaciones')";


    $query = mysqli_query($mysqli, $insertar);


    if($query) {
        header("Location: ../empresa1.php");
    } else {
        echo "incorrecto: " . mysqli_error($mysqli);
    }
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
