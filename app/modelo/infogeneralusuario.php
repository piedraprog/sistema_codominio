<?php

include 'conexion.php';

//este if me verifica si lo que estoy mandando a travez de la url esta definido o no
if(isset($_POST['id'])){


    $id=$_POST['id'];

    //seleccionar informacion del propietario
    $query = "SELECT * FROM `propietario` WHERE `id_user`=$id;";
    //se ejecuta la consulta que se esta pasando a travez del $query
    $result = mysqli_query($conexion,$query); 
    //aqui se le pasa una fila de el resultado a la variable row
    $row =  mysqli_fetch_array($result);

    //el valor obtenido pasa a otra variable para hacer una consulta nueva
    $idcondo =$row['id_condominio'];
    //seleccionar informacion del condominio
    $query2 = "SELECT nombre FROM `condominio` WHERE `id_condominio`='$idcondo';";
    $result2 = mysqli_query($conexion,$query2);
    $row2 =  mysqli_fetch_array($result2);

    //sacar el numero de cuotas del propietario 
    /*$idprop = $row['id_propietario'];
    $query3 = "SELECT * FROM `intermedia` WHERE `id_propietario`=1";
    */

    //pedir el correo de el usuario en cuestion
    $query3 = "SELECT correo FROM `usuario` WHERE `id_user`='$id';";
    $result3 = mysqli_query($conexion,$query3);
    $row3 =  mysqli_fetch_array($result3);


    //toda la informacion obtenida se vacia en una array para luego devolverlo a la pagina en forma de datos JSON
    $json = array();
    $json[]=array(
        //Cada uno de los datos obtenidos en vaciado en un array identificado 
        'id_prop' => $row['id_propietario'],
        'nombre' => $row['nombre'],
        'apellido' => $row['apellido'],
        'cedula' => $row['cedula'],
        'tlf_casa' => $row['tlfno_casa'],
        'nro_casa' => $row['nro_apto'],
        'estado' => $row['estado'],
        'nombre_condo' => $row2['nombre'],
        'correo' =>$row3['correo']
    );

    //a travez de la funcion json_enconde los datos se tranforman en cadenas de datos JSON
    $jsonstring = json_encode($json);
    echo ($jsonstring);
}else{

    echo("error en la consulta");

}


?>