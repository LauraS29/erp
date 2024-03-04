<?php
include("./Db/ConDb.php");
include("./Models/proveedores1_1Model.php");

// Crear instancia de la clase Datos
$datosController = new Datos();

// Tratar la entrada del formulario de búsqueda
$Consulta1 = isset($_GET['Consulta1']) ? $_GET['Consulta1'] : '';

// Construir la consulta SQL para la búsqueda
if (!empty($Consulta1)) 
{
    $consulta = "SELECT * FROM proveedores WHERE 
        Cod_proveedor LIKE '%$Consulta1%' OR
        Nom_proveedor LIKE '%$Consulta1%' OR
        Tlf_proveedor LIKE '%$Consulta1%' OR
        Email_proveedor LIKE '%$Consulta1%' OR
        Cod_postal_proveedor LIKE '%$Consulta1%' OR
        Localidad_proveedor LIKE '%$Consulta1%' OR
        Cod_empresa LIKE '%$Consulta1%' OR
        Nom_empresa LIKE '%$Consulta1%'";
} else {
    // Consulta SQL para obtener todos los datos de la tabla proveedor
    $consulta = "SELECT * FROM proveedores";
}

// Obtener los resultados utilizando la clase Datos
$resultados = $datosController->getData1($consulta);

// Tratamiento de los input text
$Consulta1 = isset($_GET['Consulta1']) ? $_GET['Consulta1'] : '';


// Verificar si se ha realizado una búsqueda
if (!empty($Consulta1)) {
    // Construir la consulta SQL para la búsqueda
    $sql = "SELECT Cod_proveedor, Nom_proveedor, Tlf_proveedor FROM proveedores WHERE Cod_proveedor = '%$Consulta1%' OR Nom_proveedor = '%$Consulta1%' OR Tlf_proveedor = '%$Consulta1%' ORDER BY Cod_proveedor, Nom_proveedor, Tlf_proveedor";
} else {
    // Construir la consulta SQL para obtener todos los datos
    $sql = "SELECT Cod_proveedor, Nom_proveedor, Tlf_proveedor FROM proveedores ORDER BY Cod_proveedor, Nom_proveedor, Tlf_proveedor";
}


// Mostrar los resultados en formato de tabla HTML
foreach ($resultados as $fila) {
    echo "<tr>";
    echo "<td>" . $fila->Cod_proveedor . "</td>";
    echo "<td>" . $fila->Nom_proveedor . "</td>";
    echo "<td>" . $fila->Tlf_proveedor . "</td>";
    
    // Form para el botón eliminar
    echo "<td>
            <form action='Controllers/proveedores/proveedores_eliminarController.php' method='POST'>
                <input type='hidden' name='Cod_proveedor' value='" . $fila->Cod_proveedor . "'>
                <input type='hidden' name='Nom_proveedor' value='" . $fila->Nom_proveedor . "'>
                <input type='hidden' name='Tlf_proveedor' value='" . $fila->Tlf_proveedor . "'>
                <input type='hidden' name='Email_proveedor' value='" . $fila->Email_proveedor . "'>
                <input type='hidden' name='Cod_postal_proveedor' value='" . $fila->Cod_postal_proveedor . "'>
                <input type='hidden' name='Provincia_proveedor' value='" . $fila->Provincia_proveedor . "'>
                <input type='hidden' name='Localidad_proveedor' value='" . $fila->Localidad_proveedor . "'>
                <input type='hidden' name='Cod_empresa' value='" . $fila->Cod_empresa . "'>
                <input type='hidden' name='Nom_empresa' value='" . $fila->Nom_empresa . "'>

                <button type='submit' name='eliminar'  onclick='return confirmacion()'>
                    <img src='Assets/img/eliminar.png'>
                </button>
            </form>
          </td>";

    // Form para el botón actualizar
    echo "<td>
            <form action='./Views/actualizar/actualizar_proveedores.php' method='POST'>
                <input type='hidden' name='Cod_proveedor' value='" . $fila->Cod_proveedor . "'>
                <input type='hidden' name='Nom_proveedor' value='" . $fila->Nom_proveedor . "'>
                <input type='hidden' name='Tlf_proveedor' value='" . $fila->Tlf_proveedor . "'>
                <input type='hidden' name='Email_proveedor' value='" . $fila->Email_proveedor . "'>
                <input type='hidden' name='Cod_postal_proveedor' value='" . $fila->Cod_postal_proveedor . "'>
                <input type='hidden' name='Provincia_proveedor' value='" . $fila->Provincia_proveedor . "'>
                <input type='hidden' name='Localidad_proveedor' value='" . $fila->Localidad_proveedor . "'>
                <input type='hidden' name='Cod_empresa' value='" . $fila->Cod_empresa . "'>
                <input type='hidden' name='Nom_empresa' value='" . $fila->Nom_empresa . "'>

                <button type='submit' name='editar'>
                    <img src='Assets/img/actualizar.png'>
                </button>

            </form>
          </td>";

    echo "</tr>";
}

?>
