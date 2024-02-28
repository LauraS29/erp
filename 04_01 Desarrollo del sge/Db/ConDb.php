<?php
class Connection
{
    public static function conn1()
    {

        $mysqli = new mysqli('localhost', 'admin', 'madrid', 'trabajo');

        if($mysqli->connect_errno)
        {
            printf("Error en la conexion: %s\n", $mysqli->connect_errno);
        }
        else
        {
            $mysqli->set_charset("utf8");
            return $mysqli;
        }
    }
}
// Establecer la conexión global
$mysqli = Connection::conn1();

// Verificar si la conexión se estableció correctamente
if (!$mysqli) {
    die("La conexión a la base de datos falló: " . mysqli_connect_error());
}
?>
