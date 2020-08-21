<?php

include 'conexion.php';

//REGISTRO DE ADMINISTRADOR 
if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['cedula']) && isset($_POST['correo']) && isset($_POST['pass'])){

    $id =$_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $pass = $_POST['pass'];
    
    
    
    $query = "INSERT INTO `administrador` (`id_admin`, `nombre`, `apellido`, `cedula`, `correo`, `contra`) VALUES ('$id', '$nombre', '$apellido', '$cedula', '$correo', '$pass');";

   

    $result = mysqli_query($conexion,$query);

    if(!$result){
        echo("query failed.");
    }else{
        echo("registro agregado con exito");
    }


}elseif(isset($_POST['idU']) && isset($_POST['userU'])  && isset($_POST['correoU']) && isset($_POST['passU'])){

    $idU = $_POST['idU'];
    $nombreU = $_POST['nombreU'];
    $correoU = $_POST['correoU'];
    $passU = $_POST['passU'];

    $query2 = "INSERT INTO `usuario` (`id_user`, `usuario`, `correo`, `contra`) VALUES ('$idU', '$nombreU', '$correoU', '$passU');";

    $result2= mysqli_query($conexion,$query2);

    if(!$result2){
        echo("query failed.");
    }else{
        echo("registro agregado con exito");
    }



}else{

    echo("algun campo esta sin rellenar");

}




    










?>