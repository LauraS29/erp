<?php
  
    // Llamada a la conexión
    require_once 'Db/Con1Db.php';
    // Llamada al modelo
    require_once 'Models/clienteModel.php';

    // Instancia del objeto
    $oData = new Datos;

    // Llamada al método
    $sql .= "select * from trabajo order by Cod_cliente, DNI_cliente, Nom_cliente, Ape_cliente, Localidad, Provincia, Tlf_cliente, email_cliente,
    Dni_cliente, Cod_postal";
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
            <div class='bloque1'>$row->Cod_postal</div>
        </div>
        ";
    }
}

?>