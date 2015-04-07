-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 17-07-2012 a las 05:03:10
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `lafimo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brigada`
--

CREATE TABLE IF NOT EXISTS `brigada` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Control',
  `no_brigada` bigint(3) NOT NULL COMMENT 'Numero de brigada',
  `no_empleado` bigint(7) NOT NULL COMMENT 'Numero de empleado',
  `hora_clase` int(5) NOT NULL COMMENT '1.-M1-M2, 2.-M3-M4, etc',
  `hora_inicio` time NOT NULL COMMENT 'Hora de inicio',
  `hora_fin` time NOT NULL COMMENT 'Hora de fin',
  `disponibilidad` int(2) NOT NULL COMMENT ' 0.-No disponible 1.- Disponible',
  `disp_mae` int(2) DEFAULT NULL COMMENT '0.-NO Disponible 1.-DISPONIBLE',
  `mensaje` varchar(100) DEFAULT NULL COMMENT 'Mensaje breve que puede ser compartido',
  `plan` int(5) NOT NULL COMMENT 'Plan de estudios',
  PRIMARY KEY (`id`),
  UNIQUE KEY `no_brigada` (`no_brigada`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Tabla de brigadas' AUTO_INCREMENT=54 ;

--
-- Volcado de datos para la tabla `brigada`
--

INSERT INTO `brigada` (`id`, `no_brigada`, `no_empleado`, `hora_clase`, `hora_inicio`, `hora_fin`, `disponibilidad`, `disp_mae`, `mensaje`, `plan`) VALUES
(30, 500, 54321, 5, '07:00:00', '08:40:00', 1, 1, 'Apertura automatica -Fecha de inicio', 103),
(28, 101, 15433, 9, '08:40:00', '10:20:00', 1, 1, 'Apertura automatica -Hay cupos disponibles !!', 401),
(36, 202, 1364, 8, '08:40:00', '10:20:00', 1, 1, 'Apertura automatica -Fecha de inicio', 401),
(38, 700, 1364, 4, '07:00:00', '08:40:00', 1, 1, 'Apertura automatica -Fecha de inicio', 103),
(48, 657, 18923, 1, '07:00:00', '08:40:00', 1, 1, 'Apertura automatica -Fecha de inicio', 103),
(42, 234, 15433, 3, '07:00:00', '08:40:00', 1, 1, 'Apertura automatica -Hay cupos disponibles !!', 103),
(49, 92, 1364, 27, '13:40:00', '15:20:00', 1, 1, 'Apertura automatica -Fecha de inicio', 103),
(50, 3, 18923, 38, '17:00:00', '18:20:00', 1, 1, 'Apertura automatica -Fecha de inicio', 103),
(51, 98, 15433, 54, '19:40:00', '21:40:00', 1, 1, 'Apertura automatica -Fecha de inicio', 103),
(52, 567, 18923, 32, '15:20:00', '17:00:00', 1, 1, 'Apertura automatica -Fecha de inicio', 103),
(53, 543, 15433, 38, '17:00:00', '18:20:00', 1, 1, 'Apertura automatica -Fecha de inicio', 103);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Simple control',
  `matricula` bigint(7) NOT NULL COMMENT 'matricula de estudiante',
  `grupo` bigint(3) NOT NULL COMMENT 'grupo de origen',
  `nombre` varchar(50) NOT NULL COMMENT 'nombre del estudiante',
  `mensaje` varchar(100) DEFAULT NULL COMMENT 'breve mensaje que se puede compartir',
  `pas_e` int(7) NOT NULL COMMENT 'password de acceso',
  `plan` int(5) DEFAULT NULL COMMENT 'Plan de estudios',
  `medio_c` float DEFAULT NULL COMMENT 'Medio curso',
  `ord` float DEFAULT NULL COMMENT 'ordinario',
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula` (`matricula`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='tabla de estudiantes' AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `matricula`, `grupo`, `nombre`, `mensaje`, `pas_e`, `plan`, `medio_c`, `ord`) VALUES
(1, 12345, 101, 'Erik Daniel Villegas Sanchez', 'Mensaje de prueba', 1234, 401, 80, 90),
(9, 19876, 101, 'Erik xD', 'x', 101, 401, 100, 100),
(5, 11111, 202, 'Miguel Eduardo Villegas Sanche', 'Mensaje de prueba', 202, 401, 75, 80),
(6, 1429363, 700, 'Prueba', 'Prueba', 700, 401, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_pra`
--

CREATE TABLE IF NOT EXISTS `grupo_pra` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Simple control',
  `no_gpractica` int(10) NOT NULL COMMENT 'Numero de la practica',
  `no_gbrigada` int(4) NOT NULL COMMENT 'Numero de brigada',
  `gmatricula` int(10) NOT NULL COMMENT 'Matricula',
  `asistencia` int(2) DEFAULT NULL COMMENT '1-Falta 2-Asistencia 3-Retardo',
  `cubierto` int(2) DEFAULT NULL COMMENT '0.- No cubierta 1.- Cubierta 2.-Inscrito',
  `msj` varchar(100) DEFAULT NULL COMMENT 'Mensaje',
  `mesa` int(9) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `grupo_pra`
--

INSERT INTO `grupo_pra` (`id`, `no_gpractica`, `no_gbrigada`, `gmatricula`, `asistencia`, `cubierto`, `msj`, `mesa`) VALUES
(1, 1, 101, 19876, NULL, NULL, 'Bueno', 1),
(2, 2, 101, 12345, 1, 1, 'Mal estudiante', 1),
(3, 3, 234, 12345, 1, 1, NULL, 1),
(7, 4, 101, 12345, 1, 1, NULL, 1),
(8, 5, 101, 12345, 1, 1, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(9) NOT NULL AUTO_INCREMENT COMMENT 'Id para control',
  `usuario` int(10) NOT NULL COMMENT 'Usuario',
  `ip` varchar(15) NOT NULL COMMENT 'Ip del usuario',
  `historial` varchar(100) NOT NULL COMMENT 'Paginas visitadas',
  `fecha` datetime NOT NULL COMMENT 'Fecha de la consulta',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Log del sistema' AUTO_INCREMENT=329 ;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`id`, `usuario`, `ip`, `historial`, `fecha`) VALUES
(1, 18923, '127.0.0.1', '/lafimo/controlador/ver_log.php', '2012-07-10 17:26:41'),
(2, 18923, '127.0.0.1', '/lafimo/controlador/repo_pra.php', '2012-07-10 17:28:20'),
(3, 18923, '127.0.0.1', '/lafimo/controlador/repo_pra.php', '2012-07-10 17:28:23'),
(4, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 02:31:36'),
(5, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:33:10'),
(6, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:33:22'),
(7, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:33:59'),
(8, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:34:16'),
(9, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:34:18'),
(10, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:34:21'),
(11, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:34:28'),
(12, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:34:30'),
(13, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:34:59'),
(14, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:36:22'),
(15, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:36:42'),
(16, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:36:47'),
(17, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:36:48'),
(18, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:37:01'),
(19, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:38:13'),
(20, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:44:33'),
(21, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:44:50'),
(22, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:45:12'),
(23, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:45:41'),
(24, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:45:51'),
(25, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:47:14'),
(26, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:47:33'),
(27, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:48:00'),
(28, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:48:13'),
(29, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:48:39'),
(30, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:48:50'),
(31, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:48:58'),
(32, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:49:01'),
(33, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:49:06'),
(34, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:49:10'),
(35, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:49:37'),
(36, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:49:39'),
(37, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:49:50'),
(38, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:50:07'),
(39, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:50:09'),
(40, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:50:12'),
(41, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:50:22'),
(42, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:50:25'),
(43, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:54:43'),
(44, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:54:51'),
(45, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:54:56'),
(46, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:54:58'),
(47, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:58:46'),
(48, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:58:49'),
(49, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:58:52'),
(50, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:59:08'),
(51, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:59:14'),
(52, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 02:59:55'),
(53, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 03:00:03'),
(54, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 03:00:07'),
(55, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 03:00:10'),
(56, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 03:01:04'),
(57, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 03:01:08'),
(58, 18923, '127.0.0.1', '/lafimo/controlador/ver_mae.php', '2012-07-17 03:01:17'),
(59, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 03:01:22'),
(60, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 03:02:01'),
(61, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 03:02:04'),
(62, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 03:02:06'),
(63, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 03:02:12'),
(64, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 03:02:19'),
(65, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 03:02:27'),
(66, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:02:38'),
(67, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:02:41'),
(68, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:02:43'),
(69, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupobr.php?h=9&b=101', '2012-07-17 03:02:54'),
(70, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:02:57'),
(71, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:02:59'),
(72, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 03:03:01'),
(73, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 03:03:02'),
(74, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:03:05'),
(75, 18923, '127.0.0.1', '/lafimo/controlador/det_brigada.php?brig=3', '2012-07-17 03:03:12'),
(76, 18923, '127.0.0.1', '/lafimo/controlador/mod_brigada.php?brig=3&no_brig=234?', '2012-07-17 03:03:15'),
(77, 18923, '127.0.0.1', '/lafimo/controlador/r_modbrigada.php?hora=3&brigada=234', '2012-07-17 03:03:20'),
(78, 18923, '127.0.0.1', '/lafimo/controlador/reciveb_rest.php?mtv=ocupado&bri=234', '2012-07-17 03:03:29'),
(79, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:03:31'),
(80, 18923, '127.0.0.1', '/lafimo/controlador/det_brigada.php?brig=3', '2012-07-17 03:03:35'),
(81, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:03:37'),
(82, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:03:39'),
(83, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:03:41'),
(84, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:03:52'),
(85, 18923, '127.0.0.1', '/lafimo/controlador/det_brigada.php?brig=3', '2012-07-17 03:03:53'),
(86, 18923, '127.0.0.1', '/lafimo/controlador/mod_brigada.php?brig=3&no_brig=234?', '2012-07-17 03:03:56'),
(87, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php?brig=3', '2012-07-17 03:04:05'),
(88, 18923, '127.0.0.1', '/lafimo/controlador/det_brigada.php?brig=3', '2012-07-17 03:04:08'),
(89, 18923, '127.0.0.1', '/lafimo/controlador/mod_brigada.php?brig=3&no_brig=234?', '2012-07-17 03:04:10'),
(90, 18923, '127.0.0.1', '/lafimo/controlador/r_modbrigada.php?hora=3&brigada=234', '2012-07-17 03:04:17'),
(91, 18923, '127.0.0.1', '/lafimo/controlador/reciveb_rest.php?mtv=x&bri=234', '2012-07-17 03:04:21'),
(92, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:04:23'),
(93, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:04:27'),
(94, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:04:29'),
(95, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:04:43'),
(96, 18923, '127.0.0.1', '/lafimo/controlador/det_brigada.php?brig=3', '2012-07-17 03:04:44'),
(97, 18923, '127.0.0.1', '/lafimo/controlador/mod_brigada.php?brig=3&no_brig=234?', '2012-07-17 03:05:42'),
(98, 18923, '127.0.0.1', '/lafimo/controlador/r_modbrigada.php?hora=3&brigada=234', '2012-07-17 03:05:49'),
(99, 18923, '127.0.0.1', '/lafimo/controlador/reciveb_rest.php?mtv=ujk,sad&bri=234', '2012-07-17 03:05:53'),
(100, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:05:55'),
(101, 18923, '127.0.0.1', '/lafimo/controlador/det_brigada.php?brig=3', '2012-07-17 03:06:01'),
(102, 18923, '127.0.0.1', '/lafimo/controlador/det_brigada.php?brig=3', '2012-07-17 03:10:23'),
(103, 18923, '127.0.0.1', '/lafimo/controlador/mod_brigada.php?brig=3&no_brig=234?', '2012-07-17 03:10:28'),
(104, 18923, '127.0.0.1', '/lafimo/controlador/r_modbrigada.php?hora=3&brigada=234', '2012-07-17 03:10:32'),
(105, 18923, '127.0.0.1', '/lafimo/controlador/reciveb_rest.php?mtv=gtjkl%C3%B1&bri=234', '2012-07-17 03:10:36'),
(106, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:10:38'),
(107, 18923, '127.0.0.1', '/lafimo/controlador/reciveb_rest.php?mtv=gtjkl%C3%B1&bri=234', '2012-07-17 03:10:42'),
(108, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:10:44'),
(109, 18923, '127.0.0.1', '/lafimo/controlador/reciveb_rest.php?mtv=gtjkl%C3%B1&bri=234', '2012-07-17 03:10:45'),
(110, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:10:47'),
(111, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:10:50'),
(112, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:10:52'),
(113, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:11:20'),
(114, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:11:21'),
(115, 18923, '127.0.0.1', '/lafimo/controlador/reciveb_rest.php?mtv=gtjkl%C3%B1&bri=234', '2012-07-17 03:11:22'),
(116, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:11:24'),
(117, 18923, '127.0.0.1', '/lafimo/controlador/reciveb_rest.php?mtv=gtjkl%C3%B1&bri=234', '2012-07-17 03:11:25'),
(118, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:11:27'),
(119, 18923, '127.0.0.1', '/lafimo/controlador/reciveb_rest.php?mtv=gtjkl%C3%B1&bri=234', '2012-07-17 03:11:28'),
(120, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:11:30'),
(121, 18923, '127.0.0.1', '/lafimo/controlador/det_brigada.php?brig=3', '2012-07-17 03:12:13'),
(122, 18923, '127.0.0.1', '/lafimo/controlador/mod_brigada.php?brig=3&no_brig=234?', '2012-07-17 03:12:17'),
(123, 18923, '127.0.0.1', '/lafimo/controlador/mod_brigada.php?brig=3&no_brig=234?', '2012-07-17 03:13:18'),
(124, 18923, '127.0.0.1', '/lafimo/controlador/r_modbrigada.php?hora=3&brigada=234', '2012-07-17 03:13:21'),
(125, 18923, '127.0.0.1', '/lafimo/controlador/reciveb_rest.php?mtv=rtyui&bri=234', '2012-07-17 03:13:24'),
(126, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:13:26'),
(127, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:13:31'),
(128, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:13:33'),
(129, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 03:13:43'),
(130, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 03:13:46'),
(131, 18923, '127.0.0.1', '/lafimo/controlador/evaluar_br.php?h=9&b=101&ma=12345', '2012-07-17 03:13:52'),
(132, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 03:13:52'),
(133, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 03:13:54'),
(134, 18923, '127.0.0.1', '/lafimo/controlador/evaluar_br.php?h=9&b=101&ma=12345', '2012-07-17 03:14:13'),
(135, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 03:14:14'),
(136, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 03:14:15'),
(137, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:14:23'),
(138, 18923, '127.0.0.1', '/lafimo/controlador/det_brigada.php?brig=3', '2012-07-17 03:14:27'),
(139, 18923, '127.0.0.1', '/lafimo/controlador/mod_brigada.php?brig=3&no_brig=234?', '2012-07-17 03:14:29'),
(140, 18923, '127.0.0.1', '/lafimo/controlador/r_modbrigada.php?hora=3&brigada=234', '2012-07-17 03:14:32'),
(141, 18923, '127.0.0.1', '/lafimo/controlador/reciveb_rest.php?mtv=&bri=234', '2012-07-17 03:14:36'),
(142, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:14:38'),
(143, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:14:40'),
(144, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:14:42'),
(145, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupobr.php?h=9&b=101', '2012-07-17 03:14:57'),
(146, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:15:05'),
(147, 18923, '127.0.0.1', '/lafimo/controlador/ver_log.php', '2012-07-17 03:15:11'),
(148, 18923, '127.0.0.1', '/lafimo/controlador/ver_log.php', '2012-07-17 03:15:13'),
(149, 18923, '127.0.0.1', '/lafimo/controlador/ver_log.php', '2012-07-17 03:15:29'),
(150, 18923, '127.0.0.1', '/lafimo/controlador/repo_pra.php', '2012-07-17 03:16:32'),
(151, 18923, '127.0.0.1', '/lafimo/controlador/repo_pra.php', '2012-07-17 03:16:34'),
(152, 18923, '127.0.0.1', '/lafimo/controlador/det_pra.php?pra=2', '2012-07-17 03:16:43'),
(153, 18923, '127.0.0.1', '/lafimo/controlador/r_modpra.php?pra=2', '2012-07-17 03:16:54'),
(154, 18923, '127.0.0.1', '/lafimo/controlador/repo_pra.php', '2012-07-17 03:16:57'),
(155, 18923, '127.0.0.1', '/lafimo/controlador/repo_pra.php', '2012-07-17 03:16:59'),
(156, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:17:05'),
(157, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:17:07'),
(158, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupobr.php?h=9&b=101', '2012-07-17 03:17:10'),
(159, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:17:12'),
(160, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:17:15'),
(161, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:17:18'),
(162, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 03:17:20'),
(163, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupobr.php?h=5&b=500', '2012-07-17 03:17:22'),
(164, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 03:17:24'),
(165, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 03:17:35'),
(166, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 03:17:42'),
(167, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 03:17:56'),
(168, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 03:18:10'),
(169, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:18:12'),
(170, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 03:18:43'),
(171, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:18:44'),
(172, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 03:19:23'),
(173, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:19:25'),
(174, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:20:44'),
(175, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 03:21:01'),
(176, 18923, '127.0.0.1', '/lafimo/controlador/repo_pra.php', '2012-07-17 03:21:04'),
(177, 18923, '127.0.0.1', '/lafimo/controlador/repo_pra.php', '2012-07-17 03:21:05'),
(178, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 03:21:54'),
(179, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:21:56'),
(180, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:22:26'),
(181, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 03:22:39'),
(182, 18923, '127.0.0.1', '/lafimo/controlador/repo_pra.php', '2012-07-17 03:22:42'),
(183, 18923, '127.0.0.1', '/lafimo/controlador/repo_pra.php', '2012-07-17 03:22:43'),
(184, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 03:23:37'),
(185, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:23:39'),
(186, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:26:06'),
(187, 12345, '127.0.0.1', '/lafimo/controlador/det_brigada_e.php?brig=8&pc=3', '2012-07-17 03:26:24'),
(188, 12345, '127.0.0.1', '/lafimo/controlador/inscribir.php?hora=8&n_br=202&pra=3', '2012-07-17 03:26:29'),
(189, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:26:53'),
(190, 12345, '127.0.0.1', '/lafimo/controlador/det_brigada_e.php?brig=8&pc=3', '2012-07-17 03:26:56'),
(191, 12345, '127.0.0.1', '/lafimo/controlador/inscribir.php?hora=8&n_br=202&pra=3', '2012-07-17 03:26:58'),
(192, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:27:35'),
(193, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 03:30:38'),
(194, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:30:41'),
(195, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 03:30:51'),
(196, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:31:07'),
(197, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 03:33:41'),
(198, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:33:42'),
(199, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:34:13'),
(200, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:34:13'),
(201, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:44:55'),
(202, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:45:30'),
(203, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:45:38'),
(204, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:47:35'),
(205, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:47:39'),
(206, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:47:45'),
(207, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:48:05'),
(208, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:48:21'),
(209, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:50:01'),
(210, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:50:24'),
(211, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 03:57:34'),
(212, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:13:40'),
(213, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:14:19'),
(214, 0, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:14:23'),
(215, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 04:14:37'),
(216, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:14:40'),
(217, 0, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:17:29'),
(218, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 04:18:55'),
(219, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:19:01'),
(220, 0, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:20:11'),
(221, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 04:20:18'),
(222, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:20:21'),
(223, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:22:22'),
(224, 0, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:24:33'),
(225, 0, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:24:35'),
(226, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 04:24:42'),
(227, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:24:44'),
(228, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 04:27:03'),
(229, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:27:06'),
(230, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:28:57'),
(231, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:30:58'),
(232, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:31:15'),
(233, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:31:34'),
(234, 12345, '127.0.0.1', '/lafimo/controlador/det_brigada_e.php?brig=9&pc=4', '2012-07-17 04:31:41'),
(235, 12345, '127.0.0.1', '/lafimo/controlador/inscribir.php?hora=9&n_br=101&pra=4', '2012-07-17 04:31:44'),
(236, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:31:54'),
(237, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 04:32:04'),
(238, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:32:06'),
(239, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 04:32:31'),
(240, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:32:34'),
(241, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 04:33:23'),
(242, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:33:24'),
(243, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 04:34:03'),
(244, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:34:05'),
(245, 12345, '127.0.0.1', '/lafimo/controlador/det_brigada_e.php?brig=9&pc=5', '2012-07-17 04:34:21'),
(246, 12345, '127.0.0.1', '/lafimo/controlador/inscribir.php?hora=9&n_br=101&pra=5', '2012-07-17 04:34:23'),
(247, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:34:27'),
(248, 0, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:36:26'),
(249, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 04:36:35'),
(250, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:36:41'),
(251, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 04:37:11'),
(252, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:37:14'),
(253, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 04:38:15'),
(254, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:38:26'),
(255, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 04:38:44'),
(256, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:38:47'),
(257, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 04:40:16'),
(258, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 04:40:20'),
(259, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 04:40:24'),
(260, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 04:40:25'),
(261, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 04:41:57'),
(262, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 04:42:01'),
(263, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 04:42:08'),
(264, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 04:42:10'),
(265, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 04:42:12'),
(266, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 04:42:23'),
(267, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=5&b=500', '2012-07-17 04:42:28'),
(268, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=5&b=500', '2012-07-17 04:43:58'),
(269, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=5&b=500', '2012-07-17 04:44:04'),
(270, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 04:44:07'),
(271, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 04:44:53'),
(272, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:44:56'),
(273, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:45:06'),
(274, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:45:09'),
(275, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:45:13'),
(276, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:45:17'),
(277, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:46:16'),
(278, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:46:36'),
(279, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:46:47'),
(280, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:46:51'),
(281, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:46:53'),
(282, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:47:48'),
(283, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:48:22'),
(284, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:48:27'),
(285, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:48:29'),
(286, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:49:30'),
(287, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:49:33'),
(288, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:50:14'),
(289, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 04:50:17'),
(290, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 04:50:19'),
(291, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 04:50:21'),
(292, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 04:50:26'),
(293, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 04:50:41'),
(294, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 04:50:43'),
(295, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:50:45'),
(296, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 04:50:48'),
(297, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 04:50:50'),
(298, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupobr.php?h=9&b=101', '2012-07-17 04:50:52'),
(299, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 04:50:56'),
(300, 18923, '127.0.0.1', '/lafimo/controlador/repo_pra.php', '2012-07-17 04:51:02'),
(301, 18923, '127.0.0.1', '/lafimo/controlador/repo_pra.php', '2012-07-17 04:51:30'),
(302, 18923, '127.0.0.1', '/lafimo/controlador/repo_pra.php', '2012-07-17 04:51:48'),
(303, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 04:52:44'),
(304, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:52:47'),
(305, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 04:52:50'),
(306, 18923, '127.0.0.1', '/lafimo/controlador/repo_pra.php', '2012-07-17 04:52:57'),
(307, 18923, '127.0.0.1', '/lafimo/controlador/det_pra.php?pra=1', '2012-07-17 04:53:01'),
(308, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 04:53:11'),
(309, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 04:53:25'),
(310, 18923, '127.0.0.1', '/lafimo/controlador/ver_estudiantes.php', '2012-07-17 04:53:29'),
(311, 18923, '127.0.0.1', '/lafimo/controlador/ver_mae.php', '2012-07-17 04:54:04'),
(312, 18923, '127.0.0.1', '/lafimo/controlador/ver_mae.php', '2012-07-17 04:54:21'),
(313, 18923, '127.0.0.1', '/lafimo/controlador/ver_mae.php', '2012-07-17 04:54:41'),
(314, 18923, '127.0.0.1', '/lafimo/controlador/ver_mae.php', '2012-07-17 04:54:49'),
(315, 18923, '127.0.0.1', '/lafimo/controlador/mod_mae.php?ne=1364', '2012-07-17 04:54:55'),
(316, 18923, '127.0.0.1', '/lafimo/controlador/ver_log.php', '2012-07-17 04:55:03'),
(317, 18923, '127.0.0.1', '/lafimo/controlador/ver_log.php', '2012-07-17 04:55:41'),
(318, 18923, '127.0.0.1', '/lafimo/controlador/ver_log.php', '2012-07-17 04:55:49'),
(319, 18923, '127.0.0.1', '/lafimo/controlador/ver_log.php', '2012-07-17 04:56:28'),
(320, 18923, '127.0.0.1', '/lafimo/controlador/reporte_brigadas.php', '2012-07-17 04:56:52'),
(321, 18923, '127.0.0.1', '/lafimo/controlador/ver_grupo.php?h=9&b=101', '2012-07-17 04:56:57'),
(322, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 04:57:01'),
(323, 18923, '127.0.0.1', '/lafimo/controlador/det_brigada.php?brig=1', '2012-07-17 04:57:04'),
(324, 18923, '127.0.0.1', '/lafimo/controlador/r_brigadas.php', '2012-07-17 04:57:06'),
(325, 0, '127.0.0.1', '/lafimo/controlador/login.php', '2012-07-17 04:58:02'),
(326, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:58:04'),
(327, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 04:58:15'),
(328, 12345, '127.0.0.1', '/lafimo/controlador/br_estudiante.php', '2012-07-17 05:02:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE IF NOT EXISTS `maestro` (
  `no_empleado` bigint(7) NOT NULL COMMENT 'numero del empleado (maestro)',
  `nombre` varchar(50) NOT NULL COMMENT 'nombre del maestro',
  `mensaje` varchar(100) DEFAULT NULL COMMENT 'breve mensaje que se puede compartir',
  `pas_m` int(7) NOT NULL COMMENT 'password de acceso',
  `admin` int(2) NOT NULL COMMENT ' 0.-Estándar 1.- Administrador 2.- Super Usuario',
  PRIMARY KEY (`no_empleado`),
  UNIQUE KEY `no_empleado` (`no_empleado`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Tabla de maestros';

--
-- Volcado de datos para la tabla `maestro`
--

INSERT INTO `maestro` (`no_empleado`, `nombre`, `mensaje`, `pas_m`, `admin`) VALUES
(54321, 'Lic. Sergio Israel Ibarra Garz', 'Prueba', 12345, 1),
(18923, 'Norma Esthela Flores Moreno', 'Prueba', 18923, 2),
(1364, 'Jorge Enrrique Figueroa Martin', 'Prueba', 1364, 0),
(15433, 'Erik Daniel Vilegas Sanchez', 'Prueba estandar', 15433, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica`
--

CREATE TABLE IF NOT EXISTS `practica` (
  `no_practica` bigint(2) NOT NULL AUTO_INCREMENT COMMENT 'Numero de practica',
  `disponible` int(2) NOT NULL COMMENT '1. Disponible 0. No disponible',
  `mensaje` varchar(100) DEFAULT NULL COMMENT 'Breve mensaje que puede ser compartido',
  `mesas` int(9) DEFAULT NULL COMMENT 'Mesas disponibles',
  `estp_mesa` int(9) DEFAULT NULL COMMENT 'Estudiantes por mesa',
  `f_inicio` date DEFAULT NULL COMMENT 'Inicio de la practica',
  `f_fin` date DEFAULT NULL COMMENT 'Fin de la practica',
  UNIQUE KEY `no_practica` (`no_practica`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Tabla de la practica' AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `practica`
--

INSERT INTO `practica` (`no_practica`, `disponible`, `mensaje`, `mesas`, `estp_mesa`, `f_inicio`, `f_fin`) VALUES
(1, 0, 'Cierre automatico - Termino la practica', 2, 2, '2012-06-03', '2012-06-04'),
(2, 0, 'Cierre automatico - Termino la practica', 1, 2, '2012-06-02', '2012-06-07'),
(3, 0, 'Cierre automatico - Termino la practica', 3, 3, '2012-06-16', '2012-06-24'),
(4, 0, 'Apertura automatica - Inicio de la practica', 3, 3, '2012-08-19', '2012-08-29'),
(5, 1, 'Apertura automatica - Inicio de la practica', 3, 3, '2012-06-19', '2012-08-29');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
