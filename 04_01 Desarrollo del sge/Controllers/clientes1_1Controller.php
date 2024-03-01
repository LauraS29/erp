<?php
// Incluir archivos necesarios
include("./Db/ConDb.php");
include("./Models/clientes1_1Model.php");

// Crear instancia de la clase Datos
$datosController = new Datos();

// Tratar la entrada del formulario de búsqueda
$Consulta1 = isset($_GET['Consulta1']) ? $_GET['Consulta1'] : '';

// Construir la consulta SQL para la búsqueda
if (!empty($Consulta1)) {
    $consulta = "SELECT * FROM cliente WHERE 
        Cod_cliente LIKE '%$Consulta1%' OR
        Nom_cliente LIKE '%$Consulta1%' OR
        DNI_cliente LIKE '%$Consulta1%' OR
        Cod_postal_cliente LIKE '%$Consulta1%' OR
        Localidad_cliente LIKE '%$Consulta1%' OR
        Provincia_cliente LIKE '%$Consulta1%' OR
        Email_cliente LIKE '%$Consulta1%' OR
        Tlf_cliente LIKE '%$Consulta1%' OR
        Observaciones LIKE '%$Consulta1%'";
} else {
    // Consulta SQL para obtener todos los datos de la tabla cliente
    $consulta = "SELECT * FROM cliente";
}

// Obtener los resultados utilizando la clase Datos
$resultados = $datosController->getData1($consulta);

// Tratamiento de los input text
$Consulta1 = isset($_GET['Consulta1']) ? $_GET['Consulta1'] : '';


// Verificar si se ha realizado una búsqueda
if (!empty($Consulta1)) {
    // Construir la consulta SQL para la búsqueda
    $sql = "SELECT Cod_cliente, Nom_cliente, DNI_cliente FROM cliente WHERE Cod_cliente = '%$Consulta1%' OR Nom_cliente = '%$Consulta1%' OR DNI_cliente = '%$Consulta1%' ORDER BY Cod_cliente, Nom_cliente, DNI_cliente";
} else {
    // Construir la consulta SQL para obtener todos los datos
    $sql = "SELECT Cod_cliente, Nom_cliente, DNI_cliente FROM cliente ORDER BY Cod_cliente, Nom_cliente, DNI_cliente";
}


// Mostrar los resultados en formato de tabla HTML
foreach ($resultados as $fila) {
    echo "<tr>";
    echo "<td>" . $fila->Cod_cliente . "</td>";
    echo "<td>" . $fila->Nom_cliente . "</td>";
    echo "<td>" . $fila->DNI_cliente . "</td>";
    
    // Form para el botón eliminar
    echo "<td>
            <form action='eliminar_fila.php' method='POST'>
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

                <button type='submit' name='eliminar'  onclick='return confirmacion()'>
                    <img src='Assets/img/eliminar.png'>
                </button>
            </form>
          </td>";

    // Form para el botón actualizar
    echo "<td>
            <form action='actualizar_fila.php' method='POST'>
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
