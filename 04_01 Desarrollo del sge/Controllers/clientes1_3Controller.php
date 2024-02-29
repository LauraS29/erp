<?php

    // Llamada a la conexión
    require_once "../Db/ConDb.php";
    // Llamada al modelo
    require_once "../Models/clientes1_1Model.php";

    // Tratamiento de los imput text
    $Consulta1 = empty($_POST['Consulta1']) ? '' : $_POST['Consulta1'];

    // Instanciación de un objeto
    $oData = new Datos;

    // Llamada al método
    $sql = "select * from pasteleria where tipo_pastel like '%$Consulta1%' or desc_pastel like '%$Consulta1%' or precio_pastel like '%$Consulta1%' order by tipo_pastel, desc_pastel, precio_pastel";

    $data = $oData->getData1($sql);


    if(empty($data))
    {
        echo
        "
            <div class='bloque1 negrita'>
                No hay datos
            </div>
        ";
    }
    else
    {
        echo
        "
            <div class='bloque1 negrita'>
                <div class='bloque1'>Tipo</div>
                <div class='bloque1'>Descripción</div>
                <div class='bloque1'>Precio</div>
            </div>     
        ";
        foreach($data as $row)
        {
            echo
            "
            <div class='bloque0'>
                <a class='bloque0' href='edicion-con-declaraciones-preparadas.php?ide_pastel=$row->ide_pastel'> 
                    <div class='bloque1'>$row->tipo_pastel</div>
                    <div class='bloque1'>$row->desc_pastel</div>
                    <div class='bloque1'>$row->precio_pastel</div>
                    
                </a>  
            </div>
            ";
        }
    }
    

    


?>