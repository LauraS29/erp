<?php
  
    // Llamada a la conexión
    require_once './Db/ConDb.php';
    // Llamada al modelo
    require_once './Models/clientes1_1Model.php';

    // Tratamiento de los imput text
    $textoConsulta1 = empty($_POST['textoConsulta1']) ? '' : $_POST['textoConsulta1'];

    // Instancia del objeto
    $oData = new Datos;

    // Llamada al método
    $sql = "select * from cliente where Cod_cliente like '%$textoConsulta1%' or Nom_cliente like '%$textoConsulta1%' or DNI_cliente like '%$textoConsulta1%'  
    or Ape_cliente like '%$textoConsulta1%' or Cod_postal_cliente like '%$textoConsulta1%' or Localidad_cliente like '%$textoConsulta1%' or Provincia_cliente like '%$textoConsulta1%' or Email_cliente like '%$textoConsulta1%' or Tlf_cliente like '%$textoConsulta1%' or Observaciones like '%$textoConsulta1%' order by Cod_cliente, Nom_cliente, DNI_cliente, Ape_cliente, Cod_postal_cliente, Localidad_cliente, Provincia_cliente, Email_cliente, Tlf_cliente, Observaciones";
    
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