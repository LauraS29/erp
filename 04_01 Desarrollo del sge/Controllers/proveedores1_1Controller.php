<?php
// Llamada a la conexión
require_once "Db/ConDb.php";
// Llamada al modelo
require_once "Models/proveedores1_1Model.php";

// Crear instancia de la clase Datos
$datosController = new Datos();

// Consulta SQL para obtener datos de la tabla proveedores
$consulta = "SELECT * FROM proveedores";

// Obtener los resultados utilizando la clase Datos
$resultados = $datosController->getData1($consulta);

// Mostrar los resultados en formato de tabla HTML
foreach ($resultados as $fila) {
    echo "<tr>";
    echo "<td>" . $fila->Cod_proveedor . "</td>";
    echo "<td>" . $fila->Nom_proveedor . "</td>";
    echo "<td>" . $fila->Tlf_proveedor . "</td>";
    
    // Form para el botón eliminar
    echo "<td>
            <form action='eliminar_fila.php' method='POST'>
                <input type='hidden' name='Cod_proveedor' value='" . $fila->Cod_proveedor . "'>
                <input type='hidden' name='Nom_proveedor' value='" . $fila->Nom_proveedor . "'>
                <input type='hidden' name='Email_proveedor' value='" . $fila->Email_proveedor . "'>
                <input type='hidden' name='Tlf_proveedor' value='" . $fila->Tlf_proveedor . "'>
                <input type='hidden' name='Cod_postal_proveedor' value='" . $fila->Cod_postal_proveedor . "'>
                <input type='hidden' name='Localidad_proveedor' value='" . $fila->Localidad_proveedor . "'>
                <input type='hidden' name='Provincia_proveedor' value='" . $fila->Provincia_proveedor . "'>
                <input type='submit' name='eliminar' value='eliminar' onclick='return confirmacion()'>
            </form>
          </td>";

    // Form para el botón actualizar
    echo "<td>
            <form action='actualizar_fila.php' method='POST'>
            <input type='hidden' name='Cod_proveedor' value='" . $fila->Cod_proveedor . "'>
            <input type='hidden' name='Nom_proveedor' value='" . $fila->Nom_proveedor . "'>
            <input type='hidden' name='Email_proveedor' value='" . $fila->Email_proveedor . "'>
            <input type='hidden' name='Tlf_proveedor' value='" . $fila->Tlf_proveedor . "'>
            <input type='hidden' name='Cod_postal_proveedor' value='" . $fila->Cod_postal_proveedor . "'>
            <input type='hidden' name='Localidad_proveedor' value='" . $fila->Localidad_proveedor . "'>
            <input type='hidden' name='Provincia_proveedor' value='" . $fila->Provincia_proveedor . "'>
                
                <input type='submit' name='editar' value='editar'>
            </form>
          </td>";

    echo "</tr>";
}


?>