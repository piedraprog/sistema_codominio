<?php


include 'conexion.php';


if( isset($_POST['id_user']) && isset($_POST['id_condo']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['cedula']) && isset($_POST['tlfn_casa']) && isset($_POST['nro_apto']) && isset($_POST['estado'])){

    
    $id_user= $_POST['id_user'];
    $id_condo= $_POST['id_condo'];
    $nombre= $_POST['nombre'];
    $apellido= $_POST['apellido'];
    $cedula= $_POST['cedula'];
    $tlfn_casa= $_POST['tlfn_casa'];
    $nro_apto= $_POST['nro_apto'];
    $estado= $_POST['estado'];

    

    $comprobar = "SELECT `id_user` FROM  `propietario` WHERE `id_user` = '$id_user';";
    $resultcompro = mysqli_query($conexion,$comprobar);

    $row = mysqli_fetch_array($resultcompro);

    if(empty($row['id_user'])){

        $query ="INSERT INTO `propietario` (`id_propietario`, `id_user`, `id_condominio`, `nombre`, `apellido`, `cedula`, `tlfno_casa`, `nro_apto`, `estado`) VALUES ('', '$id_user', '$id_condo', '$nombre', '$apellido', '$cedula', '$tlfn_casa', '$nro_apto', '$estado');";

        //$result = mysqli_query($conexion,$query);

        if(mysqli_query($conexion,$query)){

            echo("1");

        }else{
            echo("error en el query");
        }

        
            
    }else{

        echo ("error encontrado");
        

    }


   
}else{
    echo("limpio");
}

?>
