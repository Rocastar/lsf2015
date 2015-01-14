-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2015 a las 21:10:12
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `laboratorio_analisis_clinico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componente_analisis`
--

CREATE TABLE IF NOT EXISTS `componente_analisis` (
`cod_componente` int(11) NOT NULL,
  `cod_tipo` int(11) NOT NULL,
  `nombre_componente` varchar(50) NOT NULL,
  `precio` double NOT NULL,
  `descripcion_componente` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `componente_analisis`
--

INSERT INTO `componente_analisis` (`cod_componente`, `cod_tipo`, `nombre_componente`, `precio`, `descripcion_componente`) VALUES
(1, 2, 'Hemograma', 50, ''),
(2, 2, 'Hematocrito', 0, ''),
(3, 2, 'Hemoglobina', 80, ''),
(5, 12, 'Willy', 100, 'Medina'),
(6, 13, 'Tipos', 200, 'Tipos'),
(7, 8, 'componete Test embarazo', 20, 'esto es todo amigos de embarazo'),
(8, 8, 'componete Test embarazo', 2000, 'esto es todo amigos de embarazo'),
(9, 27, 'loas compopnente', 1000, 'des lok'),
(10, 27, 'fggfgfg', 320, '50'),
(11, 1, '', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE IF NOT EXISTS `cotizacion` (
`cod_cotizacion` int(11) NOT NULL,
  `cod_componente` int(11) NOT NULL,
  `monto_tipo_analisis` double NOT NULL,
  `CI_paciente` int(11) NOT NULL,
  `monto_total_cotizacion` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elementos_analisis`
--

CREATE TABLE IF NOT EXISTS `elementos_analisis` (
`cod_elemento` int(11) NOT NULL,
  `cod_componente` int(11) NOT NULL,
  `nombre_elemento` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `elementos_analisis`
--

INSERT INTO `elementos_analisis` (`cod_elemento`, `cod_componente`, `nombre_elemento`) VALUES
(1, 5, 'nombre elemento'),
(2, 5, 'nombre elemento'),
(3, 8, 'embarazo'),
(5, 5, 'nombre elemento'),
(6, 3, 'nombre elemento'),
(7, 2, 'nombre elemento'),
(8, 1, 'embarazo'),
(9, 9, 'nombre elemento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio_sistema`
--

CREATE TABLE IF NOT EXISTS `inicio_sistema` (
`Id` int(11) NOT NULL,
  `Perfil` varchar(50) DEFAULT NULL,
  `Usuario` varchar(50) DEFAULT NULL,
  `Contrasena` varchar(50) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `inicio_sistema`
--

INSERT INTO `inicio_sistema` (`Id`, `Perfil`, `Usuario`, `Contrasena`, `Email`) VALUES
(1, 'Administrador', 'administrador', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'info@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE IF NOT EXISTS `paciente` (
  `CI_paciente` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcion_muestras`
--

CREATE TABLE IF NOT EXISTS `recepcion_muestras` (
`cod_muestra` int(11) NOT NULL,
  `CI_paciente` int(11) NOT NULL,
  `tipo_muestra` varchar(50) NOT NULL,
  `hora_fecha` datetime NOT NULL,
  `observaciones` varchar(50) NOT NULL,
  `medico` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados_analisis`
--

CREATE TABLE IF NOT EXISTS `resultados_analisis` (
`cod_resultado` int(11) NOT NULL,
  `CI_paciente` int(11) NOT NULL,
  `cod_muestra` int(11) NOT NULL,
  `cod_cotizacion` int(11) NOT NULL,
  `resultados` varchar(50) NOT NULL,
  `observaciones` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_analisis`
--

CREATE TABLE IF NOT EXISTS `tipo_analisis` (
`cod_tipo` int(11) NOT NULL,
  `nombre_tipo` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `tipo_analisis`
--

INSERT INTO `tipo_analisis` (`cod_tipo`, `nombre_tipo`, `descripcion`) VALUES
(1, 'hug', 'lokas'),
(2, 'Hematologia', 'hematologia humana'),
(3, 'Parasitologia', 'asdfasdf asdf asdf'),
(5, 'Quimica Sanguinea', 'quimica sanguineasssss'),
(6, 'Microbiologia', 'micro'),
(7, 'Electrolitos', 'electrolitos'),
(8, 'Prueba de embarazo', 'Prueba de embarazo'),
(9, 'Inmulogia', 'Inmulogia'),
(10, 'Hormonas', 'Hrmonas'),
(11, 'Liquidos Organicos', 'Liquidos Organicos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valores_referencia`
--

CREATE TABLE IF NOT EXISTS `valores_referencia` (
  `cod_elemento` int(11) NOT NULL,
  `tipo_valor` varchar(50) NOT NULL,
  `rango` varchar(50) NOT NULL,
  `unidad_rango` varchar(50) NOT NULL,
  `muestra_analisis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `valores_referencia`
--

INSERT INTO `valores_referencia` (`cod_elemento`, `tipo_valor`, `rango`, `unidad_rango`, `muestra_analisis`) VALUES
(1, 'tipo valor', '', 'lt', 'Sangre'),
(1, 'embaraco', '', 'lt', 'Sangre'),
(0, 'tipo valor', '', 'lt', 'Sangre'),
(0, 'tipo valor', '', 'cc 3', 'Sangre'),
(7, 'tipo valor', '', 'cc 3', 'Eses'),
(8, 'tipo valor', '', 'mm 3', 'Sangre'),
(9, '45454545', '', 'cc 3', 'Sangre');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `componente_analisis`
--
ALTER TABLE `componente_analisis`
 ADD PRIMARY KEY (`cod_componente`);

--
-- Indices de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
 ADD PRIMARY KEY (`cod_cotizacion`);

--
-- Indices de la tabla `elementos_analisis`
--
ALTER TABLE `elementos_analisis`
 ADD PRIMARY KEY (`cod_elemento`);

--
-- Indices de la tabla `inicio_sistema`
--
ALTER TABLE `inicio_sistema`
 ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
 ADD PRIMARY KEY (`CI_paciente`);

--
-- Indices de la tabla `recepcion_muestras`
--
ALTER TABLE `recepcion_muestras`
 ADD PRIMARY KEY (`cod_muestra`);

--
-- Indices de la tabla `resultados_analisis`
--
ALTER TABLE `resultados_analisis`
 ADD PRIMARY KEY (`cod_resultado`);

--
-- Indices de la tabla `tipo_analisis`
--
ALTER TABLE `tipo_analisis`
 ADD PRIMARY KEY (`cod_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `componente_analisis`
--
ALTER TABLE `componente_analisis`
MODIFY `cod_componente` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
MODIFY `cod_cotizacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `elementos_analisis`
--
ALTER TABLE `elementos_analisis`
MODIFY `cod_elemento` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `inicio_sistema`
--
ALTER TABLE `inicio_sistema`
MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `recepcion_muestras`
--
ALTER TABLE `recepcion_muestras`
MODIFY `cod_muestra` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `resultados_analisis`
--
ALTER TABLE `resultados_analisis`
MODIFY `cod_resultado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_analisis`
--
ALTER TABLE `tipo_analisis`
MODIFY `cod_tipo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `componente_analisis`
--
ALTER TABLE `componente_analisis`
ADD CONSTRAINT `componente_analisis_ibfk_1` FOREIGN KEY (`cod_componente`) REFERENCES `tipo_analisis` (`cod_tipo`);

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
ADD CONSTRAINT `cotizacion_ibfk_1` FOREIGN KEY (`cod_cotizacion`) REFERENCES `componente_analisis` (`cod_componente`);

--
-- Filtros para la tabla `elementos_analisis`
--
ALTER TABLE `elementos_analisis`
ADD CONSTRAINT `elementos_analisis_ibfk_1` FOREIGN KEY (`cod_elemento`) REFERENCES `componente_analisis` (`cod_componente`);

--
-- Filtros para la tabla `recepcion_muestras`
--
ALTER TABLE `recepcion_muestras`
ADD CONSTRAINT `recepcion_muestras_ibfk_1` FOREIGN KEY (`cod_muestra`) REFERENCES `paciente` (`CI_paciente`);

--
-- Filtros para la tabla `resultados_analisis`
--
ALTER TABLE `resultados_analisis`
ADD CONSTRAINT `resultados_analisis_ibfk_1` FOREIGN KEY (`cod_resultado`) REFERENCES `paciente` (`CI_paciente`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
