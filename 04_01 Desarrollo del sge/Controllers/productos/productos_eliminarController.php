<?php
include("../../Db/ConDb.php");
$getconnection = new Connection();
$getconn1 = $getconnection->conn1();


if(isset($_POST["eliminar"]))
{
    //Obtenemos los datos del formulario
    $id=$_POST["Cod_producto"];
    $nombre=$_POST["Nom_producto"];

    // quiero q elimines el registro el id ...
    $query="DELETE FROM productos WHERE Cod_producto=?";
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
        echo "<script> alert('El producto [$nombre] se elimino correctamente :) '); location.href='../../productos1.php'; </script>";
    } else{
        echo "<script> alert('El producto [$nombre] no se elimino correctamente :('); location.href='../../productos1.php'; </script>";
    }
}

?>