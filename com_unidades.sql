-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2017 a las 14:20:47
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_alcaldia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_unidades`
--

CREATE TABLE `com_unidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `com_unidades`
--

INSERT INTO `com_unidades` (`id`, `codigo`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, '001', 'SACOS', NULL, NULL),
(2, '2', 'BULTO', '2017-06-15 02:29:43', '2017-06-15 02:29:43'),
(3, '3', 'KILOGRAMOS', '2017-06-16 22:00:27', '2017-06-16 22:00:27');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `com_unidades`
--
ALTER TABLE `com_unidades`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `com_unidades`
--
ALTER TABLE `com_unidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
