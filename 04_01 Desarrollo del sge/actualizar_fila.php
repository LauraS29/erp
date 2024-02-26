<?php
require_once("./Models/clientes1_1Model.php");

if (isset($_POST["actualizar"])) {
    $clienteModel = new ClienteModel();

    $id = isset($_POST["Cod_cliente"]) ? $_POST["Cod_cliente"] : "";
    $nombre = isset($_POST["Nom_cliente"]) ? $_POST["Nom_cliente"] : "";
    $apellido = isset($_POST["Ape_cliente"]) ? $_POST["Ape_cliente"] : "";
    $email = isset($_POST["Email_cliente"]) ? $_POST["Email_cliente"] : "";
    $telefono = isset($_POST["Tlf_cliente"]) ? $_POST["Tlf_cliente"] : "";
    $dni = isset($_POST["DNI_cliente"]) ? $_POST["DNI_cliente"] : "";
    $cod_postal = isset($_POST["Cod_postal_cliente"]) ? $_POST["Cod_postal_cliente"] : "";
    $localidad = isset($_POST["Localidad_cliente"]) ? $_POST["Localidad_cliente"] : "";
    $provincia = isset($_POST["Provincia_cliente"]) ? $_POST["Provincia_cliente"] : "";
    $observaciones = isset($_POST["Observaciones"]) ? $_POST["Observaciones"] : "";

    $afectado = $clienteModel->actualizarCliente($id, $nombre, $apellido, $email, $telefono, $dni, $cod_postal, $localidad, $provincia, $observaciones);

    if ($afectado == 1) {
        echo "<script> alert('El empleado $nombre se editó correctamente :) '); location.href='clientes1.php' </script>";
    } else {
        echo "<script> alert('El empleado $nombre no se editó :( '); location.href='clientes1.php' </script>";
    }
}
?>
