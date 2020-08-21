<?php

session_start();

if(!isset($_SESSION['user'])){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condominio || Userpage</title>

    <link rel="stylesheet" href="css/bootstrap4/css/bootstrap.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/interfacesUI.css">

    <!-- Font Awesome JS -->

    <script defer src="js/all.js"></script>
</head>
<body>
<div class="wrapper">
        <!-- BARRA LATERAL//BARRA LATERAL // BARRA LATERAL // BARRA LATERAL//BARRA LATERAL // BARRA LATERAL   -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Bienvenido <?php echo($_SESSION['nombre']);?></h3>
            </div>

            <ul class="list-unstyled components">
                <p>Menu de Estado</p>
                <li>
                    <a onclick="home()">Home</a>
                </li>
                <li>
                    <a onclick="registroprop()">Registrarme Como propietario</a>
                </li>
                <li>
                    <a onclick="resgistropago()">Registrar Pago</a>
                </li>
                <li>
                    <a onclick=" opciones()">Opciones</a>
                </li>
                <li>
                    <a onclick="#">Ayuda</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="../modelo/logout.php" class="download">Cerrar Sesion</a>
                </li>

            </ul>
            <ul> <label>Piedra & Co. version 1.0</label></ul>
        </nav>

        <!-- CONTENIDO//CONTENIDO//CONTENIDO//CONTENIDO//CONTENIDO//CONTENIDO//CONTENIDO//CONTENIDO -->
        <div id="content">

            <!-- BARRA LATERAL DE ACCIONES  -->
            <!-- PAGINA DE INCIO //PAGINA DE INCIO// PAGINA DE INCIO //PAGINA DE INCIO// PAGINA DE INCIO //PAGINA DE INCIO// PAGINA DE INCIO //PAGINA DE INCIO// PAGINA DE INCIO //PAGINA DE INCIO// --> 
            <div id="home">
                <h1>PAGINA PRINCIPAL</h1>
                
                <!-- INFORMACION GENERAL DEL USUARIO -->
                <div id="perfil-user" class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <i class="fas fa-user"></i>  <?php echo($_SESSION['nombre']);?>
                            <input type="hidden" id="id_user" value="<?php echo($_SESSION['id'])?>">
                            <small class="float-right">Estado <label id="estado"></label></small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-6">
                        <p class="lead">Informacion del propietario</p>

                        <div class="table-responsive">
                            <table id="datos1"class="table">
                                
                            </table>
                        </div>
                    </div>
                    <div class="col-6">
                        <p class="lead">Informacion de Propiedad</p>

                        <div class="table-responsive">
                            <table id="datos2"class="table">
                               
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Tabla para mostrar todas las cuotas sin pagar o pagadas -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <div class="card-header">
                                <h3 class="card-title">Informacion de Cuotas</h3>
                            </div>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Año</th>
                                    <th>Mes</th>
                                    <th>monto</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>2020</td>
                                    <td>febrero</td>
                                    <td>$64.50</td>
                                    <td><label class="btn btn-block btn-success">Vigente</label></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>2020</td>
                                    <td>marzo</td>
                                    <td>$64.50</td>
                                    <td><label class="btn btn-block btn-danger ">Debe</label></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>               
            </div>

            </div>


            <!-- REGISTRARME COMO PROPIETARIO// REGISTRARME COMO PROPIETARIO// REGISTRARME COMO PROPIETARIO// REGISTRARME COMO PROPIETARIO// REGISTRARME COMO PROPIETARIO// -->
            <div id="registro-prop" class="col-md-12">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Registrarme como propietario</h3>
                    </div>
                   
                    <div class="card-body">
                        <form id="registro_prop" role="form">
                            <div class="row">                                
                                <div class="col-sm-6">
                                    <div class="form-group">                                
                                        <label>Nombre</label>
                                        <input id="nombre" type="text" class="form-control" placeholder="nombre">                                             
                                    </div>                                        
                                </div>
                                <div class="col-sm-6">                                   
                                    <div class="form-group">
                                        <label>id del condominio</label>
                                        <input id="id_condo" type="number" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Apellido</label>
                                        <input id="apellido" type="text" class="form-control" placeholder="apellido">
                                    </div>      
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Cedula</label>
                                        <input id="cedula" type="number" class="form-control" placeholder="cedula">
                                    </div>      
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>telefono de casa</label>
                                        <input id="nro_casa" type="number" class="form-control" placeholder="tlfn casa">
                                    </div>      
                                </div>
                                <div class="col-sm-6">                                   
                                    <div class="form-group">        
                                        <label>numero de apartamento</label>
                                        <input id="nro_apto" type="number" class="form-control"placeholder="nro apto">
                                    </div>    
                                </div>
                                <input type="hidden" id="id_user" placeholder="<?php echo($_SESSION['id'])?>">
                                <input type="hidden" id="estado" value="0">
                                
                            </div>
                            <div class="col-sm-8">
                                    <div class="form-group">      
                                        <input  type="submit" value="Registarme">
                                    </div>
                            </div>
                        </form> 
                    </div>     
                    <div class="card-body">
                        <form id="succesCondo" role="form">                           
                        </form> 
                    </div>     
                </div>
            </div>

            
    
            <!-- REGISTRO DE PAGOS//REGISTRO DE PAGOS//REGISTRO DE PAGOS//REGISTRO DE PAGOS//REGISTRO DE PAGOS//REGISTRO DE PAGOS  -->
            <div id="registro-pago" class="col-md-12">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Registrar Pago</h3>
                    </div>
                   
                    <div class="card-body">
                        <form id="registroCon" role="form">
                            <div class="row">                                
                                <div class="col-sm-6">
                                    <div class="form-group">                                
                                        <label>monto</label>
                                        <input id="monto" type="text" class="form-control" placeholder="nombre">                                             
                                    </div>                                        
                                </div>
                                
                            </div>
                            <div class="col-sm-8">
                                    <div class="form-group">      
                                        <input type="submit" value="Registar Condominio">
                                    </div>
                            </div>
                        </form> 
                    </div>     
                    <div class="card-body">
                        <form id="succesCondo" role="form">                           
                        </form> 
                    </div>     
                </div>
            </div>

            


            <!-- OPCIONES //OPCIONES// OPCIONES //OPCIONES// OPCIONES //OPCIONES// OPCIONES //OPCIONES// OPCIONES //OPCIONES// -->    

            <!-- AQUI UNO UEDE CAMBIAR LOS DATOS DE SU CUENTA EN EL CASO QUE HAYA COMETIDO UN ERROR -->
            <div id="opciones" class="col-md-12">                      
                    
                <h1 class="card-title">Configuracion de cuenta</h1>
                    
                <div class="card card-warning">    
                    <div class="card-body">
                        <form role="form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <label>Text</label>
                                        <input type="text" class="form-control" placeholder="Enter ...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Text Disabled</label>
                                        <input type="text" class="form-control" placeholder="Enter ..." disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Textarea</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter ..."></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Textarea Disabled</label>
                                        <textarea class="form-control" rows="3" placeholder="Enter ..." disabled></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>       
                </div>
            </div>
        </div>
    </div>

</body>


<script src="js/jquery-3.1.1.min.js"></script>
<script src="css/bootstrap4/js/bootstrap.min.js"></script>
<script src="../contolador/userUI.js"></script>


</html>

