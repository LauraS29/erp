<?php

    class Datos
    {

        private $mysqli;
        private $data;

        public function __construct()
        {
            $this->mysqli=Connection::conn1();
            $this->data=array();
        }

        // Devuelve datos de la BD (select)
        public function getData1($sql)
        {
            $result = $this->mysqli->query($sql);

            if (!$result) 
            {
                echo "Error al ejecutar la consulta: " . $this->mysqli->error;
            } else {
                while ($rows = $result->fetch_object()) 
                {
                    $this->data[] = $rows;
                }
                    $result->close();
                    $this->mysqli->close();
                    return $this->data;
            }
        }
    }

?>