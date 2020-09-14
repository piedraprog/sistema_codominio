PROYECTO PROGRAMACION VI HACER UN SISTEMA PARA LA ADMINISTRACION DE CONDOMINIO

##INTEGRANTES 
UNIVERSIDAD NUEVA ESPARTA
JOSE PIEDRA 

PROYECTO V 1.0

PROYECTO BAJO PHP7, AJAX Y MYSQL  VERSION 1.0 

---------- PASOS PARA LA INSTALACION Y QUE EL PROYECTO FUNCIONE ---------

1- en el caso de no tener el XAMPP O cualquier otro servidor local lo puedes descargar aqui 

link : https://www.apachefriends.org/es/download.html

    1.2- una vez descargado instalar el xampp

        aqui un tutorial de como instarlo 
        link: https://www.mclibre.org/consultar/php/otros/xampp-instalacion-windows.html

2- al instalar el xampp buscamos la carpeta que contiene el xampp y buscamos la carpeta (htdocs) dentro de ella  descomprimimos con el proyecto.

------------------- CREAR LA BASE DE DATOS -------------------------

3- lo activamos donde dice apache y mysql nos vamos a la siguiente direccion para crear la base de datos (http://localhost/phpmyadmin/) una vez alli vamos al menu lateral donde dice tablas le damos a nueva, nos va a parecer una ventana de opciones y creamos una nueva base de datos con el nombre (db_condominio2)(nota: la base de datos puede tener el nombre que quiera, si le ponen un nombre diferente al que se dice en este documento ir al paso 3.2).

    3.1- al tener creada nuestra base de datos, le damos click a donde dice importar y le damos a seleccionar archivo, dentro de esta carpeta ya viene el archivo re recovery de la base de datos llamado (crearDB.sql), lo abrimos le damos a continuar y ya deberiamos tener nuestra base de datos ya creada.

    3.2- este paso es solo si le cambiaron el nombre a la base de datos, para que no nos de error al hacer una consulta, nos vamos a esta ubicacion dentro del archivo (app/modelo/conexion.php), abrimos el archivo y cambiamos el valor de la variable ($dbname) a el nombre que le hayamos puesto a nuestra base de datos. 

    nota: la base de datos ya viene con datos de prueba preinsertador.

4- una vez ya tengamos nuestra base de datos creada, escribimos esta direccion en el buscador (http://localhost/proyecto-final_mvc/app/vista), y ya estaremos en la pagina del proyecto.


------------------------------------------------------------
VERSION 1.0 PROYECTO CONDOMINIO  PROGRAMACION VI

NOTAS ACT: 28/4/2020

-aun no puede hacer consultar y relacionar a un propietario con las cuotas que debe. 
-falta la funcionalidad de editar o arreglar los datos del administrador y del usuario.
-falta niveles de seguridad aun esta vulnerable.
-falta implementar un sistema de confirmacion via correo/telefono celular.
-falta implementar un metodo de pago.




