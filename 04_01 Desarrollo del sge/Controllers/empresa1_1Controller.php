<?php
include("./Db/ConDb.php");
include("./Models/clientes1_1Model.php");


// Crear instancia de la clase Datos
$datosController = new Datos();


// Tratar la entrada del formulario de búsqueda
$Consulta1 = isset($_GET['Consulta1']) ? $_GET['Consulta1'] : '';


// Construir la consulta SQL para la búsqueda
if (!empty($Consulta1)) {
    $consulta = "SELECT * FROM empresa WHERE
        Cod_empresa LIKE '%$Consulta1%' OR
        Nom_empresa LIKE '%$Consulta1%' OR
        Direccion_empresa LIKE '%$Consulta1%' OR
        Cod_postal_empresa LIKE '%$Consulta1%' OR
        Localidad_empresa LIKE '%$Consulta1%' OR
        Provincia_empresa LIKE '%$Consulta1%' OR
        Email_empresa LIKE '%$Consulta1%' OR
        Tlf_empresa LIKE '%$Consulta1%' OR
        Observaciones LIKE '%$Consulta1%'";
} else {
    // Consulta SQL para obtener todos los datos de la tabla empresa
    $consulta = "SELECT * FROM empresa";
}


// Obtener los resultados utilizando la clase Datos
$resultados = $datosController->getData1($consulta);


// Tratamiento de los input text
$Consulta1 = isset($_GET['Consulta1']) ? $_GET['Consulta1'] : '';




// Verificar si se ha realizado una búsqueda
if (!empty($Consulta1)) {
    // Construir la consulta SQL para la búsqueda
    $sql = "SELECT Cod_empresa, Nom_empresa, Direccion_empresa FROM empresa WHERE Cod_empresa = '%$Consulta1%' OR Nom_empresa = '%$Consulta1%' OR Direccion_empresa = '%$Consulta1%' ORDER BY Cod_empresa, Nom_empresa, Direccion_empresa";
} else {
    // Construir la consulta SQL para obtener todos los datos
    $sql = "SELECT Cod_empresa, Nom_empresa, Direccion_empresa FROM empresa ORDER BY Cod_empresa, Nom_empresa, Direccion_empresa";
}




// Mostrar los resultados en formato de tabla HTML
foreach ($resultados as $fila) {
    echo "<tr>";
    echo "<td>" . $fila->Cod_empresa . "</td>";
    echo "<td>" . $fila->Nom_empresa . "</td>";
    echo "<td>" . $fila->Tlf_empresa . "</td>";
   
    // Form para el botón eliminar
    echo "<td>
            <form action='eliminar_fila.php' method='POST'>
                <input type='hidden' name='Cod_empresa' value='" . $fila->Cod_empresa . "'>
                <input type='hidden' name='Nom_empresa' value='" . $fila->Nom_empresa . "'>
                <input type='hidden' name='Email_empresa' value='" . $fila->Email_empresa . "'>
                <input type='hidden' name='Tlf_empresa' value='" . $fila->Tlf_empresa . "'>
                <input type='hidden' name='Direccion_empresa' value='" . $fila->Direccion_empresa . "'>
                <input type='hidden' name='Cod_postal_empresa' value='" . $fila->Cod_postal_empresa . "'>
                <input type='hidden' name='Localidad_empresa' value='" . $fila->Localidad_empresa . "'>
                <input type='hidden' name='Provincia_empresa' value='" . $fila->Provincia_empresa . "'>
                <input type='hidden' name='Observaciones' value='" . $fila->Observaciones . "'>


                <button type='submit' name='eliminar'  onclick='return confirmacion()'>
                    <img src='Assets/img/eliminar.png'>
                </button>
            </form>
          </td>";


    // Form para el botón actualizar
    echo "<td>
            <form action='actualizar_empresa.php' method='POST'>
                <input type='hidden' name='Cod_empresa' value='" . $fila->Cod_empresa . "'>
                <input type='hidden' name='Nom_empresa' value='" . $fila->Nom_empresa . "'>
                <input type='hidden' name='Email_empresa' value='" . $fila->Email_empresa . "'>
                <input type='hidden' name='Tlf_empresa' value='" . $fila->Tlf_empresa . "'>
                <input type='hidden' name='Direccion_empresa' value='" . $fila->Direccion_empresa . "'>
                <input type='hidden' name='Cod_postal_empresa' value='" . $fila->Cod_postal_empresa . "'>
                <input type='hidden' name='Localidad_empresa' value='" . $fila->Localidad_empresa . "'>
                <input type='hidden' name='Provincia_empresa' value='" . $fila->Provincia_empresa . "'>
                <input type='hidden' name='Observaciones' value='" . $fila->Observaciones . "'>


                <button type='submit' name='editar'>
                    <img src='Assets/img/actualizar.png'>
                </button>


            </form>
          </td>";


    echo "</tr>";
}


?>
