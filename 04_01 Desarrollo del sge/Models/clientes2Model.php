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

        // Inserta y selecciona datos (insert y select)
        public function setGetData1($sql)
        {
            // Ejecutar una multiconsulta
            if(!$this->mysqli->multi_query($sql))
            {
                echo "La operación no se ha podido realizar.";
                // echo "Detalle del error en la consulta (setGetData1) - ";
                // echo "Número de error: " . $this->mysqli->errno . " - ";
                // echo "Descripción del error: " . $this->mysqli->error;
            }
            else
            {
               do
               {
                    // Almacenar los resultados
                    if($result = $this->mysqli->store_result())
                    {
                        while($rows = $result->fetch_object())
                        {
                            $this->data[]=$rows;
                        }
                        $result->free();
                    }
               } while($this->mysqli->more_results() && $this->mysqli->next_result());
               
               // Cerrar conexión
               $this->mysqli->close();
               return $this->data;

            }
        }

    }

?>