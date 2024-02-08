<?php
  
    // Llamada a la conexión
    require_once "./Db/ConDb.php";
    // Llamada al modelo
    require_once "./Models/clientes1_1Model.php";

    // Tratamiento de los imput text
    $textoConsulta1 = empty($_POST['textoConsulta1']) ? '' : $_POST['textoConsulta1'];

    // Instancia del objeto
    $oData = new Datos;

    // Llamada al método
    $sql = "select * from cliente order by Cod_cliente, Nom_cliente, DNI_cliente";
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
            <div class='bloque1'>Código cliente</div>
            <div class='bloque1'>Nom_cliente</div>
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
            </div>
            ";
        }
    }

?>