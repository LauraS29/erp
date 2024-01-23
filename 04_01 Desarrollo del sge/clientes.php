<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
    <script src="./Assets/js/motor.js"></script>
    <link rel="stylesheet" href="./Assets/css/estilos.css">
</head>
<body>
<header>
        <div class="navegacion" id="p1">
            <a class="negrita" href="clientes.php">Clientes</a><br>
            <a href="proveedores1.php">Proveedores</a><br>
            <a href="personal.php">Personal</a><br>
            <a href="productos.php">Productos</a><br>
            <a href="ventas.php">Ventas</a><br>
            <a href="compra1.php">Compra</a><br>
            <a href="pedido.php">Pedidos</a><br>
        </div>
    </header>
    <section class="fondo_section">
        <div class="flex div1">
            <img src="Assets/img/repartidor.png" alt="">
            <p>Proveedores</p>
        </div>
        <div class="fondo_div">
            <div>
                <h2>Datos de Clientes</h2>
            </div>
            <form class="flex fondo_form" action="clientes.php" method="post">
                <div class="primer_div">
                    <div class="flex">
                        <div class="pr">
                            <p>Código:</p>
                            <input type="text" name="codigo">
                        </div>
                        <div class="pr1">
                            <p>Teléfono:</p>
                            <input type="text" name="telefono">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Nombre:</p>
                            <input type="text" name="nombre">
                        </div>
                        <div class="pr1">
                            <p>Email:</p>
                            <input type="text" name="email">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Apellidos:</p>
                            <input type="text" name="apellidos">
                        </div>
                        <div class="pr1">
                            <p>DNI:</p>
                            <input type="text" name="dni">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Localidad:</p>
                            <input type="text" name="localidad">
                        </div>
                        <div class="pr1">
                            <p>Código Postal:</p>
                            <input type="text" name="codigopostal">
                        </div>
                    </div>
                    <div class="flex">
                        <div class="pr">
                            <p>Provincia/Pais:</p>
                            <input type="text" name="pais">
                        </div>
                        <div class="pr1">
                            <p>Observaciones:</p>
                            <textarea name="observaciones" id="" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>
                <div class="segundo_div imagen-botones">
                    <img src="Assets/img/usuario.png" alt="">
                    <div class="buttons">
                        <div>
                            <input type="submit" value="Guardar">
                        </div>
                        <div>
                            <input type="button" value="Actualizar">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    // Verifica si todos los campos están llenos
    $campos_llenos = true;
    $campos = ['codigo', 'telefono', 'nombre', 'email', 'apellidos', 'dni', 'localidad', 'codigopostal', 'pais', 'observaciones'];

    foreach ($campos as $campo) 
    {
        if (empty($_POST[$campo])) 
        {
            $campos_llenos = false;
            break;
        }
    }

    if ($campos_llenos) 
    {
        // Aquí puedes realizar la lógica de guardar en la base de datos u otras operaciones necesarias

        // Muestra una alerta de éxito en JavaScript
        echo '<script>alert("Guardado exitosamente");</script>';
    }
}

// Llamada a la conexión
require_once 'Db/ConDb.php';
// Llamada al modelo
require_once 'Models/clienteModel.php';

// Instancia del objeto
$oData = new Datos;

// Llamada al método
$sql = "select * from Cliente order by Cod_cliente, DNI_cliente, Nom_cliente, Ape_cliente, Localidad, Provincia, Tlf_cliente, email_cliente,
Dni_cliente, CP";
$data = $oData->getData1($sql);

if(empty($data))
{
    echo
    "
        <div class='bloque1 negrita'>
            No hay datos.
        </div>
    ";
}
else
{
    echo
    "
    <div class='bloque0 negrita'>
        <div class='bloque1'>Código</div>
        <div class='bloque1'>Nombre</div>
        <div class='bloque1'>Apellidos</div>
        <div class='bloque1'>Localidad</div>
        <div class='bloque1'>Provincia/Pais</div>
        <div class='bloque1'>Télefono</div>
        <div class='bloque1'>Email</div>
        <div class='bloque1'>DNI</div>
        <div class='bloque1'>Código postal</div>

    </div>
    ";
    foreach ($data as $row)
    {
        echo
        "
        <div class='bloque0'>
            <div class='bloque1'>$row->Cod_cliente</div>
            <div class='bloque1'>$row->DNI_cliente</div>
            <div class='bloque1'>$row->Nom_cliente</div>
            <div class='bloque1'>$row->Ape_cliente</div>
            <div class='bloque1'>$row->Localidad</div>
            <div class='bloque1'>$row->Provincia</div>
            <div class='bloque1'>$row->Tlf_cliente</div>
            <div class='bloque1'>$row->email_cliente</div>
            <div class='bloque1'>$row->Dni_cliente</div>
            <div class='bloque1'>$row->CP</div>
        </div>
        ";
    }
}

?>