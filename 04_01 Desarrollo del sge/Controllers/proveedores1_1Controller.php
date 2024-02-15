<?php
// Llamada a la conexión
require_once "Db/ConDb.php";
// Llamada al modelo
require_once "Models/proveedores1_1Model.php";

// Tratamiento de los input text
$Consulta1 = isset($_GET['Consulta1']) ? $_GET['Consulta1'] : '';

// Instanciación de un objeto
$oData = new Datos;

// Inicializar una cadena para almacenar las filas HTML
$rowsHTML = '';

// Verificar si se ha realizado una búsqueda
if (!empty($Consulta1)) {
    // Construir la consulta SQL para la búsqueda
    $sql = "SELECT Cod_proveedor, Nom_proveedor, Tlf_proveedor FROM proveedores WHERE Cod_proveedor = '$Consulta1' OR Nom_proveedor = '$Consulta1' OR Tlf_proveedor = '$Consulta1' ORDER BY Cod_proveedor, Nom_proveedor, Tlf_proveedor";
} else {
    // Construir la consulta SQL para obtener todos los datos
    $sql = "SELECT Cod_proveedor, Nom_proveedor, Tlf_proveedor FROM cliente ORDER BY Cod_proveedor, Nom_proveedor, Tlf_proveedor";
}

// Ejecutar la consulta
$data = $oData->getData1($sql);

// Mostrar los resultados obtenidos
foreach ($data as $row) {
    $rowsHTML .= "<tr>
                    <td>{$row->Cod_proveedor}</td>
                    <td>{$row->Nom_proveedor}</td>
                    <td>{$row->Tlf_proveedor}</td>
                    <td class='pequeño'>
                        <a href='actualizar_fila.php?Cod_proveedor=<?php echo $row->Cod_proveedor; ?>'>
                            <img src='Assets/img/actualizar.png' alt=''>
                    </a>
                        <a href='eliminar_fila.php?Cod_proveedor={$row->Cod_proveedor}'>
                            <img class='img_elim' src='Assets/img/eliminar.png' alt=''>
                        </a>
                    </td>
                  </tr>";
}
// Devolver las filas HTML
echo $rowsHTML;
?>