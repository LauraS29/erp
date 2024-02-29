<?php
// Llamada a la conexión
require_once "Db/ConDb.php";
// Llamada al modelo
require_once "Models/empresa1_1Model.php";

// Tratamiento de los input text
$Consulta1 = isset($_POST['Consulta1']) ? $_POST['Consulta1'] : '';

// Instanciación de un objeto
$oData = new Datos;

// Inicializar una cadena para almacenar las filas HTML
$rowsHTML = '';

// Verificar si se ha realizado una búsqueda
if (!empty($Consulta1)) {
    // Construir la consulta SQL para la búsqueda
    $sql = "SELECT Cod_empresa, Nom_empresa, Tlf_empresa FROM empresa WHERE Cod_empresa = '$Consulta1' OR Nom_empresa = '$Consulta1' OR Tlf_empresa = '$Consulta1' ORDER BY Cod_empresa, Nom_empresa, Tlf_empresa";
} else {
    // Construir la consulta SQL para obtener todos los datos
    $sql = "SELECT Cod_empresa, Nom_empresa, Tlf_empresa FROM empresa ORDER BY Cod_empresa, Nom_empresa, Tlf_empresa";
}

// Ejecutar la consulta
$data = $oData->getData1($sql);

// Mostrar los resultados obtenidos
foreach ($data as $row) {
    $rowsHTML .= "<tr>
                    <td>{$row->Cod_empresa}</td>
                    <td>{$row->Nom_empresa}</td>
                    <td>{$row->Tlf_empresa}</td>
                    <td class='pequeño'>
                        <a href='actualizar_fila.php?Cod_empresa=<?php echo $row->Cod_empresa; ?>'>
                            <img src='Assets/img/actualizar.png' alt=''>
                    </a>
                        <a href='eliminar_fila.php?Cod_empresa={$row->Cod_empresa}'>
                            <img class='img_elim' src='Assets/img/eliminar.png' alt=''>
                        </a>
                    </td>
                  </tr>";
}
// Devolver las filas HTML
echo $rowsHTML;
?>