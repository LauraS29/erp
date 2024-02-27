<?php
class Datos
{
    private $mysqli;
    private $data;

    public function __construct()
    {
        $this->mysqli = Connection::conn1();
        $this->data = array();
    }

    // Devuelve datos de la BD (select)
    public function getData1($sql)
    {
        $result = $this->mysqli->query($sql);

        if (!$result) {
            echo "Error al ejecutar la consulta: " . $this->mysqli->error;
        } else {
            while ($rows = $result->fetch_object()) {
                $this->data[] = $rows;
            }
            $result->close();
            // No cierres la conexión aquí
            return $this->data;
        }
    }

    public function authenticate($usuario, $contraseña) {
        // Consulta la base de datos para verificar las credenciales
        $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contraseña = '$contraseña'";
        $result = $this->mysqli->query($query);

        if ($result->num_rows == 1) {
            // Usuario autenticado
            return true;
        } else {
            // Usuario no autenticado
            return false;
        }

}
}

?>