-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-02-2017 a las 09:54:35
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
  `body` text COLLATE utf8_spanish_ci NOT NULL,
  `opciones` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'event-important',
  `lista` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `start` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `end` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `inicio_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `final_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `lista_reservas`
--

INSERT INTO `lista_reservas` (`id`, `body`, `opciones`, `lista`, `start`, `end`, `inicio_normal`, `final_normal`) VALUES
(3, ' ', '02', '', '1487159400000', '1487163000000', '15/02/2017 12:50', '15/02/2017 13:50'),
(4, 'hola', 'sala', '', '1486109640000', '', '03/02/2017 9:14', '04/02/2017 9:14'),
(5, 'hello', 'sala', '', '1486628400000', '1486714800000', '09/02/2017 9:20', '10/02/2017 9:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `privilegios` varchar(1) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `nombre`, `apellido`, `usuario`, `email`, `contrasena`, `privilegios`) VALUES
(1, 'Test', 'Test', 'test', 'test@email.com', '098f6bcd4621d373cade4e832627b4f6', '1'),
(2, 'testdos', 'tester', 'test2', 'test2@email.com', '098f6bcd4621d373cade4e832627b4f6', '1'),
(3, 'Alvaro', 'Gil', 'alhill', 'alvarogil91@gmail.com', 'efe6398127928f1b2e9ef3207fb82663', '3'),
(4, 'seÃ±or', 'sin privilegios', 'usuario', 'usuario@raso.net', '81dc9bdb52d04dc20036dbd8313ed055', '1'),
(5, 'un', 'propietario', 'propietario', 'propietario@dela.sala', '81dc9bdb52d04dc20036dbd8313ed055', '2'),
(13, 'Carla', 'Ecija', 'usuario56', 'karlaecija@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '3'),
(14, 'Alguien', 'Pruebas', 'alguien82', 'alguien@gmail.com', 'ab56b4d92b40713acc5af89985d4b786', '2'),
(15, 'prueba', 'prueba', 'prueba', 'prueba@gmail.con', '827ccb0eea8a706c4c34a16891f84e7b', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lista_reservas`
--
ALTER TABLE `lista_reservas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lista_reservas`
--
ALTER TABLE `lista_reservas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
