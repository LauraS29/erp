<?php

// Llamada a la conexión
require_once 'Db/ConDb.php';
// Llamada al modelo
require_once 'Models/clientes1_1Model.php';

// Instancia del objeto
$oData = new Datos;

// Llamada al método
$sql = "SELECT Cod_cliente, Nom_cliente, DNI_cliente FROM cliente ORDER BY Cod_cliente, Nom_cliente, DNI_cliente";
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
            <div class='bloque1'>Cód.cliente</div>
            <div class='bloque1'>Nom.cliente</div>
            <div class='bloque1'>DNI</div>
        </div>
        ";
        foreach ($data as $row)
        {
            echo
            "
            <div class='bloque0'>
                <div class='bloque1'>$row->Cod_cliente</div>
                <div class='bloque1'>$row->Nom_cliente</div>
                <div class='bloque1'>$row->DNI_cliente</div>
                <div class='bloque1'>$row->DNI_cliente</div>
                <div class='bloque1'>$row->DNI_cliente</div>
                <div class='bloque1'>$row->DNI_cliente</div>
            </div>
            ";
        }
    }

?>