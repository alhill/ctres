-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
<<<<<<< HEAD
-- Tiempo de generación: 02-02-2017 a las 10:13:42
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13
=======
-- Tiempo de generación: 08-02-2017 a las 17:04:42
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28
>>>>>>> d5355d252b587baa6c5f32c777ab5f2fdd91d84a

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
<<<<<<< HEAD
  `body` text COLLATE utf8_spanish_ci NOT NULL,
  `opciones` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT 'event-important',
  `lista` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
=======
  `title` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `body` text COLLATE utf8_spanish_ci NOT NULL,
  `opciones` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `lista` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `url` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
>>>>>>> d5355d252b587baa6c5f32c777ab5f2fdd91d84a
  `start` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `end` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `inicio_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `final_normal` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `lista_reservas`
--

<<<<<<< HEAD
INSERT INTO `lista_reservas` (`id`, `body`, `opciones`, `lista`, `start`, `end`, `inicio_normal`, `final_normal`) VALUES
(3, ' ', '02', '', '1487159400000', '1487163000000', '15/02/2017 12:50', '15/02/2017 13:50'),
(4, 'hola', 'sala', '', '1486109640000', '', '03/02/2017 9:14', '04/02/2017 9:14'),
(5, 'hello', 'sala', '', '1486628400000', '1486714800000', '09/02/2017 9:20', '10/02/2017 9:20');
=======
INSERT INTO `lista_reservas` (`id`, `title`, `body`, `opciones`, `lista`, `url`, `start`, `end`, `inicio_normal`, `final_normal`) VALUES
(1, 'ggg', 'gg', 'material', 'Ordenador', 'http://localhost/calendariob/descripcion_evento.php?id=1', '1502116260000', '1502202660000', '07/08/2017 16:31', '08/08/2017 16:31');
>>>>>>> d5355d252b587baa6c5f32c777ab5f2fdd91d84a

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
<<<<<<< HEAD
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
=======
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
>>>>>>> d5355d252b587baa6c5f32c777ab5f2fdd91d84a
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
