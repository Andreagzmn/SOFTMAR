-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2016 a las 19:49:54
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `softmar`
--
CREATE DATABASE IF NOT EXISTS `softmar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `softmar`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buscar_estilo`
--

DROP TABLE IF EXISTS `buscar_estilo`;
CREATE TABLE `buscar_estilo` (
  `Cod_buscar` int(11) NOT NULL,
  `Cod_usu` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

DROP TABLE IF EXISTS `citas`;
CREATE TABLE `citas` (
  `Cod_cita` int(11) NOT NULL,
  `Cod_usu` int(11) NOT NULL,
  `Telefono` varchar(100) NOT NULL,
  `Hora` varchar(100) NOT NULL,
  `Fecha` varchar(100) NOT NULL,
  `Formato` varchar(2) NOT NULL,
  `Servicio` varchar(100) NOT NULL,
  `empleado` varchar(100) NOT NULL,
  `Cod_Emp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`Cod_cita`, `Cod_usu`, `Telefono`, `Hora`, `Fecha`, `Formato`, `Servicio`, `empleado`, `Cod_Emp`) VALUES
(15, 4, '3747703', '8:00 am', '8:00 am', 'di', 'corte', '1', 0),
(16, 4, '3747703', '8:00 am', '8:00 am', 'di', 'corte', '1', 0),
(17, 4, '377125', '8:30 am', '8:00 am', 'Oc', 'corte', '2', 0),
(18, 2, '5782588', '8:00 am', '8:00 am', 'Oc', 'corte', '1', 0),
(19, 4, '374703', '8:00 am', '8:00 am', 'oc', 'corte', '2', 0),
(20, 2, '4', '3747703', '8:00 am', '8:', 'ocupado', 'corte', 1),
(21, 2, '4', '3747703', '8:30 am', '9:', 'ocupado', 'corte', 1),
(22, 4, '3747703', '8:00 am', '8:00 am', 'oc', 'corte', '1', 2),
(23, 3, '2774581', '8:00 am', 'Martes, 26 Julio, 2016', 'oc', 'corte', '1', 2),
(24, 4, '2458961', '8:00 am', 'Jueves, 28 Julio, 2016', 'oc', 'corte', '1', 2),
(25, 4, '2', '8:30 am', 'Miercoles, 27 Julio, 2016', 'oc', 'corte', '1', 2),
(26, 2, '14554', '8:00 am', 'Martes, 26 Julio, 2016', 'oc', 'corte', '1', 2),
(27, 1, '258964', '8:00 am', 'Martes, 26 Julio, 2016', 'oc', 'corte', '2', 2),
(28, 4, '8755', '8:30 am', 'Martes, 26 Julio, 2016', 'oc', 'corte', '1', 2),
(29, 4, '1234567', '8:00 am', 'Lunes, 25 Julio, 2016', 'oc', 'corte', '1', 0),
(30, 4, '1214253', '8:00 am', 'Lunes, 25 Julio, 2016', 'oc', 'corte', '2', 2),
(31, 1, '14789', '8:00 am', 'Martes, 26 Julio, 2016', 'oc', 'corte', '1', 2),
(32, 1, '3216965', '8:00 am', 'Martes, 26 Julio, 2016', 'am', 'corte', '2', 2),
(33, 1, '365984', '8:00 am', 'Martes, 26 Julio, 2016', 'am', 'corte', '2', 2),
(34, 1, '789636', '8:00 am', 'Martes, 26 Julio, 2016', 'am', 'corte', '2', 2),
(35, 1, '1475869', '8:00 am', 'Martes, 26 Julio, 2016', 'am', 'corte', '2', 2),
(36, 1, '5489678', '8:00 am', 'Martes, 26 Julio, 2016', 'am', 'corte', '2', 2),
(37, 1, '2365987', '8:00 am', 'Martes, 26 Julio, 2016', 'am', 'corte', '2', 2),
(38, 4, '245786', '8:00 am', 'Viernes, 29 Julio, 2016', 'am', 'corte', '1', 2),
(39, 4, '2775896', '8:00 am', 'Miercoles, 27 Julio, 2016', 'am', 'corte', '2', 2),
(40, 3, '365894', '8:00 am', 'Domingo, 24 Julio, 2016', 'am', 'corte', '2', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `duenos`
--

DROP TABLE IF EXISTS `duenos`;
CREATE TABLE `duenos` (
  `Cod_due` int(11) NOT NULL,
  `Cod_Emp` int(11) NOT NULL,
  `Cod_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `duenos`
--

INSERT INTO `duenos` (`Cod_due`, `Cod_Emp`, `Cod_usu`) VALUES
(1, 2, 1),
(2, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE `empleado` (
  `Cod_empl` int(11) NOT NULL,
  `Cod_Emp` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Telefono` int(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Edad` int(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Cargo` varchar(100) NOT NULL,
  `Cedula` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`Cod_empl`, `Cod_Emp`, `Nombre`, `Apellido`, `Telefono`, `Direccion`, `Edad`, `Correo`, `Cargo`, `Cedula`) VALUES
(1, 2, 'Andrea ', 'Guzman', 3747703, 'cll 40 n 57-08', 18, 'andrea@hotmail.com', 'peluquero', 1036677760),
(2, 2, 'Cristian', 'Villada', 3747703, 'cll 10', 20, 'criss@hotmail.com', 'Barbero', 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `Cod_Emp` int(11) NOT NULL,
  `Cod_TipEmp` int(11) NOT NULL,
  `Nombre` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Telefono` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Direccion` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Ciudad` varchar(100) CHARACTER SET latin1 NOT NULL,
  `NIT` int(11) NOT NULL,
  `Correo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Geo_x` longtext CHARACTER SET latin1 NOT NULL,
  `Geo_y` longtext CHARACTER SET latin1 NOT NULL,
  `Informacion` blob NOT NULL,
  `Dias_aten` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Hor_desde` time NOT NULL,
  `Hor_hasta` time NOT NULL,
  `Galeria` longtext CHARACTER SET latin1 NOT NULL,
  `Logo` longtext CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`Cod_Emp`, `Cod_TipEmp`, `Nombre`, `Telefono`, `Direccion`, `Ciudad`, `NIT`, `Correo`, `Geo_x`, `Geo_y`, `Informacion`, `Dias_aten`, `Hor_desde`, `Hor_hasta`, `Galeria`, `Logo`) VALUES
(2, 4, 'Quince', '3747703', 'cll 40 n 57 - 08', '', 123654, 'quince15@hotmail.com', '6.173515986490716', '-75.61811059713364', 0x414d4d, 'L,M,Mi,J,V,S', '08:30:00', '08:30:00', 'cache_30150532.jpg, IMG_2314.jpg, kinzecuchilleros-barberia-madrid.jpg', 'logo1.png'),
(3, 3, 'Cambios positivos', '3654789', 'Crra 80', '', 856974, 'cambios@hotmail.com', '6.263727514446294', '-75.59635519981384', 0xda6e69636f73206520696e696775616c61626c657320, 'Lunes,Martes,Miercoles,Jueves,Viernes,Sabado', '09:30:00', '08:30:00', '252624--salon-de-belleza-y-peluqueria-jessica-vargas-banner.jpg, bg-5.jpg, tintes.jpg', '18076571-Sal-n-de-pelo-corte-de-pelo-dise-o-o-s-mbolo-peluquer-a-Foto-de-archivo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta_emp`
--

DROP TABLE IF EXISTS `oferta_emp`;
CREATE TABLE `oferta_emp` (
  `Cod_ofer` int(11) NOT NULL,
  `Cod_Emp` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Estado` varchar(100) NOT NULL,
  `Foto` longtext NOT NULL,
  `Categoria` varchar(100) NOT NULL,
  `Oferta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

DROP TABLE IF EXISTS `permiso`;
CREATE TABLE `permiso` (
  `codigo_permiso` int(11) NOT NULL,
  `nombre_permiso` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_rol`
--

DROP TABLE IF EXISTS `permiso_rol`;
CREATE TABLE `permiso_rol` (
  `cod_rol` int(11) NOT NULL,
  `codigo_permiso` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_emp`
--

DROP TABLE IF EXISTS `productos_emp`;
CREATE TABLE `productos_emp` (
  `Cod_prod` int(11) NOT NULL,
  `Cod_Emp` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Valor` int(11) NOT NULL,
  `Cant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuacion`
--

DROP TABLE IF EXISTS `puntuacion`;
CREATE TABLE `puntuacion` (
  `Cod_punt` int(11) NOT NULL,
  `Cod_usu` int(11) NOT NULL,
  `puntuacion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `cod_rol` int(11) NOT NULL,
  `cod_nombre` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`cod_rol`, `cod_nombre`) VALUES
(101, 'Cliente'),
(102, 'Usuario'),
(103, 'Administrados'),
(104, 'prueba'),
(105, 'pruba2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_emp`
--

DROP TABLE IF EXISTS `servicio_emp`;
CREATE TABLE `servicio_emp` (
  `Cod_serv` int(11) NOT NULL,
  `Cod_Emp` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Duracion` varchar(100) NOT NULL,
  `Precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio_emp`
--

INSERT INTO `servicio_emp` (`Cod_serv`, `Cod_Emp`, `Nombre`, `Duracion`, `Precio`) VALUES
(1, 2, 'corte', '30 min', 5000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio_emple`
--

DROP TABLE IF EXISTS `servicio_emple`;
CREATE TABLE `servicio_emple` (
  `Cod_serv` int(11) NOT NULL,
  `Cod_empl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_emp`
--

DROP TABLE IF EXISTS `tipo_emp`;
CREATE TABLE `tipo_emp` (
  `Cod_TipEmp` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_emp`
--

INSERT INTO `tipo_emp` (`Cod_TipEmp`, `Nombre`) VALUES
(3, 'Peluqueria'),
(4, 'Barberia'),
(5, 'Spa'),
(6, 'Peluqueria Infantil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tips_emp`
--

DROP TABLE IF EXISTS `tips_emp`;
CREATE TABLE `tips_emp` (
  `Cod_tips` int(11) NOT NULL,
  `Cod_Emp` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` varchar(100) NOT NULL,
  `Foto` longtext NOT NULL,
  `Video` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `Cod_usu` int(11) NOT NULL,
  `cod_rol` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Clave` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Foto` longtext NOT NULL,
  `Cedula` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Cod_usu`, `cod_rol`, `Nombre`, `Apellido`, `Direccion`, `Edad`, `Clave`, `Correo`, `Foto`, `Cedula`) VALUES
(1, 101, 'Andrea', 'Guzman', 'cll 40 n 57', 18, '123', 'andre@hotmail.com', '', '32101475'),
(2, 101, 'Valentina', 'Chica', 'Cll 35 n 74', 18, 'soyvalen', 'valen@chica.com', '', '10147584'),
(3, 102, 'Sledy Andrea', 'Orozco', 'Cll 20 n 10', 18, 'soy andrea', 'sledy@orozco.com', '', '45712360'),
(4, 103, 'Rodrigo', 'Mena', 'Cll 11 n 88', 21, 'soyrodri', 'Rodri@mena.com', '', '7894561'),
(5, 101, 'Andrea', 'Arias', 'call ', 18, 'asdfgh', 'andrea@guzman.com', '', '32101475'),
(6, 102, 'Rosmary', 'Arias', 'Santamaria', 15, '1234', 'labrava@hotmail.com', '', '32101475'),
(7, 102, 'Andrea', 'guzman', 'cll 45 n 15', 18, 'adsad', 'asdsd@sdfd.com', '', '103667756');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `buscar_estilo`
--
ALTER TABLE `buscar_estilo`
  ADD PRIMARY KEY (`Cod_buscar`),
  ADD KEY `Cod_usu` (`Cod_usu`);

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`Cod_cita`),
  ADD KEY `Cod_usu` (`Cod_usu`);

--
-- Indices de la tabla `duenos`
--
ALTER TABLE `duenos`
  ADD PRIMARY KEY (`Cod_due`),
  ADD KEY `Cod_Emp` (`Cod_Emp`),
  ADD KEY `Cod_usu` (`Cod_usu`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`Cod_empl`),
  ADD KEY `Cod_Emp` (`Cod_Emp`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`Cod_Emp`),
  ADD KEY `Cod_TipEmp` (`Cod_TipEmp`);

--
-- Indices de la tabla `oferta_emp`
--
ALTER TABLE `oferta_emp`
  ADD PRIMARY KEY (`Cod_ofer`),
  ADD KEY `Cod_Emp` (`Cod_Emp`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`codigo_permiso`);

--
-- Indices de la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD PRIMARY KEY (`cod_rol`,`codigo_permiso`),
  ADD KEY `codigo_permiso` (`codigo_permiso`);

--
-- Indices de la tabla `productos_emp`
--
ALTER TABLE `productos_emp`
  ADD PRIMARY KEY (`Cod_prod`),
  ADD KEY `Cod_Emp` (`Cod_Emp`);

--
-- Indices de la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
  ADD PRIMARY KEY (`Cod_punt`),
  ADD KEY `Cod_usu` (`Cod_usu`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`cod_rol`);

--
-- Indices de la tabla `servicio_emp`
--
ALTER TABLE `servicio_emp`
  ADD PRIMARY KEY (`Cod_serv`),
  ADD KEY `Cod_Emp` (`Cod_Emp`);

--
-- Indices de la tabla `servicio_emple`
--
ALTER TABLE `servicio_emple`
  ADD KEY `Cod_ser` (`Cod_serv`),
  ADD KEY `Cod_empl` (`Cod_empl`);

--
-- Indices de la tabla `tipo_emp`
--
ALTER TABLE `tipo_emp`
  ADD PRIMARY KEY (`Cod_TipEmp`);

--
-- Indices de la tabla `tips_emp`
--
ALTER TABLE `tips_emp`
  ADD PRIMARY KEY (`Cod_tips`),
  ADD KEY `Cod_Emp` (`Cod_Emp`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Cod_usu`),
  ADD KEY `cod_rol` (`cod_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `buscar_estilo`
--
ALTER TABLE `buscar_estilo`
  MODIFY `Cod_buscar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `Cod_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `duenos`
--
ALTER TABLE `duenos`
  MODIFY `Cod_due` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `Cod_empl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `Cod_Emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `oferta_emp`
--
ALTER TABLE `oferta_emp`
  MODIFY `Cod_ofer` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos_emp`
--
ALTER TABLE `productos_emp`
  MODIFY `Cod_prod` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
  MODIFY `Cod_punt` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `servicio_emp`
--
ALTER TABLE `servicio_emp`
  MODIFY `Cod_serv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipo_emp`
--
ALTER TABLE `tipo_emp`
  MODIFY `Cod_TipEmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tips_emp`
--
ALTER TABLE `tips_emp`
  MODIFY `Cod_tips` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Cod_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `buscar_estilo`
--
ALTER TABLE `buscar_estilo`
  ADD CONSTRAINT `buscar_estilo_ibfk_1` FOREIGN KEY (`Cod_usu`) REFERENCES `usuario` (`Cod_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`Cod_usu`) REFERENCES `usuario` (`Cod_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `duenos`
--
ALTER TABLE `duenos`
  ADD CONSTRAINT `duenos_ibfk_1` FOREIGN KEY (`Cod_Emp`) REFERENCES `empresa` (`Cod_Emp`) ON UPDATE CASCADE,
  ADD CONSTRAINT `duenos_ibfk_2` FOREIGN KEY (`Cod_usu`) REFERENCES `usuario` (`Cod_usu`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`Cod_Emp`) REFERENCES `empresa` (`Cod_Emp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`Cod_TipEmp`) REFERENCES `tipo_emp` (`Cod_TipEmp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `oferta_emp`
--
ALTER TABLE `oferta_emp`
  ADD CONSTRAINT `oferta_emp_ibfk_1` FOREIGN KEY (`Cod_Emp`) REFERENCES `empresa` (`Cod_Emp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD CONSTRAINT `permiso_rol_ibfk_1` FOREIGN KEY (`codigo_permiso`) REFERENCES `permiso` (`codigo_permiso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permiso_rol_ibfk_2` FOREIGN KEY (`cod_rol`) REFERENCES `rol` (`cod_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos_emp`
--
ALTER TABLE `productos_emp`
  ADD CONSTRAINT `productos_emp_ibfk_1` FOREIGN KEY (`Cod_Emp`) REFERENCES `empresa` (`Cod_Emp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
  ADD CONSTRAINT `puntuacion_ibfk_1` FOREIGN KEY (`Cod_usu`) REFERENCES `usuario` (`Cod_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio_emp`
--
ALTER TABLE `servicio_emp`
  ADD CONSTRAINT `servicio_emp_ibfk_1` FOREIGN KEY (`Cod_Emp`) REFERENCES `empresa` (`Cod_Emp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicio_emple`
--
ALTER TABLE `servicio_emple`
  ADD CONSTRAINT `servicio_emple_ibfk_1` FOREIGN KEY (`Cod_empl`) REFERENCES `empleado` (`Cod_empl`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servicio_emple_ibfk_2` FOREIGN KEY (`Cod_serv`) REFERENCES `servicio_emp` (`Cod_serv`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tips_emp`
--
ALTER TABLE `tips_emp`
  ADD CONSTRAINT `tips_emp_ibfk_1` FOREIGN KEY (`Cod_Emp`) REFERENCES `empresa` (`Cod_Emp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`cod_rol`) REFERENCES `rol` (`cod_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
