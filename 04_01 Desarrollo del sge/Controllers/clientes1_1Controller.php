<?php
// Llamada a la conexión
require_once "Db/ConDb.php";
// Llamada al modelo
require_once "Models/clientes1_1Model.php";

// Tratamiento de los input text
$Consulta1 = isset($_GET['Consulta1']) ? $_GET['Consulta1'] : '';
$Cod_cliente = isset($_GET['Cod_cliente']) ? $_GET['Cod_cliente'] : '';

// Instanciación de un objeto
$oData = new Datos;

// Inicializar una cadena para almacenar las filas HTML
$rowsHTML = '';

// Verificar si se ha realizado una búsqueda
if (!empty($Consulta1)) {
    // Construir la consulta SQL para la búsqueda
    $sql = "SELECT Cod_cliente, Nom_cliente, DNI_cliente FROM cliente WHERE Cod_cliente = '$Consulta1' OR Nom_cliente = '$Consulta1' OR DNI_cliente = '$Consulta1' ORDER BY Cod_cliente, Nom_cliente, DNI_cliente";
} else if (!empty($Cod_cliente)) {
    // Obtener el nombre del cliente
    $sql = "SELECT Nom_cliente FROM cliente WHERE Cod_cliente = '$Cod_cliente' LIMIT 1";
    $result = $oData->getData1($sql);
    if (!empty($result)) {
        $client_name = $result[0]->Nom_cliente;
    }

    // Construir la consulta SQL para mostrar los datos del cliente
    $sql = "SELECT Cod_cliente, Nom_cliente, DNI_cliente FROM cliente WHERE Cod_cliente = '$Cod_cliente' ORDER BY Cod_cliente, Nom_cliente, DNI_cliente";
} else {
    // Construir la consulta SQL para obtener todos los datos
    $sql = "SELECT Cod_cliente, Nom_cliente, DNI_cliente FROM cliente ORDER BY Cod_cliente, Nom_cliente, DNI_cliente";
}

// Ejecutar la consulta
$data = $oData->getData1($sql);

// Mostrar los resultados obtenidos
foreach ($data as $row) {
    $rowsHTML .= "<tr>
        <td>{$row->Cod_cliente}</td>
        <td>{$row->Nom_cliente}</td>
        <td>{$row->DNI_cliente}</td>
        <td class='pequeño'>
            <a href='clientes2.php?Cod_cliente={$row->Cod_cliente}'>
                <img src='Assets/img/actualizar.png' alt=''>
            </a>
            <a href='eliminar_fila.php?Cod_cliente={$row->Cod_cliente}'>
                <img class='img_elim' src='Assets/img/eliminar.png' alt=''>
            </a>
        </td>
    </tr>";
}

// Devolver las filas HTML
echo $rowsHTML;
?>
