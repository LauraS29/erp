<?php
include("./Db/ConDb.php");
include("./Models/clientes1_1Model.php");

// Crear instancia de la clase Datos
$datosController = new Datos();

// Consulta SQL para obtener datos de la tabla cliente
$consulta = "SELECT * FROM cliente";

// Obtener los resultados utilizando la clase Datos
$resultados = $datosController->getData1($consulta);

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
                <!-- Otros campos ocultos -->
                <input type='submit' name='eliminar' value='eliminar' onclick='return confirmacion()'>
            </form>
          </td>";

    // Form para el botón actualizar
    echo "<td>
            <form action='actualizar_fila.php' method='POST'>
                <input type='hidden' name='Cod_cliente' value='" . $fila->Cod_cliente . "'>
                <input type='hidden' name='Nom_cliente' value='" . $fila->Nom_cliente . "'>
                <input type='hidden' name='DNI_cliente' value='" . $fila->DNI_cliente . "'>
                <!-- Otros campos ocultos -->
                <input type='submit' name='editar' value='editar'>
            </form>
          </td>";

    echo "</tr>";
}

// No es necesario cerrar la conexión aquí, ya que la gestiona la clase Datos
?>
