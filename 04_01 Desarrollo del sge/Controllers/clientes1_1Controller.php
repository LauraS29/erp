<?php

// Llamada a la conexión
require_once 'Db/ConDb.php';
// Llamada al modelo
require_once 'Models/clientes1_1Model.php';

// Instancia del objeto
$oData = new Datos;

// Llamada al método
$sql = "SELECT Cod_cliente, Nom_cliente, DNI_cliente FROM cliente ORDER BY Cod_cliente, Nom_cliente, DNI_cliente";
$data = $oData->getData1($sql);

if (empty($data)) {
    echo "
        <tr>
            <td colspan='3'>No hay datos.</td>
        </tr>
    ";
} else {
    foreach ($data as $row) {
        $codigo = $row['Cod_cliente'];
        $nombre = $row['Nom_cliente'];
        $dni = $row['DNI_cliente'];

        echo "
            <tr>
                <td>$codigo</td>
                <td>$nombre</td>
                <td>$dni</td>
            </tr>
        ";
    }
}
?>