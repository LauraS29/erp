<?php
include("./Db/ConDb.php");
include("./Models/productos1_1Model.php");

// Crear instancia de la clase Datos
$datosController = new Datos();

// Tratar la entrada del formulario de búsqueda
$Consulta1 = isset($_GET['Consulta1']) ? $_GET['Consulta1'] : '';

// Construir la consulta SQL para la búsqueda
if (!empty($Consulta1)) 
{
    $consulta = "SELECT * FROM productos WHERE 
        Cod_producto LIKE '%$Consulta1%' OR
        Nom_producto LIKE '%$Consulta1%' OR
        Pre_producto LIKE '%$Consulta1%' OR
        Cantidad_producto LIKE '%$Consulta1%'";
} else {
    // Consulta SQL para obtener todos los datos de la tabla producto
    $consulta = "SELECT * FROM productos";
}

// Obtener los resultados utilizando la clase Datos
$resultados = $datosController->getData1($consulta);

// Tratamiento de los input text
$Consulta1 = isset($_GET['Consulta1']) ? $_GET['Consulta1'] : '';


// Verificar si se ha realizado una búsqueda
if (!empty($Consulta1)) {
    // Construir la consulta SQL para la búsqueda
    $sql = "SELECT Cod_producto, Nom_producto, Pre_producto, Cantidad_producto FROM productos WHERE Cod_producto = '%$Consulta1%' OR Nom_producto = '%$Consulta1%' OR Pre_producto = '%$Consulta1%' OR Cantidad_producto = '%$Consulta1%' ORDER BY Cod_producto, Nom_producto, Pre_producto, Cantidad_producto";
} else {
    // Construir la consulta SQL para obtener todos los datos
    $sql = "SELECT Cod_producto, Nom_producto, Pre_producto, Cantidad_producto FROM productos ORDER BY Cod_producto, Nom_producto, Pre_producto, Cantidad_producto";
}


// Mostrar los resultados en formato de tabla HTML
foreach ($resultados as $fila) {
    echo "<tr>";
    echo "<td>" . $fila->Cod_producto . "</td>";
    echo "<td>" . $fila->Nom_producto . "</td>";
    echo "<td>" . $fila->Pre_producto . "</td>";
    echo "<td>" . $fila->Cantidad_producto . "</td>";
    
    // Form para el botón eliminar
    echo "<td>
            <form action='Controllers/productos/productos_eliminarController.php' method='POST'>
                <input type='hidden' name='Cod_producto' value='" . $fila->Cod_producto . "'>
                <input type='hidden' name='Nom_producto' value='" . $fila->Nom_producto . "'>
                <input type='hidden' name='Pre_producto' value='" . $fila->Pre_producto . "'>
                <input type='hidden' name='Cantidad_producto' value='" . $fila->Cantidad_producto . "'>

                <button type='submit' name='eliminar'  onclick='return confirmacion()'>
                    <img src='Assets/img/eliminar.png'>
                </button>
            </form>
          </td>";

    // Form para el botón actualizar
    echo "<td>
            <form action='./Views/actualizar/actualizar_productos.php' method='POST'>
                <input type='hidden' name='Cod_producto' value='" . $fila->Cod_producto . "'>
                <input type='hidden' name='Nom_producto' value='" . $fila->Nom_producto . "'>
                <input type='hidden' name='Pre_producto' value='" . $fila->Pre_producto . "'>
                <input type='hidden' name='Cantidad_producto' value='" . $fila->Cantidad_producto . "'>

                <button type='submit' name='editar'>
                    <img src='Assets/img/actualizar.png'>
                </button>

            </form>
          </td>";

    echo "</tr>";
}

?>
