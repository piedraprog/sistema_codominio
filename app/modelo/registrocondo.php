<?php

include 'conexion.php';

if(isset($_POST['idAdmin']) && isset($_POST['nombre']) && isset($_POST['ubicacion']) && isset($_POST['codigoPostal'])){
    
    $idAdmin = $_POST['idAdmin'];
    $nombrecondo = $_POST['nombre'];
    $ubicacion = $_POST['ubicacion'];
    $cod_postal = $_POST['codigoPostal'];

    
    

    $query = "INSERT INTO `condominio` (`id_Admin`, `nombre`, `ubicacion`, `cod_postal`, `id_condominio`) VALUES ('$idAdmin', '$nombrecondo', '$ubicacion', '$cod_postal', NULL);";

    $result = mysqli_query($conexion,$query);

    if($result){
        echo("1");
    }else{
        echo("problemas al crear el condominio");
    }

}else{
    echo("valores vacios");
}



?>