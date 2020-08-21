<?php

$dir = "localhost"; //direccion
$user = "root";     //usuario
$pass = "";         //contraseña
$dbname = "db_condominio2";    //nombre de la base de datos en cuestion

//SIRVE PARA CONECTARSE A LA BASE DE DATOS PASANDOLE LA DIRECCION EL USUARIO LA CONTRASEÑA Y EL NOMBRE DE LA BASE DE DATOS EN CUESTION
$conexion = mysqli_connect($dir,$user,$pass,$dbname) or die ("problemas con la conexion a la base de datos");


?>
