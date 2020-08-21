<?php
//cuando se le da al boton de cerrar sesion se ejecuta esta accion que me cierra o destruye  la sesion y asi la da como finalizada al hacerlo me redirige automaticamente al login 

session_start();
session_destroy();
header("location: ../vista/login.php ");

?>