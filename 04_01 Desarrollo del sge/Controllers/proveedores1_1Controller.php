<?php
include("./Db/ConDb.php");
include("./Models/proveedores1_1Model.php");


// Crear instancia de la clase Datos
$datosController = new Datos();


// Tratar la entrada del formulario de búsqueda
$Consulta1 = isset($_GET['Consulta1']) ? $_GET['Consulta1'] : '';


// Construir la consulta SQL para la búsqueda
if (!empty($Consulta1)) {
    $consulta = "SELECT * FROM porveedores WHERE
        Cod_provedor LIKE '%$Consulta1%' OR
        Nom_provedor LIKE '%$Consulta1%' OR
        DNI_provedor LIKE '%$Consulta1%' OR
        Cod_postal_provedor LIKE '%$Consulta1%' OR
        Localidad_provedor LIKE '%$Consulta1%' OR
        Provincia_provedor LIKE '%$Consulta1%' OR
        Email_provedor LIKE '%$Consulta1%' OR
        Tlf_provedor LIKE '%$Consulta1%' OR
        Observaciones LIKE '%$Consulta1%'";
} else {
    // Consulta SQL para obtener todos los datos de la tabla proveedores
    $consulta = "SELECT * FROM proveedores";
}


// Obtener los resultados utilizando la clase Datos
$resultados = $datosController->getData1($consulta);


// Tratamiento de los input text
$Consulta1 = isset($_GET['Consulta1']) ? $_GET['Consulta1'] : '';




// Verificar si se ha realizado una búsqueda
if (!empty($Consulta1)) {
    // Construir la consulta SQL para la búsqueda
    $sql = "SELECT Cod_provedor, Nom_provedor, DNI_provedor FROM provedor WHERE Cod_provedor = '%$Consulta1%' OR Nom_provedor = '%$Consulta1%' OR DNI_provedor = '%$Consulta1%' ORDER BY Cod_provedor, Nom_provedor, DNI_provedor";
} else {
    // Construir la consulta SQL para obtener todos los datos
    $sql = "SELECT Cod_provedor, Nom_provedor, DNI_provedor FROM provedor ORDER BY Cod_provedor, Nom_provedor, DNI_provedor";
}




// Mostrar los resultados en formato de tabla HTML
foreach ($resultados as $fila) {
    echo "<tr>";
    echo "<td>" . $fila->Cod_provedor . "</td>";
    echo "<td>" . $fila->Nom_provedor . "</td>";
    echo "<td>" . $fila->DNI_provedor . "</td>";
   
    // Form para el botón eliminar
    echo "<td>
            <form action='eliminar_fila.php' method='POST'>
                <input type='hidden' name='Cod_provedor' value='" . $fila->Cod_provedor . "'>
                <input type='hidden' name='Nom_provedor' value='" . $fila->Nom_provedor . "'>
                <input type='hidden' name='Ape_provedor' value='" . $fila->Ape_provedor . "'>
                <input type='hidden' name='Email_provedor' value='" . $fila->Email_provedor . "'>
                <input type='hidden' name='Tlf_provedor' value='" . $fila->Tlf_provedor . "'>
                <input type='hidden' name='DNI_provedor' value='" . $fila->DNI_provedor . "'>
                <input type='hidden' name='Cod_postal_provedor' value='" . $fila->Cod_postal_provedor . "'>
                <input type='hidden' name='Localidad_provedor' value='" . $fila->Localidad_provedor . "'>
                <input type='hidden' name='Provincia_provedor' value='" . $fila->Provincia_provedor . "'>
                <input type='hidden' name='Observaciones' value='" . $fila->Observaciones . "'>


                <button type='submit' name='eliminar'  onclick='return confirmacion()'>
                    <img src='Assets/img/eliminar.png'>
                </button>
            </form>
          </td>";


    // Form para el botón actualizar
    echo "<td>
            <form action='actualizar_cliente.php' method='POST'>
                <input type='hidden' name='Cod_cliente' value='" . $fila->Cod_cliente . "'>
                <input type='hidden' name='Nom_cliente' value='" . $fila->Nom_cliente . "'>
                <input type='hidden' name='Ape_cliente' value='" . $fila->Ape_cliente . "'>
                <input type='hidden' name='Email_cliente' value='" . $fila->Email_cliente . "'>
                <input type='hidden' name='Tlf_cliente' value='" . $fila->Tlf_cliente . "'>
                <input type='hidden' name='DNI_cliente' value='" . $fila->DNI_cliente . "'>
                <input type='hidden' name='Cod_postal_cliente' value='" . $fila->Cod_postal_cliente . "'>
                <input type='hidden' name='Localidad_cliente' value='" . $fila->Localidad_cliente . "'>
                <input type='hidden' name='Provincia_cliente' value='" . $fila->Provincia_cliente . "'>
                <input type='hidden' name='Observaciones' value='" . $fila->Observaciones . "'>


                <button type='submit' name='editar'>
                    <img src='Assets/img/actualizar.png'>
                </button>


            </form>
          </td>";


    echo "</tr>";
}
?>
