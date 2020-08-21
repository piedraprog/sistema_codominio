<?php

include 'conexion.php';


if(isset($_POST['ID'])){

    $id = $_POST['ID'];

    

    $query = "SELECT * FROM `condominio`  WHERE `id_admin` = '$id'";
    
    $result = mysqli_query($conexion, $query);

    if(!$result) {
    die('Query Failed'. mysqli_error($conexion));
    }


    $json = array();

    while($row = mysqli_fetch_array($result)) {

        $json[] = array(

            'idAdmin' => $row['id_admin'],

            'name' => $row['nombre'],

            'ubicacion' => $row['ubicacion'],

            'cod_postal' => $row['codigo_postal'],

            'idCondo' => $row['id_condominio'],

            
        );
    }

    $jsonstring = json_encode($json);

    echo ($jsonstring);


}else{
    echo("No se encontro ningun condominio");
}







?>