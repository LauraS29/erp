<?php
include("./Db/ConDb.php");
include("./Models/ventas1_1Model.php");


// Crear instancia de la clase Datos
$datosController = new Datos();


// Tratar la entrada del formulario de búsqueda
$Consulta1 = isset($_GET['Consulta1']) ? $_GET['Consulta1'] : '';


// Construir la consulta SQL para la búsqueda
if (!empty($Consulta1)) {
    $consulta = "SELECT * FROM ventas WHERE
        Cod_ventas LIKE '%$Consulta1%' OR
        Cod_cliente LIKE '%$Consulta1%' OR
        Fecha_venta LIKE '%$Consulta1%' OR
        Total_venta LIKE '%$Consulta1%'";
} else {
    // Consulta SQL para obtener todos los datos de la tabla cliente
    $consulta = "SELECT * FROM venta";
}


// Obtener los resultados utilizando la clase Datos
$resultados = $datosController->getData1($consulta);


// Tratamiento de los input text
$Consulta1 = isset($_GET['Consulta1']) ? $_GET['Consulta1'] : '';




// Verificar si se ha realizado una búsqueda
if (!empty($Consulta1)) {
    // Construir la consulta SQL para la búsqueda
    $sql = "SELECT Cod_venta, Cod_cliente, Fecha_venta FROM venta WHERE Cod_venta = '%$Consulta1%' OR Cod_cliente = '%$Consulta1%' OR Fecha_venta = '%$Consulta1%' ORDER BY Cod_venta, Cod_cliente, Fecha_venta";
} else {
    // Construir la consulta SQL para obtener todos los datos
    $sql = "SELECT Cod_venta, Cod_cliente, Fecha_venta FROM venta ORDER BY Cod_venta, Cod_cliente, Fecha_venta";
}




// Mostrar los resultados en formato de tabla HTML
foreach ($resultados as $fila) {
    echo "<tr>";
    echo "<td>" . $fila->Cod_venta . "</td>";
    echo "<td>" . $fila->Cod_proveedor . "</td>";
    echo "<td>" . $fila->Fecha_venta . "</td>";
   
    // Form para el botón eliminar
    echo "<td>
            <form action='eliminar_venta.php' method='POST'>
                <input type='hidden' name='Cod_venta' value='" . $fila->Cod_venta . "'>
                <input type='hidden' name='Cod_proveedor' value='" . $fila->Cod_proveedor . "'>
                <input type='hidden' name='Fecha_venta' value='" . $fila->Fecha_venta . "'>
                <input type='hidden' name='Total_venta' value='" . $fila->Total_venta . "'>


                <button type='submit' name='eliminar'  onclick='return confirmacion()'>
                    <img src='Assets/img/eliminar.png'>
                </button>
            </form>
          </td>";


    // Form para el botón actualizar
    echo "<td>
            <form action='actualizar_venta.php' method='POST'>
                <input type='hidden' name='Cod_venta' value='" . $fila->Cod_venta . "'>
                <input type='hidden' name='Cod_proveedor' value='" . $fila->Cod_proveedor . "'>
                <input type='hidden' name='Fecha_venta' value='" . $fila->Fecha_venta . "'>
                <input type='hidden' name='Total_venta' value='" . $fila->Total_venta . "'>


                <button type='submit' name='editar'>
                    <img src='Assets/img/actualizar.png'>
                </button>


            </form>
          </td>";


    echo "</tr>";
}


?>
