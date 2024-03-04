<?php
include("../../Db/ConDb.php");
$getconnection = new Connection();
$getconn1 = $getconnection->conn1();


if(isset($_POST["eliminar"]))
{
    //Obtenemos los datos del formulario
    $id=$_POST["Cod_cliente"];
    $nombre=$_POST["Nom_cliente"];

    // quiero q elimines el registro el id ...
    $query="DELETE FROM cliente WHERE Cod_cliente=?";
    $sentencia=mysqli_prepare($getconn1, $query);
    // al ser id numero entero se pone i
    mysqli_stmt_bind_param($sentencia, "i",$id);
    //ejecucion
    mysqli_stmt_execute($sentencia);
    // verificar si se hizo
    $afectado=mysqli_stmt_affected_rows($sentencia);
    // condicion para verificar
    if($afectado==1)
    {
        echo "<script> alert('El empleado [$nombre] se elimino correctamente :) '); location.href='../../clientes1.php'; </script>";
    } else{
        echo "<script> alert('El empleado [$nombre] no se elimino correctamente :('); location.href='../../clientes1.php'; </script>";
    }
}

?>