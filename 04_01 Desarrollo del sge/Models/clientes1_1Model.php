<?php

class Datos
{

    private $mysqli;

    public function __construct()
    {
        $this->mysqli = Connection::conn1();
    }

    public function getData1($sql)
{
    $result = $this->mysqli->query($sql);

    if (!$result) {
        die("Error en la consulta: " . $this->mysqli->error);
    }

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    $result->free();
    $this->mysqli->close();

    return $data;
}


    // No devuelve datos de la BD (insert, update, delete)
    public function setData1($sql)
    {
        if (!$this->mysqli->query($sql)) {
            $result = "La operación no se ha podido realizar.";
        } else {
            $result = "Operación realizada con éxito.";
        }
        $this->mysqli->close();
        return $result;
    }

}
?>
