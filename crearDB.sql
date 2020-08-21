-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2020 a las 19:29:43
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_condominio2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_admin` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `cedula` int(11) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contra` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `nombre`, `apellido`, `cedula`, `correo`, `contra`) VALUES
(1, 'jose', 'piedra', 12546325, 'admin00@admin.com', '123456'),
(3, 'pedro', 'juan', 1234345, 'admin01@admin.com', '123456'),
(4, 'a', 'ada', 1232, 'a', 'q23r1'),
(5, '', '', 0, '', ''),
(6, '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condominio`
--

CREATE TABLE `condominio` (
  `id_condominio` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ubicacion` text NOT NULL,
  `codigo_postal` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `condominio`
--

INSERT INTO `condominio` (`id_condominio`, `id_admin`, `nombre`, `ubicacion`, `codigo_postal`) VALUES
(1, 1, 'piedra country ', 'tu casa al lado de la mia ', 1052),
(3, 3, 'juan country', 'al lado dde la otra casa', 1212);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas`
--

CREATE TABLE `cuotas` (
  `id_cuota` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `fecha_emision` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `monto` float NOT NULL,
  `descripcion` text NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuotas`
--

INSERT INTO `cuotas` (`id_cuota`, `id_admin`, `fecha_emision`, `fecha_vencimiento`, `monto`, `descripcion`, `estado`) VALUES
(1, 1, '2020-04-01', '2020-05-01', 1052110, 'luz \r\nagua \r\n', 0),
(4, 1, '2020-04-01', '2020-05-01', 1052110, 'luz \r\nagua \r\n', 0),
(6, 1, '2020-04-03', '2020-04-04', 2, 'hhhh', 0),
(7, 1, '2020-04-18', '2020-04-10', 12333, '122212212212ddadsada', 0),
(8, 1, '2020-04-18', '2020-04-10', 12333, '122212212212ddadsada', 0),
(9, 1, '2020-04-03', '2020-04-24', 112323, 'ddddddd', 0),
(10, 1, '2020-04-04', '2020-04-09', 1233460, 'aaaa', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intermedia`
--

CREATE TABLE `intermedia` (
  `id_cuota` int(11) NOT NULL,
  `id_propietario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `intermedia`
--

INSERT INTO `intermedia` (`id_cuota`, `id_propietario`) VALUES
(7, 1),
(8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `id_propietario` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_condominio` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `cedula` int(12) NOT NULL,
  `tlfno_casa` int(20) NOT NULL,
  `nro_apto` varchar(8) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`id_propietario`, `id_user`, `id_condominio`, `nombre`, `apellido`, `cedula`, `tlfno_casa`, `nro_apto`, `estado`) VALUES
(1, 1, 1, 'jose ', 'piedra ', 0, 0, '123', 1),
(3, 5, 1, 'juan', 'castillo', 0, 0, '123', 1),
(7, 8, 3, 'pablo', 'pedro', 0, 0, '123', 2),
(11, 1, 3, '1', '1', 1, 122, '12', 1),
(24, 4, 1, 'piedra', 'paula', 2781625, 234, '12', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `usuario`, `correo`, `contra`) VALUES
(1, 'jose', 'usuario1@usuario.com', '12345'),
(4, 'paula', 'user2@user.com', '123456'),
(5, 'juan', 'user3@user-com', '132345'),
(8, 'pablo', 'user4@user.com', '1234'),
(9, 'jose', 'qwq', 'qqqqq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indices de la tabla `condominio`
--
ALTER TABLE `condominio`
  ADD PRIMARY KEY (`id_condominio`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indices de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD PRIMARY KEY (`id_cuota`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indices de la tabla `intermedia`
--
ALTER TABLE `intermedia`
  ADD KEY `id_cuota` (`id_cuota`),
  ADD KEY `id_propietario` (`id_propietario`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`id_propietario`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_condominio` (`id_condominio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `condominio`
--
ALTER TABLE `condominio`
  MODIFY `id_condominio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  MODIFY `id_cuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `id_propietario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `condominio`
--
ALTER TABLE `condominio`
  ADD CONSTRAINT `condominio_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `administrador` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD CONSTRAINT `cuotas_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `administrador` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `intermedia`
--
ALTER TABLE `intermedia`
  ADD CONSTRAINT `intermedia_ibfk_1` FOREIGN KEY (`id_cuota`) REFERENCES `cuotas` (`id_cuota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `intermedia_ibfk_2` FOREIGN KEY (`id_propietario`) REFERENCES `propietario` (`id_propietario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD CONSTRAINT `propietario_ibfk_1` FOREIGN KEY (`id_condominio`) REFERENCES `condominio` (`id_condominio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `propietario_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
