<?php
  
    // Tratamiento de los input type='text'
    $textoInsercion1 = empty($_POST['textoInsercion1']) ? '' : $_POST['textoInsercion1'];
    $textoInsercion2 = empty($_POST['textoInsercion2']) ? '' : $_POST['textoInsercion2'];
    $textoInsercion3 = empty($_POST['textoInsercion3']) ? '' : $_POST['textoInsercion3'];
    $textoInsercion4 = empty($_POST['textoInsercion4']) ? '' : $_POST['textoInsercion4'];
    $textoInsercion5 = empty($_POST['textoInsercion5']) ? '' : $_POST['textoInsercion5'];
    $textoInsercion6 = empty($_POST['textoInsercion6']) ? '' : $_POST['textoInsercion6'];
    $textoInsercion7 = empty($_POST['textoInsercion7']) ? '' : $_POST['textoInsercion7'];
    $textoInsercion8 = empty($_POST['textoInsercion8']) ? '' : $_POST['textoInsercion8'];
    $textoInsercion9 = empty($_POST['textoInsercion9']) ? '' : $_POST['textoInsercion9'];
    // Llamada a la conexión
    require_once '../Db/ConDb.php';
    // Llamada al modelo
    require_once '../Models/clienteModel.php';

    // Instancia del objeto
    $oData = new Datos;

    // Llamada al método
    $sql = "insert into trabajo (Cod_cliente, DNI_cliente, Nom_cliente, Ape_cliente, Localidad, Provincia, Tlf_cliente, email_cliente,
    Dni_cliente, Cod_postal) values ('$textoInsercion1', '$textoInsercion2', '$textoInsercion3', '$textoInsercion4', '$textoInsercion5', '$textoInsercion6', '$textoInsercion7', '$textoInsercion8', '$textoInsercion9');";
    $sql .= "select * from trabajo order by Cod_cliente, DNI_cliente, Nom_cliente, Ape_cliente, Localidad, Provincia, Tlf_cliente, email_cliente,
    Dni_cliente, Cod_postal";
    $data = $oData->setGetData1($sql);

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
            <div class='bloque1'>$row->Cod_postal</div>
        </div>
        ";
    }
}

?>