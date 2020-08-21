
--  script para la creacion de la base de datos TEMPORARY
--  PROYECTO BASE DE DATOS 3 
--  JOSE PIEDRA , JOSE VILLA, LUIS GARAVITO
--  04/08/2020 

-- SECCION DE TABLAS PRINCIPALES

--ESTA ES LA TABLA PRINCIPAL DE AQUI SE DERIVAN 

CREATE TABLE Atletas(
    cedula_atleta int  PRIMARY KEY,
    nacionalidad    char,
    fecha_nacimiento    varchar(10),
    nombres     varchar(10),
    apellido_materno varchar(10),
    apellido_paterno    varchar(10),
    apodo   varchar(10),
    cod_pais    int,
    lugar_nacimiento    varchar(250),
    telefono    varchar(23),
    dir_habitacion  varchar(250),
    estado_civil    varchar(40),
    activo_inactivo char(2),
    observacion varchar(250)
);

CREATE TABLE Trabajos_realizados(
    cod_trabajo int,
    cedula_atleta int(8),
    desc_trabajo   varchar(250)
);

CREATE TABLE Ni
