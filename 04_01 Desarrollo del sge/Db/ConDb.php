<?php
class Connection
{
    private static $mysqli;

    public static function conn1()
    {
        if (!isset(self::$mysqli)) {
            self::$mysqli = new mysqli('localhost', 'root', '', 'trabajo');

            if (self::$mysqli->connect_errno) {
                printf("Error en la conexión: %s\n", self::$mysqli->connect_error);
            } else {
                self::$mysqli->set_charset("utf8");
            }
        }

        return self::$mysqli;
    }
}
?>
