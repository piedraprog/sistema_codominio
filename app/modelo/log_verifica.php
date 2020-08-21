 <?php

include 'conexion.php';

session_start();

if(isset($_POST['user']) && isset($_POST['pass'])){
    
    $user = mysqli_real_escape_string($conexion, $_POST['user']);
    $pass = mysqli_real_escape_string($conexion, $_POST['pass']);

    //BUSCA EN LA TABLA USUARIO ALGUNA COINCIDENCIA PARA ASI INICIAR SESION COMO USUARIO
    $query = "SELECT * FROM `usuario` WHERE correo='$user' AND contra= '$pass'";
    $result = mysqli_query($conexion,$query);
    $num_row = mysqli_num_rows($result);


    //BUSCA EN LA TABLA DE ADMINISTRADOR PARA INICIAR SESION COMO ADMIN 
    $query2 ="SELECT * FROM `administrador` WHERE correo = '$user' AND contra ='$pass'";
    $result2 = mysqli_query($conexion,$query2);
    $num_row2 = mysqli_num_rows($result2);

    

    if($num_row == "1"){

        $data = mysqli_fetch_array($result);
        //se declaran las variables $_SESSION para asi dar a entender que la sesion se creo

        $_SESSION['user'] = $data['correo'];
        $_SESSION['id'] = $data['id_user'];
        $_SESSION['nombre'] = $data['usuario'];
            
        echo("1");
    
    }else if($num_row2 == "1"){

        $data2 = mysqli_fetch_array($result2);

        $_SESSION['user2'] = $data2['correo'];
        $_SESSION['id'] = $data2['id_admin'];
        $_SESSION['nombre'] = $data2['nombre'];
        
        echo("2");
        
        
    }else{
        echo("error no encontrado");
    }

}else{
    echo("error no encontrado");
}

?>