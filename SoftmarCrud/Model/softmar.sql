-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2016 a las 18:56:05
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
  `Cod_Emp` int(11) NOT NULL,
  `Cod_usu` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Apellido` varchar(100) NOT NULL,
  `Telefono` varchar(100) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Hora` date NOT NULL,
  `Fecha` date NOT NULL,
  `Estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

DROP TABLE IF EXISTS `empresa`;
CREATE TABLE `empresa` (
  `Cod_Emp` int(11) NOT NULL,
  `Cod_TipEmp` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Telefono` varchar(100) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Ciudad` varchar(100) NOT NULL,
  `NIT` int(11) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Geo_x` longtext NOT NULL,
  `Geo_y` longtext NOT NULL,
  `Informacion` blob NOT NULL,
  `Dias_aten` varchar(100) NOT NULL,
  `Hor_desde` time NOT NULL,
  `Hor_hasta` time NOT NULL,
  `Galeria` longtext NOT NULL,
  `Logo` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `Descripcion` varchar(100) NOT NULL,
  `Valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 101, 'Andrea', 'Guzman', 'cll 40 n 57', 18, 'asdfghjklñ', 'andre@hotmail.com', '', '32101475'),
(2, 101, 'Valentina', 'Chica', 'Cll 35 n 74', 18, 'soyvalen', 'valen@chica.com', '', '10147584'),
(3, 102, 'Sledy Andrea', 'Orozco', 'Cll 20 n 10', 18, 'soy andrea', 'sledy@orozco.com', '', '45712360'),
(4, 103, 'Rodrigo', 'Mena', 'Cll 11 n 88', 21, 'soyrodri', 'Rodri@mena.com', '', '7894561'),
(5, 101, 'Andrea', 'Arias', 'call ', 18, 'asdfgh', 'andrea@guzman.com', '', '32101475');

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
  MODIFY `Cod_cita` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `Cod_empl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `Cod_Emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `Cod_serv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `Cod_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
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
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`Cod_Emp`) REFERENCES `empresa` (`Cod_Emp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `citas_ibfk_2` FOREIGN KEY (`Cod_usu`) REFERENCES `usuario` (`Cod_usu`) ON DELETE CASCADE ON UPDATE CASCADE;

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
