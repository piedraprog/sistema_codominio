<?php

include 'conexion.php';

if(isset($_POST['idCuota']) && isset($_POST['idAdmin']) && isset($_POST['fec_creada']) && isset($_POST['fec_vencimiento']) && isset($_POST['monto']) &&isset($_POST['descripcion']) && isset($_POST['estado'])){

    $id_cuota= $_POST['idCuota'];
    $id_admin= $_POST['idAdmin'];
    $fecha_emision= $_POST['fec_creada'];
    $fecha_vencimiento= $_POST['fec_vencimiento'];
    $monto= $_POST['monto'];
    $descripcion= $_POST['descripcion'];
    $estado= $_POST['estado'];
    

    $query="INSERT INTO `cuotas` (`id_cuota`, `id_admin`, `fecha_emision`, `fecha_vencimiento`, `monto`, `descripcion`, `estado`) VALUES ('$id_cuota', '$id_admin', '$fecha_emision', '$fecha_vencimiento', '$monto', '$descripcion', '$estado');";
    

    if(mysqli_query($conexion,$query)){
        echo("1");
    }else{
        echo("error");
    }
    

}else{
    echo("error registrando cuota");
}





?>