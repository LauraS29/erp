<?php

    // Llamada a la conexión
    require_once "../Db/ConDb.php";
    // Llamada al modelo
    require_once "../Models/clientes1_1Model.php";

    // Tratamiento de los imput text
    $Consulta1 = isset($_GET['Consulta1']) ? $_GET['Consulta1'] : '';

    // Instanciación de un objeto
    $oData = new Datos;

    // Llamada al método
    $sql = "select * from cliente where Cod_cliente like '%$Consulta1%' or Nom_cliente like '%$Consulta1%' or DNi_cliente like '%$Consulta1%' order by Cod_cliente, Nom_cliente, DNi_cl8iente";

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
        foreach($data as $row)
        {
            $rowsHTML .= "<tr>
            <td>{$row->Cod_cliente}</td>
            <td>{$row->Nom_cliente}</td>
            <td>{$row->DNI_cliente}</td>
            
          </tr>";
        }
    }
    

    


?>