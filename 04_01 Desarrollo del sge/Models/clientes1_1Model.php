<?php
class Datos
{
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = Connection::conn1();
    }

    // Devuelve datos de la BD (select)
    public function getData1($sql)
    {
        $result = $this->mysqli->query($sql);

        if (!$result) {
            echo "Error al ejecutar la consulta: " . $this->mysqli->error;
        } else {
            return $result;
        }
    }
}
?>
