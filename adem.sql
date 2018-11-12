-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2018 a las 21:54:43
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `adem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `confirmacion`
--

CREATE TABLE `confirmacion` (
  `id` int(11) NOT NULL,
  `llave` varchar(45) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo_vp` int(11) NOT NULL,
  `estado_vp` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `confirmacion`
--

INSERT INTO `confirmacion` (`id`, `llave`, `fecha`, `tipo_vp`, `estado_vp`, `usuario_id`) VALUES
(5, '9a9de195dffd5c421d4c7ae7bcb9d3c3', '2018-10-30 21:49:50', 3, 8, 4);

--
-- Disparadores `confirmacion`
--
DELIMITER $$
CREATE TRIGGER `confirmación_AFTER_DELETE` AFTER DELETE ON `confirmacion` FOR EACH ROW BEGIN
    INSERT INTO `log` (`nombreTabla`,`accion`,`fecha`,`id_usuario`) 
    VALUES ('confirmación', 'delete', now(), current_user());
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `confirmación_AFTER_INSERT` AFTER INSERT ON `confirmacion` FOR EACH ROW BEGIN
    INSERT INTO `log` (`nombreTabla`,`accion`,`fecha`,`id_usuario`) 
    VALUES ('confirmación', 'insert', now(), current_user());
	END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `id` int(11) NOT NULL,
  `dispositivos_id` int(11) NOT NULL,
  `vatios` double NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado_vp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Disparadores `datos`
--
DELIMITER $$
CREATE TRIGGER `datos_AFTER_DELETE` AFTER DELETE ON `datos` FOR EACH ROW BEGIN
    INSERT INTO `log` (`nombreTabla`,`accion`,`fecha`,`id_usuario`) 
    VALUES ('datos', 'delete', now(), current_user());
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `datos_AFTER_INSERT` AFTER INSERT ON `datos` FOR EACH ROW BEGIN
    INSERT INTO `log` (`nombreTabla`,`accion`,`fecha`,`id_usuario`) 
    VALUES ('datos', 'insert', now(), current_user());
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivos`
--

CREATE TABLE `dispositivos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `serial` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `estado_vp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `dispositivos`
--

INSERT INTO `dispositivos` (`id`, `usuario_id`, `serial`, `nombre`, `descripcion`, `estado_vp`) VALUES
(1, 4, '1234', 'Sala', 'LA SALA', 7);

--
-- Disparadores `dispositivos`
--
DELIMITER $$
CREATE TRIGGER `dispositivos_AFTER_DELETE` AFTER DELETE ON `dispositivos` FOR EACH ROW BEGIN
    INSERT INTO `log` (`nombreTabla`,`accion`,`fecha`,`id_usuario`) 
    VALUES ('dispositivos', 'delete', now(), current_user());
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `dispositivos_AFTER_INSERT` AFTER INSERT ON `dispositivos` FOR EACH ROW BEGIN
    INSERT INTO `log` (`nombreTabla`,`accion`,`fecha`,`id_usuario`) 
    VALUES ('dispositivos', 'insert', now(), current_user());
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `nombreTabla` varchar(45) NOT NULL,
  `accion` varchar(45) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`id`, `nombreTabla`, `accion`, `fecha`, `id_usuario`) VALUES
(1, 'parametro', 'insert', '2018-10-30 14:31:02', 0),
(2, 'valor_parámetro', 'insert', '2018-10-30 14:31:39', 0),
(3, 'valor_parámetro', 'insert', '2018-10-30 14:32:25', 0),
(4, 'parametro', 'insert', '2018-10-30 14:40:36', 0),
(5, 'valor_parámetro', 'insert', '2018-10-30 14:41:30', 0),
(6, 'valor_parámetro', 'insert', '2018-10-30 14:41:30', 0),
(7, 'parametro', 'insert', '2018-10-30 14:42:47', 0),
(8, 'valor_parámetro', 'insert', '2018-10-30 14:43:17', 0),
(9, 'valor_parámetro', 'insert', '2018-10-30 14:43:17', 0),
(10, 'usuario', 'insert', '2018-10-30 14:50:03', 0),
(11, 'confirmación', 'insert', '2018-10-30 14:50:04', 0),
(12, 'confirmación', 'delete', '2018-10-30 15:12:13', 0),
(13, 'usuario', 'delete', '2018-10-30 15:12:18', 0),
(14, 'usuario', 'insert', '2018-10-30 15:12:52', 0),
(15, 'confirmación', 'insert', '2018-10-30 15:12:53', 0),
(16, 'confirmación', 'insert', '2018-10-30 15:36:15', 0),
(17, 'confirmación', 'insert', '2018-10-30 15:41:13', 0),
(18, 'confirmación', 'delete', '2018-10-30 15:46:44', 0),
(19, 'confirmación', 'delete', '2018-10-30 15:46:46', 0),
(20, 'confirmación', 'delete', '2018-10-30 15:46:47', 0),
(21, 'usuario', 'insert', '2018-10-30 15:47:39', 0),
(22, 'usuario', 'delete', '2018-10-30 15:47:51', 0),
(23, 'usuario', 'delete', '2018-10-30 15:47:53', 0),
(24, 'usuario', 'insert', '2018-10-30 15:49:50', 0),
(25, 'confirmación', 'insert', '2018-10-30 15:49:50', 0),
(26, 'dispositivos', 'insert', '2018-10-30 15:52:13', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE `parametro` (
  `id` int(11) NOT NULL,
  `parametro` varchar(100) NOT NULL,
  `detalle` varchar(200) DEFAULT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `parametro`
--

INSERT INTO `parametro` (`id`, `parametro`, `detalle`, `estado`) VALUES
(1, 'tipo_usuario', NULL, 1),
(2, 'tipo_confirmacion', 'Identifica si la confirmación se trata de un registro o de una recuperación de contraseña', 1),
(3, 'estado', NULL, 1);

--
-- Disparadores `parametro`
--
DELIMITER $$
CREATE TRIGGER `parametro_AFTER_DELETE` AFTER DELETE ON `parametro` FOR EACH ROW BEGIN
    INSERT INTO `log` (`nombreTabla`,`accion`,`fecha`,`id_usuario`) 
    VALUES ('parametro', 'delete', now(), current_user());
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `parametro_AFTER_INSERT` AFTER INSERT ON `parametro` FOR EACH ROW BEGIN
    INSERT INTO `log` (`nombreTabla`,`accion`,`fecha`,`id_usuario`) 
    VALUES ('parametro', 'insert', now(), current_user());
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `tipo_vp` int(11) NOT NULL,
  `estado_vp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `username`, `password`, `nombre`, `apellidos`, `tipo_vp`, `estado_vp`) VALUES
