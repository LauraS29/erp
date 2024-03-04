<?php
$id = isset($_POST["Cod_venta"]) ? $_POST["Cod_venta"] : '';
$cleinte = isset($_POST["Cod_cleinte"]) ? $_POST["Cod_cleinte"] : '';
$fecha = isset($_POST["Fecha_venta"]) ? $_POST["Fecha_venta"] : '';
$total = isset($_POST["Total_venta"]) ? $_POST["Total_venta"] : '';


if (isset($_POST["actualizar"])) {
    include("../Db/ConDb.php");
    $conexion = new Connection();
    $conn = $conexion->conn1();


    $query = "UPDATE ventas SET Cod_cleinte=?, Fecha_venta=?, Total_venta=? WHERE Cod_venta=?";
    $sentencia = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($sentencia, "issi", $cleinte, $fecha, $total, $id);
    mysqli_stmt_execute($sentencia);
   
    $afectado = mysqli_stmt_affected_rows($sentencia);


    if ($afectado == 1) {
        echo "<script> alert('La venta con ID $id se actualizó correctamente.'); window.location.href='../clientes1.php'; </script>";
    } else {
        echo "<script> alert('Hubo un problema al actualizar la venta con ID $id.'); window.location.href='../clientes1.php'; </script>";
    }
   
    mysqli_stmt_close($sentencia);
    mysqli_close($conn);
}
?>
