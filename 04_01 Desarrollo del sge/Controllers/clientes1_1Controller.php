<?php
include("Db/ConDb.php");
include("./Models/clientes1_1Model.php");

$datos = new Datos();

$consulta = "SELECT * FROM cliente";
$resultado = $datos->getData1($consulta);

while ($fila = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $fila["Cod_cliente"] . "</td>";
    echo "<td>" . $fila["Nom_cliente"] . "</td>";
    echo "<td>" . $fila["DNI_cliente"] . "</td>";
    
    // Form para el boton eliminar
    echo "<td>
            <form action='eliminar_fila.php' method='POST'>
                <input type='hidden' name='Cod_cliente' value='" . $fila["Cod_cliente"] . "'>
                <input type='submit' name='eliminar' value='eliminar' onclick='return confirmacion()'>
            </form>
          </td>";
    
    // Form para el boton actualizar
    echo "<td>
            <form action='actualizar_fila.php' method='POST'>
                <input type='hidden' name='Cod_cliente' value='" . $fila["Cod_cliente"] . "'>
                <input type='submit' name='editar' value='editar'>
            </form>
          </td>";
    
    echo "</tr>";
}

?>
