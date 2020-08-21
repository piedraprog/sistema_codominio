<?php

include 'conexion.php';

if(isset($_POST['idadmin'])){

    $id=$_POST['idadmin'];

    //$id="1";
    $query = "SELECT * FROM `cuotas` WHERE `id_admin`='$id';";

    $result = mysqli_query($conexion,$query);
    
    
    $json = array();
    while($row = mysqli_fetch_array($result)) {

        $json[] = array(

            'id_cuota' => $row['id_cuota'],
            'fecha_emi' => $row['fecha_emision'],
            'fecha_venci' => $row['fecha_vencimiento'],
            'monto' => $row['monto'],
            'descripcion' => $row['descripcion'],
            'estado' => $row['estado']


        );
    }

    $jsonstring = json_encode($json);
    echo ($jsonstring);
}else{
    echo("error");
}



?>