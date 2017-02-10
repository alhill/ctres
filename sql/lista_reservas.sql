-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-02-2017 a las 13:18:55
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ctres_reservas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_reservas`
--

CREATE TABLE `lista_reservas` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `body` text COLLATE utf8_spanish_ci NOT NULL,
  `opciones` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'event-important',
  `lista_salas` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `lista_materiales` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `start` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `end` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `inicio_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `final_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `lista_reservas`
--

INSERT INTO `lista_reservas` (`id`, `title`, `body`, `opciones`, `lista_salas`, `lista_materiales`, `url`, `start`, `end`, `inicio_normal`, `final_normal`) VALUES
(88, 'aaa', 'aaa', 'sala', 'caracas', '', 'http://localhost/ctres_2/descripcion_evento.php?id=88', '1506938400000', '1506942000000', '02/10/2017 12:00', '02/10/2017 13:00'),
(92, 'bbb', 'bbb', 'sala', 'reuniones_soria', '', 'http://localhost/ctres_2/descripcion_evento.php?id=92', '1506938400000', '1506942000000', '02/10/2017 12:00', '02/10/2017 13:00'),
(93, 'ccc', 'ccc', 'sala', 'formacion_barcelona', '', 'http://localhost/ctres_2/descripcion_evento.php?id=93', '1506938400000', '1506942000000', '02/10/2017 12:00', '02/10/2017 13:00'),
(94, 'jjj', 'jjj', 'sala', 'caracas', '', 'http://localhost/ctres_2/descripcion_evento.php?id=94', '1506945600000', '1506949200000', '02/10/2017 14:00', '02/10/2017 15:00'),
(95, 'uuu', 'uuu', 'sala', 'reuniones_soria', '', 'http://localhost/ctres_2/descripcion_evento.php?id=95', '1506940200000', '1506943800000', '02/10/2017 12:30', '02/10/2017 13:30');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lista_reservas`
--
ALTER TABLE `lista_reservas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lista_reservas`
--
ALTER TABLE `lista_reservas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
