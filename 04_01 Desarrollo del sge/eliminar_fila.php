<?php
// Llamada a la conexión
require_once "Db/ConDb.php";

$id = $_GET['Cod_cliente'];
$eliminar = "DELETE FROM cliente WHERE Cod_cliente = '$id'";

$elimina = $mysqli->query($eliminar);
header("Location: clientes1.php");
$mysqli->close();

?>