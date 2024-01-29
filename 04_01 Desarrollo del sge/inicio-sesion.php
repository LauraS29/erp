<?php
session_start();

include ('Db/ConDb.php');

if (isset($_POST['Usuario']) && isset($_POST['Contraseña'])) {
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Usuario = validate($_POST['Usuario']);
    $Contraseña = validate($_POST['Contraseña']);

    if (empty($Usuario)) {
        header("Location: Inicio.php?error=El Usuario es Requerido");
        exit();
    } elseif (empty($Contraseña)) {
        header("Location: Inicio.php?error=La Contraseña es Requerida");
        exit();
    } else {
        $Sql = "SELECT * FROM Usuarios WHERE Nombre_usuario = '$Usuario'";
        $resultado = mysqli_query($conexion, $Sql);

        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);

            if (password_verify($Contraseña, $row['Contraseña_usuario'])) {
                $_SESSION['Usuario'] = $row['Nombre_usuario'];
                $_SESSION['Nombre'] = $row['Nombre_usuario']; // Cambié esto a 'Nombre_usuario' para coincidir con la columna en la base de datos
                $_SESSION['Id'] = $row['Cod_usuario'];
                header("Location: Inicio.php");
                exit();
            } else {
                header("Location: Inicio.php?error=El usuario o la contraseña son Incorrectos");
                exit();
            }
        } else {
            header("Location: Inicio.php?error=El usuario o la contraseña son Incorrectos");
            exit();
        }
    }
} else {
    header("Location: Inicio.php");
    exit();
}
?>
