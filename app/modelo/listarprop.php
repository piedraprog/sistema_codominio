<?php


include 'conexion.php';

if(isset($_POST['id'])){

    $id= $_POST['id'];
    

    $query = "SELECT id_condominio FROM `condominio` WHERE  `id_admin`='$id';";
    $result=mysqli_query($conexion,$query);

    $row = mysqli_fetch_array($result);
    $idcondo =  $row['id_condominio'];    
   
    $query2 = "SELECT * FROM `propietario` WHERE `id_condominio`='$idcondo'";
    $result2= mysqli_query($conexion,$query2);

    $json = array();
    while($row = mysqli_fetch_array($result2)) {

        $json[] = array(

            'id_propietario' => $row['id_propietario'],
            'nombre' => $row['nombre'],
            'apellido' => $row['apellido'],
            'nro_apto' => $row['nro_apto'],
            'estado' => $row['estado']
        
        );
    }

    $jsonstring = json_encode($json);

    echo ($jsonstring);


}else if(isset($_POST['idmoroso'])){

    $id= $_POST['idmoroso'];
    

    $query = "SELECT id_condominio FROM `condominio` WHERE  `id_admin`='$id';";
    $result=mysqli_query($conexion,$query);

    $row = mysqli_fetch_array($result);
    $idcondo =  $row['id_condominio'];    
   
    $query2 = "SELECT * FROM `propietario` WHERE `id_condominio`='$idcondo' AND `estado`= 0";
    $result2= mysqli_query($conexion,$query2);

    $json = array();
    while($row = mysqli_fetch_array($result2)) {

        $json[] = array(

            'id_propietario' => $row['id_propietario'],
            'nombre' => $row['nombre'],
            'apellido' => $row['apellido'],
            'nro_apto' => $row['nro_apto'],
            'estado' => $row['estado']

        );
    }

    $jsonstring = json_encode($json);
    echo ($jsonstring);


}else if(isset($_POST['idvigente'])){

    $id= $_POST['idvigente'];
    

    $query = "SELECT id_condominio FROM `condominio` WHERE  `id_admin`='$id';";
    $result=mysqli_query($conexion,$query);

    $row = mysqli_fetch_array($result);
    $idcondo =  $row['id_condominio'];    
   
    $query2 = "SELECT * FROM `propietario` WHERE `id_condominio`='$idcondo' AND `estado`<> 0";
    $result2= mysqli_query($conexion,$query2);

    $json = array();
    while($row = mysqli_fetch_array($result2)) {

        $json[] = array(

            'id_propietario' => $row['id_propietario'],
            'nombre' => $row['nombre'],
            'apellido' => $row['apellido'],
            'nro_apto' => $row['nro_apto'],
            'estado' => $row['estado']

        );
    }

    $jsonstring = json_encode($json);
    echo ($jsonstring);

}else{
    echo("error no hay propietarios");
}

?>