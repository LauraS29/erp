<?php
require_once '../../Db/ConDb.php';
require_once '../../Models/personal1_1Model.php';

// Verificamos si la solicitud es de tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $mysqli = Connection::conn1();

    // Verificamos si la conexión fue exitosa
    if (!$mysqli) {
        die("La conexión a la base de datos falló: " . mysqli_connect_error());
    }

    $Cod_empleado = $_POST['Cod_empleado'];
    $Nom_empleado = $_POST['Nom_empleado'];
    $Ape_empleado = $_POST['Ape_empleado'];
    $DNI_empleado = $_POST['DNI_empleado'];
    $Tlf_empleado = $_POST['Tlf_empleado'];
    $Clave_acceso = $_POST['Clave_acceso'];

    $insertar = "INSERT INTO empleados(Cod_empleado, Nom_empleado, Ape_empleado, DNI_empleado, Tlf_empleado, Clave_acceso) 
                 VALUES ('$Cod_empleado', '$Nom_empleado','$Ape_empleado', '$DNI_empleado', '$Tlf_empleado','$Clave_acceso')";

    $query = mysqli_query($mysqli, $insertar);

    if ($query) {
        header("Location: ../../personal1.php");
    } else {
        echo "incorrecto: " . mysqli_error($mysqli);
    }

    // Cerramos la conexión
    mysqli_close($mysqli);
}

function obtenerEmpleado() {
    global $mysqli;

    $empleado = array();

    $consulta = "SELECT * FROM empleados";
    $resultado = mysqli_query($mysqli, $consulta);

    if ($resultado) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $empleado[] = $fila;
        }

        mysqli_free_result($resultado);
    } else {
        echo "Error en la consulta: " . mysqli_error($mysqli);
    }

    return $empleado;
}
?>
