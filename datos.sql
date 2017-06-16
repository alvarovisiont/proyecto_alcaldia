-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2017 a las 00:21:32
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `respaldo`
--

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`id_acceso`, `user_id`, `departamento_id`, `area_id`, `sub_area_id`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '1,2,3,4,5', '3,4,5,6,7,8,9,10,11', '2017-06-08 02:57:52', '2017-06-08 02:57:52');

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `departamento_id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 1, 'Departamentos', '2017-06-07 21:50:49', '2017-06-07 21:50:49'),
(2, 1, 'Proveedores', '2017-06-07 21:52:13', '2017-06-07 21:52:13'),
(3, 1, 'Unidades', '2017-06-07 21:54:18', '2017-06-07 21:54:34'),
(4, 1, 'Configuración', '2017-06-07 21:54:59', '2017-06-07 21:54:59'),
(5, 1, 'Requisiciones', '2017-06-07 21:55:17', '2017-06-07 21:55:17');

--
-- Volcado de datos para la tabla `com_configs`
--

INSERT INTO `com_configs` (`id`, `ano`, `presidente`, `coordinador`, `created_at`, `updated_at`) VALUES
(1, '2017', 'Alvaro Guedez', 'Susana Rodríguez', '2017-06-07 22:29:36', '2017-06-07 22:29:36');

--
-- Volcado de datos para la tabla `com_departamentos`
--

INSERT INTO `com_departamentos` (`id`, `programatica`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, '11.01.00.51', 'Desarrollo Urbano', '2017-06-07 22:05:08', '2017-06-08 03:04:00');

--
-- Volcado de datos para la tabla `com_requisiciones`
--

INSERT INTO `com_requisiciones` (`id`, `codigo`, `descripcion`, `fecha`, `status`, `des_unidad`, `unidad`, `centro`, `ano`, `created_at`, `updated_at`) VALUES
(1, '0003', 'Primera requisición', '2017-06-07', 'activo', 'Desarrollo Urbano', '11.01.00.51', 'centro de cagua', 2017, '2017-06-08 03:01:05', '2017-06-08 03:04:28');

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `nombre`, `descripcion`, `fa_class`, `created_at`, `updated_at`) VALUES
(1, 'Compras', 'departamento de compras', 'fa fa-home', '2017-06-07 21:50:49', '2017-06-07 21:50:49');

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Servicio tecnico', 'servicio', '2017-06-07 21:50:49', '2017-06-07 21:50:49');

--
-- Volcado de datos para la tabla `sub_area`
--

INSERT INTO `sub_area` (`id_sub_area`, `area_id`, `nombre`, `descripcion`, `ruta`, `created_at`, `updated_at`) VALUES
(3, 1, 'Ver departamentos', 'sub area para ver los departamentos', 'Compras\\Departamentos.index', '2017-06-07 21:57:25', '2017-06-07 21:57:25'),
(4, 1, 'Crear Departamento', 'Area para crear los departamentos', 'Compras\\Departamentos.create', '2017-06-07 21:57:56', '2017-06-07 21:57:56'),
(5, 2, 'Ver proveedores', 'Area para ver los proveedores', 'Compras\\Proveedores.index', '2017-06-07 21:58:22', '2017-06-07 21:58:22'),
(6, 2, 'Registrar Proveedor', 'Arear para crear proveedores', 'Compras\\Proveedores.create', '2017-06-07 21:58:54', '2017-06-07 21:58:54'),
(7, 3, 'Ver unidades', 'Area para ver las unidades', 'Compras\\UnidadesMedida.index', '2017-06-07 21:59:23', '2017-06-07 21:59:23'),
(8, 3, 'Registrar Unidad', 'Area para registrar las nidades de compra', 'Compras\\UnidadesMedida.create', '2017-06-07 22:00:10', '2017-06-07 22:00:10'),
(9, 4, 'configurar', 'area para grabar la configuración del sistema', 'Compras\\Configurar.index', '2017-06-07 22:02:27', '2017-06-07 22:02:27'),
(10, 5, 'Ver requisiciones', 'ruta para ver las requisiciones del sistema', 'Compras\\Requisiciones.index', '2017-06-07 22:08:11', '2017-06-07 22:08:11'),
(11, 5, 'Crear Requisición', 'vista para crear las requisiciones de compras', 'Compras\\Requisiciones.create', '2017-06-08 02:57:34', '2017-06-08 02:57:34');

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombres`, `apellidos`, `nac`, `cedula`, `usuario`, `telefono`, `password`, `rol_id`, `departamento_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'xeichmann', 'Mrs. Aiyana Miller DDS', 'V', '21202500', 'admin', '04124362753', '$2y$10$N7ZXKxL5mQFm6gPaaUhjRuGkwmoJtW8DWA2BRvZJen4NX1GuWZ7HS', 1, 1, NULL, '2017-06-07 21:50:50', '2017-06-08 02:57:52');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