(4, 'jdgiraldo218@gmail.com', 'jgiraldo6', 'b694f906a740ea28de8aca4003cc7e7e', 'Juan', 'Giraldo Mercado', 2, 7);

--
-- Disparadores `usuario`
--
DELIMITER $$
CREATE TRIGGER `usuario_AFTER_DELETE` AFTER DELETE ON `usuario` FOR EACH ROW BEGIN
    INSERT INTO `log` (`nombreTabla`,`accion`,`fecha`,`id_usuario`) 
    VALUES ('usuario', 'delete', now(), current_user());
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `usuario_AFTER_INSERT` AFTER INSERT ON `usuario` FOR EACH ROW BEGIN
    INSERT INTO `log` (`nombreTabla`,`accion`,`fecha`,`id_usuario`) 
    VALUES ('usuario', 'insert', now(), current_user());
	END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valor_parametro`
--

CREATE TABLE `valor_parametro` (
  `id` int(11) NOT NULL,
  `valor` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `parametro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `valor_parametro`
--

INSERT INTO `valor_parametro` (`id`, `valor`, `estado`, `parametro_id`) VALUES
(1, 'admin', '1', 1),
(2, 'cliente', '1', 1),
(3, 'registro', '1', 2),
(4, 'recuperar_contraseña', '1', 2),
(7, 'activo', '1', 3),
(8, 'inactivo', '1', 3);

--
-- Disparadores `valor_parametro`
--
DELIMITER $$
CREATE TRIGGER `valor_parámetro_AFTER_DELETE` AFTER DELETE ON `valor_parametro` FOR EACH ROW BEGIN
    INSERT INTO `log` (`nombreTabla`,`accion`,`fecha`,`id_usuario`) 
    VALUES ('valor_parámetro', 'delete', now(), current_user());
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `valor_parámetro_AFTER_INSERT` AFTER INSERT ON `valor_parametro` FOR EACH ROW BEGIN    
    INSERT INTO `log` (`nombreTabla`,`accion`,`fecha`,`id_usuario`) 
    VALUES ('valor_parámetro', 'insert', now(), current_user());
    END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `confirmacion`
--
ALTER TABLE `confirmacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`llave`,`fecha`,`tipo_vp`,`estado_vp`,`usuario_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`dispositivos_id`,`vatios`,`fecha`,`estado_vp`);

--
-- Indices de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`usuario_id`,`serial`,`nombre`,`descripcion`(255),`estado_vp`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`nombreTabla`,`accion`,`fecha`,`id_usuario`);

--
-- Indices de la tabla `parametro`
--
ALTER TABLE `parametro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`parametro`,`estado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`email`,`username`,`password`,`nombre`,`apellidos`,`tipo_vp`,`estado_vp`);

--
-- Indices de la tabla `valor_parametro`
--
ALTER TABLE `valor_parametro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`,`valor`,`estado`,`parametro_id`),
  ADD KEY `parametro_id` (`parametro_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `confirmacion`
--
ALTER TABLE `confirmacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `datos`
--
ALTER TABLE `datos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `parametro`
--
ALTER TABLE `parametro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `valor_parametro`
--
ALTER TABLE `valor_parametro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `confirmacion`
--
ALTER TABLE `confirmacion`
  ADD CONSTRAINT `confirmación_idfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `datos`
--
ALTER TABLE `datos`
  ADD CONSTRAINT `datos_idfk_1` FOREIGN KEY (`id`) REFERENCES `dispositivos` (`id`);

--
-- Filtros para la tabla `dispositivos`
--
ALTER TABLE `dispositivos`
  ADD CONSTRAINT `dispositivos_idfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `valor_parametro`
--
ALTER TABLE `valor_parametro`
  ADD CONSTRAINT `valor_parámetro_idfk_1` FOREIGN KEY (`parametro_id`) REFERENCES `parametro` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
