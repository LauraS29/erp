<?php
include("./Db/ConDb.php");
include("./Models/personal1_1Model.php");


// Crear instancia de la clase Datos
$datosController = new Datos();


// Tratar la entrada del formulario de búsqueda
$Consulta1 = isset($_GET['Consulta1']) ? $_GET['Consulta1'] : '';


// Construir la consulta SQL para la búsqueda
if (!empty($Consulta1)) {
    $consulta = "SELECT * FROM empleados WHERE
        Cod_empleado LIKE '%$Consulta1%' OR
        Nom_empleado LIKE '%$Consulta1%' OR
        DNI_empleado LIKE '%$Consulta1%' OR
        Email_empleado LIKE '%$Consulta1%' OR
        Tlf_empleado LIKE '%$Consulta1%' OR
        clave_acceso LIKE '%$Consulta1%'";
} else {
    // Consulta SQL para obtener todos los datos de la tabla empleado
    $consulta = "SELECT * FROM empleados";
}


// Obtener los resultados utilizando la clase Datos
$resultados = $datosController->getData1($consulta);


// Tratamiento de los input text
$Consulta1 = isset($_GET['Consulta1']) ? $_GET['Consulta1'] : '';




// Verificar si se ha realizado una búsqueda
if (!empty($Consulta1)) {
    // Construir la consulta SQL para la búsqueda
    $sql = "SELECT Cod_empleado, Nom_empleado, DNI_empleado FROM empleado WHERE Cod_empleado = '%$Consulta1%' OR Nom_empleado = '%$Consulta1%' OR DNI_empleado = '%$Consulta1%' ORDER BY Cod_empleado, Nom_empleado, DNI_empleado";
} else {
    // Construir la consulta SQL para obtener todos los datos
    $sql = "SELECT Cod_empleado, Nom_empleado, DNI_empleado FROM empleado ORDER BY Cod_empleado, Nom_empleado, DNI_empleado";
}




// Mostrar los resultados en formato de tabla HTML
foreach ($resultados as $fila) {
    echo "<tr>";
    echo "<td>" . $fila->Cod_empleado . "</td>";
    echo "<td>" . $fila->Nom_empleado . "</td>";
    echo "<td>" . $fila->DNI_empleado . "</td>";
   
    // Form para el botón eliminar
    echo "<td>
            <form action='eliminar_fila.php' method='POST'>
                <input type='hidden' name='Cod_empleado' value='" . $fila->Cod_empleado . "'>
                <input type='hidden' name='Nom_empleado' value='" . $fila->Nom_empleado . "'>
                <input type='hidden' name='Ape_empleado' value='" . $fila->Ape_empleado . "'>
                <input type='hidden' name='Tlf_empleado' value='" . $fila->Tlf_empleado . "'>
                <input type='hidden' name='DNI_empleado' value='" . $fila->DNI_empleado . "'>
                <input type='hidden' name='clave_acceso' value='" . $fila->clave_acceso . "'>


                <button type='submit' name='eliminar'  onclick='return confirmacion()'>
                    <img src='Assets/img/eliminar.png'>
                </button>
            </form>
          </td>";


    // Form para el botón actualizar
    echo "<td>
            <form action='actualizar_empleado.php' method='POST'>
                <input type='hidden' name='Cod_empleado' value='" . $fila->Cod_empleado . "'>
                <input type='hidden' name='Nom_empleado' value='" . $fila->Nom_empleado . "'>
                <input type='hidden' name='Ape_empleado' value='" . $fila->Ape_empleado . "'>
                <input type='hidden' name='Tlf_empleado' value='" . $fila->Tlf_empleado . "'>
                <input type='hidden' name='DNI_empleado' value='" . $fila->DNI_empleado . "'>
                <input type='hidden' name='clave_acceso' value='" . $fila->clave_acceso . "'>


                <button type='submit' name='editar'>
                    <img src='Assets/img/actualizar.png'>
                </button>


            </form>
          </td>";


    echo "</tr>";
}


?>
