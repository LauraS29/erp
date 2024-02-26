<?php
require_once("./Models/clientes1_1Model.php");

if (isset($_POST["actualizar"])) {
    $clienteModel = new ClienteModel();

    $id = isset($_POST["Cod_cliente"]) ? $_POST["Cod_cliente"] : "";
    $nombre = isset($_POST["Nom_cliente"]) ? $_POST["Nom_cliente"] : "";
    $apellido = isset($_POST["Ape_cliente"]) ? $_POST["Ape_cliente"] : "";
    $email = isset($_POST["Email_cliente"]) ? $_POST["Email_cliente"] : "";
    $telefono = isset($_POST["Tlf_cliente"]) ? $_POST["Tlf_cliente"] : "";
    $dni = isset($_POST["DNI_cliente"]) ? $_POST["DNI_cliente"] : "";
    $cod_postal = isset($_POST["Cod_postal_cliente"]) ? $_POST["Cod_postal_cliente"] : "";
    $localidad = isset($_POST["Localidad_cliente"]) ? $_POST["Localidad_cliente"] : "";
    $provincia = isset($_POST["Provincia_cliente"]) ? $_POST["Provincia_cliente"] : "";
    $observaciones = isset($_POST["Observaciones"]) ? $_POST["Observaciones"] : "";

    $afectado = $clienteModel->actualizarCliente($id, $nombre, $apellido, $email, $telefono, $dni, $cod_postal, $localidad, $provincia, $observaciones);

    if ($afectado == 1) {
        echo "<script> alert('El empleado $nombre se editó correctamente :) '); location.href='clientes1.php' </script>";
    } else {
        echo "<script> alert('El empleado $nombre no se editó :( '); location.href='clientes1.php' </script>";
    }
}
?>
            <?php require_once "Controllers/clientes1_actualizar.php"; ?>
            <form class="flex fondo_form" action="actualizar_fila.php" method="post">
                <div class="primer_div">
                <input type="hidden" value="<?php echo $id ?>" name="Cod_cliente">
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre:</p>
                            <input type="text" name="Nom_cliente" id="Nom_cliente" value="<?php echo $nombre ?>">
                        </div>
                        <div class="pr1">
                            <p>Apellidos:</p>
                            <input type="text" name="Ape_cliente" id="Ape_cliente" value="<?php echo $apellido ?>">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Email:</p>
                            <input type="email" name="Email_cliente" id="Email_cliente" value="<?php echo $email ?>">
                        </div>
                        <div class="pr1">
                            <p>Teléfono:</p>
                            <input type="text" name="Tlf_cliente" id="Tlf_cliente" value="<?php echo $telefono ?>">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>DNI:</p>
                            <input type="text" name="DNI_cliente" id="DNI_cliente" value="<?php echo $dni ?>">
                        </div>
                        <div class="pr1">
                            <p>Codigo Postal:</p>
                            <input type="text" name="Cod_postal_cliente" id="Cod_postal__cliente" value="<?php echo $cod_postal ?>">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Localidad:</p>
                            <input type="text" name="Localidad_cliente" id="Localidad_cliente" value="<?php echo $localidad ?>">
                        </div>
                       <div class="pr1">
                            <p>Dirección:</p>
                            <input type="text" name="Provincia_cliente" id="Provincia_cliente" value="<?php echo $provincia ?>">
                        </div> 
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Observaciones:</p>

                            <textarea name="Observaciones" id="Observaciones" cols="30" rows="10"><?php echo $observaciones ?></textarea>

                        </div>
                    </div>
                </div>
                <div class="segundo_div imagen-botones">
                    <img src="Assets/img/usuario.png" alt="">
                    <div class="buttons">
                        <div>
                            <input type="submit" name="guardar" id="boton1" value="Guardar">
                        </div>
                        <div>
                            <input type="submit" name="actualizar" value="Actualizar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
>>>>>>> d7661f022eb3336e16e2b217d31d90be83df70dd
