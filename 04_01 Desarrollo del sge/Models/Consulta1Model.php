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
            if(!$this->mysqli->query($sql))
            {
                echo "La operación no se ha podido realizar.";
            }
            else
            {
                $result=$this->mysqli->query($sql);
                while($rows=$result->fetch_object())
                {
                    $this->data[]=$rows;
                }
                $this->mysqli->close();
                return $this->data;
            }
        }

    }

?>