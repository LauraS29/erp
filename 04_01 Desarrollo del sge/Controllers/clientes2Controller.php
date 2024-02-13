<?php

// Tratamiento de los input type='text'
$DNI_cliente = empty($_POST['DNI_cliente']) ? '' : $_POST['DNI_cliente'];
$Nom_cliente = empty($_POST['Nom_cliente']) ? '' : $_POST['Nom_cliente'];
$Ape_cliente = empty($_POST['Ape_cliente']) ? '' : $_POST['Ape_cliente'];
$Cod_postal_cliente = empty($_POST['Cod_postal_cliente']) ? '' : $_POST['Cod_postal_cliente'];
$Localidad_cliente = empty($_POST['Localidad_cliente']) ? '' : $_POST['Localidad_cliente'];
$Provincia_cliente = empty($_POST['Provincia_cliente']) ? '' : $_POST['Provincia_cliente'];
$Email_cliente = empty($_POST['Email_cliente']) ? '' : $_POST['Email_cliente'];
$Tlf_cliente = empty($_POST['Tlf_cliente']) ? '' : $_POST['Tlf_cliente'];
$Observaciones = empty($_POST['Observaciones']) ? '' : $_POST['Observaciones'];

// Llamada a la conexión
require_once './Db/ConDb.php';
// Llamada al modelo
require_once './Models/clientes2Model.php';

// Instancia del objeto
$oData = new Datos;

// Llamada al método
$sql = "INSERT INTO cliente (DNI_cliente, Nom_cliente, Ape_cliente, Cod_postal_cliente, Localidad_cliente, Provincia_cliente, Email_cliente, Tlf_cliente, Observaciones) VALUES ('$DNI_cliente', '$Nom_cliente', '$Ape_cliente', '$Cod_postal_cliente', '$Localidad_cliente', '$Provincia_cliente', '$Email_cliente', '$Tlf_cliente', '$Observaciones')";
$data = $oData->setGetData1($sql);

echo $data;

?>
