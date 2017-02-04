-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2017 a las 22:32:29
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
-- Estructura de tabla para la tabla `salas`
--

DROP TABLE IF EXISTS `salas`;
CREATE TABLE `salas` (
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `urlimagen` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `subtitulo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `propietario` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`nombre`, `urlimagen`, `descripcion`, `subtitulo`, `propietario`) VALUES
('Sala Venecia', 'img/Salas/Sala1.jpg', '<li>Capacidad de 10 personas</li>\n<li>Ordenador de sobremesa</li>\n<li>25 m<sup>2</sup></li>', 'Especial para pequeñas reuniones', ''),
('Salón Nelson Mandela', 'img/Salas/Sala2.jpg', '<li>Capacidad de 250 personas</li><li>Mesa para ponentes</li><li>325 m<sup>2</sup></li>', 'Especial para conferencias', ''),
('Sala Salvador Dalí', 'img/Salas/Sala3.jpg', '<li>Capacidad de 12 personas</li><li>Mesa redonda</li><li>18 m<sup>2</sup></li', 'Especial para metodología Scrum', ''),
('Sala Rafael Casanova', 'img/Salas/Sala4.jpg', '<li>Capacidad de 200 personas</li><li>Atril para ponencias</li><li>180 m<sup>2</sup></li', 'Formación para empleados', ''),
('Sala Pep Guardiola', 'img/Salas/Sala5.jpg', '<li>Capacidad de 26 personas</li><li>Pizarra</li><li>30 m<sup>2</sup></li', 'Especial para trabajo en equipo', ''),
('Sala Antoni Gaudí', 'img/Salas/Sala6.jpg', '<li>Capacidad de 60 personas</li><li>Proyector</li><li>80 m<sup>2</sup></li', 'Para reuniones de accionistas', ''),
('Sala Londres', 'img/Salas/Sala7.jpg', '<li>Capacidad de 20 personas</li><li>Pizarra y proyector</li><li>27 m<sup>2</sup></li', 'Especial para formación', ''),
('Materiales disponibles', 'img/Salas/Sala8.jpg', 'Proyector, PC sobremesa, portátiles\nmicrófonos de mesa, micrófonos de diadema,\n sistema de traducción simultanea, etc', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
