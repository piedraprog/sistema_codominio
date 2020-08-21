<?php

session_start();

if(!isset($_SESSION['user2'])){
    header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condominio || Adminpage</title>

    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="css/bootstrap4/css/bootstrap.css">
    <!-- CSS -->
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
                    <a href="#" onclick="home()">Home</a>
                </li>

                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Propietarios</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a  onclick="propgen()">General</a>
                            
                        </li>
                        <li>
                            <a onclick="propvige()">Vigentes</a>
                        </li>
                        <li>
                            <a onclick="propdeu()">Deudores</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#condoSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Condominio</a>
                    <ul class="collapse list-unstyled" id="condoSubmenu">
                        <li>
                            <a onclick="registrocondo()">Registro de Condominio</a>
                        </li>
                        <li>
                            <a onclick="infogeneralcondo()">Informacion General</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#cuotaSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Cuotas</a>
                    <ul class="collapse list-unstyled" id="cuotaSubmenu">
                        <li>
                            <a onclick="registrocuota()">Registrar Nueva cuota</a>
                        </li>
                        <li>
                            <a onclick="generalcuota()">Informacion General</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a onclick="opciones()">Opciones</a>
                </li>
                <li>
                    <a href="#">Ayuda</a>
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
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" >total Usuarios</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" >Deudores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" >Vigentes</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- PAGINA DE INCIO //PAGINA DE INCIO// PAGINA DE INCIO //PAGINA DE INCIO// PAGINA DE INCIO //PAGINA DE INCIO// PAGINA DE INCIO //PAGINA DE INCIO// PAGINA DE INCIO //PAGINA DE INCIO// --> 
            <div id="home">
                <h1>PAGINA PRINCIPAL</h1>
            </div>


            <!-- PROPIETARIOS// PROPIETARIOS// PROPIETARIOS// PROPIETARIOS// PROPIETARIOS// -->
            <!-- TABLA DE INFORMACION GENERAL DE PROPIETARIOS -->
            <div id="general-propietarios">
                
                <h3 class="card-title">Listado de Propietarios</h3>
                
                <input type="hidden" id="idadmin" value="<?php echo($_SESSION['id'])?>">

                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            <th>id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Numero de apartamento</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody id="propi">
                            <!--  aqui se muestra la informacion que obtengo de la base de datos!-->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- TABLA DE INFORMACION DE PROPIETARIOS DEUDORES-->
            <div id="deudor-propietario" >
                
                <h1 class="card-title">Listado de Propietarios Morosos</h1>
                <input type="hidden" id="idadmin" value="<?php echo($_SESSION['id'])?>">
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Numero de apartamento</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody id="moroso">
                            
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- TABLA DE INFORMACION DE PROPIETARIOS VIGENTES-->
            <div id="vigente-propietario">
               
                <h1 class="card-title">Listado de Propietarios Vigentes</h1>
                <input type="hidden" id="idadmin" value="<?php echo($_SESSION['id'])?>">
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            <th>id</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Numero de apartamento</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody id="vigente">

                        </tbody>
                    </table>
                </div>
               
            </div>


            <!-- CONDOMINIOS// CONDOMINIOS// CONDOMINIOS// CONDOMINIOS// CONDOMINIOS// -->
            <!-- REGISTRAR CONDOMINIO  -->
            <div id="registro-condo" class="col-md-12">
                <!-- general form elements disabled -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">Registro De condominio</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form id="registroCon" role="form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- text input -->
                                    <div class="form-group">
                                        <input type="hidden" id="idAdmin" value="<?php echo($_SESSION['id'])?>">
                                        <label>Nombre del Condominio</label>
                                        <input id="nom_condo" type="text" class="form-control" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Codigo Postal</label>
                                        <input id="cod_postal" type="text" class="form-control" placeholder="Cod_postal">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <!-- textarea -->
                                    <div class="form-group">
                                        <label>Ubicacion</label>
                                        <textarea id="ubicacion"class="form-control" rows="3" placeholder="Ubicacion"></textarea>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Registar Condominio">
                        </form> 
                    </div>     
                    <div class="card-body">
                        <form id="succesCondo" role="form">
                            
                        </form> 
                    </div>     
                </div>


            </div>

            <!-- INFORMACION GENERAL DE CONDOMINIO   -->
            <div id="general-condo" class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row ">
                    <div class="col-12 ">
                        <h4>
                            <i class="fas fa-building"></i> 
                            Condominios Administrados
                            <input type="hidden" id="idadminlist" value="<?php
                            echo($_SESSION['id'])?>">
                           
                        </h4>
                    </div>
                    
                    <!-- /.col -->
                </div>
                <!-- TABLA DE INFORMACION DE LOS CONDOMINIOS-->
                <div id="tabla-infocondo" class="col-12">
                </div>
            
        
            </div>

            <!-- CUOTAS //CUOTAS// CUOTAS //CUOTAS// CUOTAS //CUOTAS// CUOTAS //CUOTAS// CUOTAS //CUOTAS// -->  
            <!-- REGISTRO DE CUOTAS  -->
            <div id="registro-cuota" class="col-md-12">
                
                <h1>Registro De cuotas</h1>
                <p>Al ingresar una nueva cuota se le va a agregar automaticamente a todos los propietarios correspondientes el condominio</p>

                <div class="card card-warning">
                    <div class="card-body">
                        <form id="registrocuota" role="form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="hidden" id="idAdmin" value="<?php echo($_SESSION['id'])?>">
                                        <input type="hidden" id="idcuota" value="">
                                        <input type="hidden" id="estado" value="0">
                                        <label>Fecha Actual</label>
                                        <input id="fec_creada" type="date" class="form-control" placeholder="fecha">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Fecha de Vencimiento</label>
                                        <input id="fec_vencimiento" type="date" class="form-control" placeholder="fecha venciento">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Monto</label>
                                        <input id="monto" type="number" class="form-control"  placeholder="monto"></input>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Descripcion</label>
                                        <textarea id="descripcion" class="form-control"  placeholder="descripcion"></textarea>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" value="Registar Condominio">
                        </form> 
                    </div>     
                    <div class="card-body">
                        <div id="succes-cuota">
                        </div>
                    </div>     
                </div>


            </div>

            <!-- INFORMACION GENERAL DE CUOTAS   -->
            <div id="general-cuota">
               
                <h1 class="card-title">Listado de Cuotas</h1>
                <input type="hidden" id="idadmin" value="<?php echo($_SESSION['id'])?>">
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            
                            <td>id</td>
                            <td>fecha emision</td>
                            <td>fecha vencimiento</td>
                            <td>monto</td>
                            <td>descripcion</td>
                            <td>estado</td>
                            </tr>
                        </thead>
                        <tbody id="cuotas">
                                
                        </tbody>
                    </table>
                </div>
               
            </div>


            <!-- OPCIONES //OPCIONES// OPCIONES //OPCIONES// OPCIONES //OPCIONES// OPCIONES //OPCIONES// OPCIONES //OPCIONES// -->    
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
            
            <!--EXTRAS//EXTRAS//EXTRAS//EXTRAS//EXTRAS//EXTRAS//EXTRAS//EXTRAS//EXTRAS-->

            <!-- INFORMACION DE USUARIO -->
            <div id="perfil-user" class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <i class="fas fa-user"></i>Nombre De Usuario
                            <small class="float-right">Estado Usuario</small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-6">
                        <p class="lead">Informacion del Usuario</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">Nombre:</th>
                                    <td>NOMBRE</td>
                                </tr>
                                <tr>
                                    <th>Apellido</th>
                                    <td>APELLIDO</td>
                                </tr>
                                <tr>
                                    <th>Cedula</th>
                                    <td>Cedula</td>
                                </tr>
                                <tr>
                                    <th>Correo</th>
                                    <td>Correo</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-6">
                        <p class="lead">Informacion de Propiedad</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th>Nombre del condominio</th>
                                    <td>Piedra Country</td>
                                </tr>
                                <tr>
                                    <th style="width:50%">Numero de Apartamento</th>
                                    <td>NUMERO</td>
                                </tr>
                                <tr>
                                    <th>Numero de casa:</th>
                                    <td>042351558</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <!-- Table row -->
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
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">

                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">

                        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                      <i class="fas fa-download"></i> Generate PDF
                    </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- SCRIPTS //SCRIPTS// SCRIPTS //SCRIPTS// SCRIPTS //SCRIPTS// SCRIPTS //SCRIPTS// SCRIPTS //SCRIPTS// --> 
<script src="js/jquery-3.1.1.min.js"></script>
<script src="css/bootstrap4/js/bootstrap.min.js "></script>
<script src="../contolador/AdminUI.js"></script>
</html>