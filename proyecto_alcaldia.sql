-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2017 a las 21:29:08
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `id_acceso` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `departamento_id` int(11) NOT NULL,
  `area_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_area_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`id_acceso`, `user_id`, `departamento_id`, `area_id`, `sub_area_id`, `created_at`, `updated_at`) VALUES
(11, 3, 1, '2,5', '5,6,10,11', '2017-09-03 06:29:29', '2017-09-03 06:29:29'),
(26, 1, 1, '1,2,3,4,5,6,7,8', '3,4,5,6,7,8,9,10,11,12,13,14,15,16', '2017-12-06 17:17:34', '2017-12-06 17:17:34'),
(27, 1, 2, '9,10,11,12,13', '17,18,19,20,21,22', '2017-12-06 17:17:34', '2017-12-06 17:17:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `id_area` int(10) UNSIGNED NOT NULL,
  `departamento_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`id_area`, `departamento_id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 1, 'Departamentos', '2017-06-07 21:50:49', '2017-06-07 21:50:49'),
(2, 1, 'Proveedores', '2017-06-07 21:52:13', '2017-06-07 21:52:13'),
(3, 1, 'Unidades', '2017-06-07 21:54:18', '2017-06-07 21:54:34'),
(4, 1, 'Configuración', '2017-06-07 21:54:59', '2017-06-07 21:54:59'),
(5, 1, 'Requisiciones', '2017-06-07 21:55:17', '2017-06-07 21:55:17'),
(6, 1, 'Insumos', '2017-06-15 02:25:37', '2017-06-15 02:25:37'),
(7, 1, 'Reportes', '2017-06-21 21:10:55', '2017-06-21 21:10:55'),
(8, 1, 'Ordenes', '2017-06-24 19:06:33', '2017-06-24 19:06:33'),
(9, 2, 'Configuración', '2017-11-30 21:25:11', '2017-11-30 21:25:11'),
(10, 2, 'Maestro Cuentas', '2017-12-01 00:41:34', '2017-12-01 01:00:31'),
(11, 2, 'Axuliares', '2017-12-04 19:12:27', '2017-12-04 19:12:27'),
(12, 2, 'Asientos', '2017-12-04 20:43:50', '2017-12-04 20:43:50'),
(13, 2, 'Libro Mayor', '2017-12-06 16:45:25', '2017-12-06 16:45:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_configs`
--

CREATE TABLE `com_configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ano` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `presidente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `com_configs`
--

INSERT INTO `com_configs` (`id`, `ano`, `presidente`, `coordinador`, `created_at`, `updated_at`) VALUES
(1, '2017', 'Rafael Parra', 'Carlos Escarra', '2017-06-25 01:43:21', '2017-06-25 01:43:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_departamentos`
--

CREATE TABLE `com_departamentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `programatica` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad_departamento` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `com_departamentos`
--

INSERT INTO `com_departamentos` (`id`, `programatica`, `unidad_departamento`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'CLAP', 'Alimentación', 'Departamento encargado de empaquetar la comida', '2017-06-18 16:46:09', '2017-06-18 16:46:09'),
(2, 'Catastro', 'Catastro', 'Encargado de tierras', '2017-06-22 16:08:04', '2017-06-22 16:08:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_insumos`
--

CREATE TABLE `com_insumos` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` decimal(11,2) NOT NULL,
  `bienes` smallint(6) NOT NULL,
  `id_unidad` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `com_insumos`
--

INSERT INTO `com_insumos` (`id`, `codigo`, `descripcion`, `cantidad`, `bienes`, `id_unidad`, `created_at`, `updated_at`) VALUES
(1, 1, 'COMPRA DE BOLSAS PLASTICA', '12.00', 1, 1, '2017-06-18 16:44:47', '2017-12-07 00:28:16'),
(2, 2, 'HARINA PAN', '10.00', 0, 2, '2017-06-25 03:07:12', '2017-06-25 03:07:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_ordenes`
--

CREATE TABLE `com_ordenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero_control` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_orden` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar_entrega` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `forma_pago` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condicion_compra` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `plazo_entrega` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_orden` date NOT NULL,
  `com_requisiciones_codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_requisicion` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_requisicion_concepto` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_departamento_programatica` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_departamento_unidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_provees_rif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_provees_razon_social` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `com_provees_direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `com_ordenes`
--

INSERT INTO `com_ordenes` (`id`, `codigo`, `numero_control`, `tipo_orden`, `lugar_entrega`, `forma_pago`, `condicion_compra`, `plazo_entrega`, `fecha_orden`, `com_requisiciones_codigo`, `fecha_requisicion`, `com_requisicion_concepto`, `com_departamento_programatica`, `com_departamento_unidad`, `com_provees_rif`, `com_provees_razon_social`, `com_provees_direccion`, `created_at`, `updated_at`) VALUES
(2, 'OC001', '00005', 'Servicio', 'cagua', 'Efectivo', 'a largo plazo', '90 días', '2017-06-20', '001', '06/08/2017', 'EMBOLSAR COMIDA DE CLAP', 'CLAP', 'Alimentación', '20990397', 'PRoveedor Prueba', 'Cagua', '2017-06-25 01:13:58', '2017-06-25 01:13:58'),
(3, 'OCOO3', '0000004', 'Donación', 'cagua', 'Cheque', 'a largo plazo', '30 días', '2017-06-20', '001', '06/08/2017', 'EMBOLSAR COMIDA DE CLAP', 'CLAP', 'Alimentación', '20990397', 'PRoveedor Prueba', 'Cagua', '2017-06-25 04:16:02', '2017-06-25 04:16:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_ordenes_detalles`
--

CREATE TABLE `com_ordenes_detalles` (
  `id` int(10) UNSIGNED NOT NULL,
  `com_ordenes_id` int(10) UNSIGNED NOT NULL,
  `item_insumo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `unidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base` decimal(15,2) NOT NULL,
  `sub_total` decimal(15,2) NOT NULL,
  `iva` decimal(15,2) NOT NULL,
  `iva_porcentaje` int(11) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `ano` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `com_ordenes_detalles`
--

INSERT INTO `com_ordenes_detalles` (`id`, `com_ordenes_id`, `item_insumo`, `descripcion`, `cantidad`, `unidad`, `base`, `sub_total`, `iva`, `iva_porcentaje`, `total`, `ano`, `created_at`, `updated_at`) VALUES
(2, 2, '1', 'COMPRA DE BOLSAS PLASTICA', '6.00', 'KILOGRAMOS', '10000.00', '60000.00', '7200.00', 12, '67200.00', 2017, '2017-06-25 02:51:50', '2017-06-25 02:51:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_provees`
--

CREATE TABLE `com_provees` (
  `id` int(10) UNSIGNED NOT NULL,
  `rif_cedula` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razon_social` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `com_provees`
--

INSERT INTO `com_provees` (`id`, `rif_cedula`, `razon_social`, `direccion`, `telefono`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, '20990397', 'PRoveedor Prueba', 'Cagua', '04123456789', 'LEs vende la tela de los uniformes', '2017-06-22 16:38:53', '2017-06-22 16:38:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_requisiciones`
--

CREATE TABLE `com_requisiciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departamento_id` int(10) UNSIGNED NOT NULL,
  `centro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ano` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `com_requisiciones`
--

INSERT INTO `com_requisiciones` (`id`, `codigo`, `descripcion`, `fecha`, `status`, `departamento_id`, `centro`, `ano`, `created_at`, `updated_at`) VALUES
(1, '001', 'EMBOLSAR COMIDA DE CLAP', '06/08/2017', 'Vigente', 1, NULL, 2017, '2017-06-18 16:46:31', '2017-06-18 16:46:31'),
(2, '002', 'COMPRA DE LAPIZ', '07/08/2017', 'Vigente', 2, NULL, 2017, '2017-06-22 16:08:27', '2017-06-22 16:08:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_requisicion_detalles`
--

CREATE TABLE `com_requisicion_detalles` (
  `id` int(10) UNSIGNED NOT NULL,
  `codigo` int(11) NOT NULL,
  `cantidad` decimal(10,2) NOT NULL,
  `com_insumo_id` int(10) UNSIGNED NOT NULL,
  `ano` int(11) NOT NULL,
  `com_req_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `com_requisicion_detalles`
--

INSERT INTO `com_requisicion_detalles` (`id`, `codigo`, `cantidad`, `com_insumo_id`, `ano`, `com_req_id`, `created_at`, `updated_at`) VALUES
(1, 1, '12.00', 1, 2017, 1, '2017-06-18 16:53:30', '2017-06-18 16:53:30');

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
(1, '1', 'KILOGRAMOS', '2017-06-18 16:41:42', '2017-06-18 16:41:42'),
(2, '2', 'UNIDAD', '2017-06-25 03:06:39', '2017-06-25 03:06:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cont_asientos`
--

CREATE TABLE `cont_asientos` (
  `id` int(10) UNSIGNED NOT NULL,
  `comprobante` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `status` smallint(6) NOT NULL,
  `cont_configs_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cont_asientos`
--

INSERT INTO `cont_asientos` (`id`, `comprobante`, `descripcion`, `fecha`, `status`, `cont_configs_id`, `created_at`, `updated_at`) VALUES
(1, '2017000012', 'azdasdas', '2017-12-04', 1, 1, '2017-12-05 01:53:56', '2017-12-05 01:53:56'),
(2, '201712000003', 'segundo asiento', '2017-12-05', 1, 1, '2017-12-06 20:15:15', '2017-12-06 20:15:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cont_asiento_detalles`
--

CREATE TABLE `cont_asiento_detalles` (
  `id` int(10) UNSIGNED NOT NULL,
  `cont_asientos_id` int(10) UNSIGNED NOT NULL,
  `cont__master_accounts_id` int(10) UNSIGNED NOT NULL,
  `cont_auxiliares_id` int(11) DEFAULT '0',
  `cont_configs_id` int(10) UNSIGNED NOT NULL,
  `referencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debe` double(15,2) DEFAULT '0.00',
  `haber` double(15,2) DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cont_asiento_detalles`
--

INSERT INTO `cont_asiento_detalles` (`id`, `cont_asientos_id`, `cont__master_accounts_id`, `cont_auxiliares_id`, `cont_configs_id`, `referencia`, `debe`, `haber`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 0, 1, NULL, 125000.00, NULL, '2017-12-05 01:55:18', '2017-12-05 01:55:18'),
(2, 1, 2, 2, 1, 'any references', NULL, 125000.00, '2017-12-05 01:59:08', '2017-12-05 01:59:08'),
(4, 1, 3, 3, 1, NULL, NULL, 30000.00, '2017-12-06 20:19:32', '2017-12-06 20:19:32'),
(5, 2, 2, 0, 1, NULL, 130000.00, NULL, '2017-12-06 20:19:58', '2017-12-06 20:19:58'),
(6, 2, 3, 0, 1, NULL, NULL, 130000.00, '2017-12-06 20:20:20', '2017-12-06 20:20:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cont_auxiliares`
--

CREATE TABLE `cont_auxiliares` (
  `id` int(10) UNSIGNED NOT NULL,
  `auxiliar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cont__master_accounts_id` int(10) UNSIGNED NOT NULL,
  `cont_configs_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cont_auxiliares`
--

INSERT INTO `cont_auxiliares` (`id`, `auxiliar`, `descripcion`, `cont__master_accounts_id`, `cont_configs_id`, `created_at`, `updated_at`) VALUES
(2, '001', 'Any drescription', 2, 1, '2017-12-05 01:58:31', '2017-12-05 01:58:31'),
(3, '001', 'primer auxiliar de la cuenta 001', 3, 1, '2017-12-06 20:17:50', '2017-12-06 20:17:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cont_configs`
--

CREATE TABLE `cont_configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `ano` int(11) NOT NULL DEFAULT '2017',
  `alcalde` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coordinador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cont_configs`
--

INSERT INTO `cont_configs` (`id`, `ano`, `alcalde`, `coordinador`, `status`, `created_at`, `updated_at`) VALUES
(1, 2017, 'Eusebio Aguero', 'Steffy Thabata Rita', 1, '2017-11-30 22:13:49', '2017-12-01 00:35:49'),
(2, 2018, 'Mirian Pardo', 'Camara Municipal II', 0, '2017-11-30 22:14:56', '2017-12-01 00:35:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cont__master_accounts`
--

CREATE TABLE `cont__master_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `cuenta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operativa` smallint(6) NOT NULL DEFAULT '0',
  `detalle` smallint(6) NOT NULL DEFAULT '0',
  `p21` mediumint(9) NOT NULL,
  `ano` mediumint(9) NOT NULL,
  `cont_configs_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cont__master_accounts`
--

INSERT INTO `cont__master_accounts` (`id`, `cuenta`, `descripcion`, `operativa`, `detalle`, `p21`, `ano`, `cont_configs_id`, `created_at`, `updated_at`) VALUES
(2, '00002', 'second account', 1, 1, 102, 2017, 1, '2017-12-01 03:05:33', '2017-12-06 20:16:40'),
(3, '001', 'primera cuenta', 1, 0, 103, 2017, 1, '2017-12-06 20:17:15', '2017-12-06 20:17:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id_departamento` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fa_class` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id_departamento`, `nombre`, `descripcion`, `fa_class`, `created_at`, `updated_at`) VALUES
(1, 'Compras', 'departamento de compras', 'fa fa-shopping-cart', '2017-06-07 21:50:49', '2017-12-07 00:08:05'),
(2, 'Contabilidad', 'Departamento que lleva los asientos contables y cuentas de la alcaldia', 'fa fa-money', '2017-11-30 21:24:51', '2017-11-30 21:24:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(81, '2012_03_20_183355_roles', 1),
(82, '2013_03_20_180810_departamentos', 1),
(83, '2014_03_19_184731_area', 1),
(84, '2014_03_19_184732_sub_area', 1),
(85, '2014_03_20_184120_acceso', 1),
(86, '2017_06_02_004129_create_com_configs_table', 1),
(87, '2017_06_07_004848_create_com_provees_table', 1),
(88, '2017_06_07_143345_create_com_unidades_table', 1),
(89, '2017_06_07_162130_create_com_departamentos_table', 1),
(90, '2017_06_07_170752_create_com_requisiciones_table', 1),
(91, '2017_06_07_170753_com_insumos', 1),
(92, '2017_06_07_231750_create_com_requisicion_detalles_table', 1),
(94, '2017_06_24_151351_create_com_ordenes_table', 2),
(95, '2017_06_24_192633_create_com_ordenes_detalles_table', 3),
(97, '2017_11_30_161348_create_cont_configs_table', 4),
(100, '2017_11_30_214600_create_cont__master_accounts_table', 5),
(104, '2018_03_20_174120_create_users_table', 6),
(106, '2017_12_04_145241_create_cont_auxiliares_table', 7),
(129, '2017_12_04_162956_create_cont_asientos_table', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Puede acceder a funciones que solo los programadores pueden', '2017-06-18 16:37:22', '2017-09-03 06:28:00'),
(2, 'Operador', 'Usuario para otorgar a los trabajadores', '2017-09-03 06:28:30', '2017-09-03 06:28:30'),
(3, 'Programador', 'Usuario que tiene lo máximos permisos de programación', '2017-11-30 21:22:51', '2017-11-30 21:22:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_area`
--

CREATE TABLE `sub_area` (
  `id_sub_area` int(10) UNSIGNED NOT NULL,
  `area_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(11, 5, 'Crear Requisición', 'vista para crear las requisiciones de compras', 'Compras\\Requisiciones.create', '2017-06-08 02:57:34', '2017-06-08 02:57:34'),
(12, 6, 'Ver insumos', 'Ver todos los insumos registrados', 'Compras\\Insumos.index', '2017-06-15 02:26:04', '2017-06-15 02:26:04'),
(13, 6, 'Registrar insumo', 'Registrar los insumos', 'Compras\\insumos.create', '2017-06-15 02:27:19', '2017-06-15 02:27:19'),
(14, 7, 'Ver Reportes', 'vistas de todos los reportes', 'Compras\\reportes.index', '2017-06-21 21:36:02', '2017-06-21 21:36:02'),
(15, 8, 'Agregar Orden', 'Agregar una Orden de Compra', 'Compras\\Ordenes.create', '2017-06-24 19:07:53', '2017-06-24 19:07:53'),
(16, 8, 'Administrar Ordenes', 'Administrar las Ordenes de Compras', 'Compras\\Ordenes.index', '2017-06-24 19:08:26', '2017-06-24 19:08:26'),
(17, 9, 'Administrar Configuración', 'Módulo para manejar la configuracion principal del sistema de contabilidad', 'Contabilidad\\Config.index', '2017-11-30 21:26:29', '2017-11-30 21:26:29'),
(18, 9, 'Nueva Configuración', 'Módulo para crear una configuración', 'Contabilidad\\Config.create', '2017-12-01 00:42:29', '2017-12-01 00:42:29'),
(19, 10, 'Administrar Cuentas', 'Módulo para administrar  la cuentas contables', 'Contabilidad\\MaestroCuentas.index', '2017-12-01 00:55:38', '2017-12-01 01:38:28'),
(20, 11, 'Administrar Auxiliares', 'Módulo para administrar los auxiliares de los maestros de cuentas', 'Contabilidad\\Auxiliares.index', '2017-12-04 19:13:39', '2017-12-04 19:27:48'),
(21, 12, 'Administrar Asientos', 'Módulo para administrar los asientos de contabilidad', 'Contabilidad\\Asientos.index', '2017-12-04 20:44:29', '2017-12-04 20:44:29'),
(22, 13, 'Generar Libro Mayor', 'Módulo para generar el libro mayor de contabilidad', 'Contabilidad\\Reportes.libro_mayor', '2017-12-06 16:46:27', '2017-12-06 16:46:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nac` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `departamento_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombres`, `apellidos`, `nac`, `cedula`, `usuario`, `telefono`, `password`, `rol_id`, `departamento_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alvaro Antonio', 'Guedez Crespo', 'V', '21202500', 'admin', '04124362753', '$2y$10$xk7zzK./nW98EHkrwwuaFeUfR3CVWrRDQffmpZHPTIx1/NXsTGyWe', 3, 2, 'Xrjuwn6nhrYrdtCdZbcV23XgqzPVXgy4svOaHXKW4NdaEycvc1ZwxVfrdATM', '2017-12-04 04:00:00', '2017-12-06 17:17:34');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`id_acceso`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`id_area`),
  ADD KEY `area_departamento_id_foreign` (`departamento_id`);

--
-- Indices de la tabla `com_configs`
--
ALTER TABLE `com_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `com_departamentos`
--
ALTER TABLE `com_departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `com_insumos`
--
ALTER TABLE `com_insumos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `com_insumos_id_unidad_foreign` (`id_unidad`);

--
-- Indices de la tabla `com_ordenes`
--
ALTER TABLE `com_ordenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `com_ordenes_detalles`
--
ALTER TABLE `com_ordenes_detalles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `com_ordenes_detalles_com_ordenes_id_foreign` (`com_ordenes_id`);

--
-- Indices de la tabla `com_provees`
--
ALTER TABLE `com_provees`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `com_requisiciones`
--
ALTER TABLE `com_requisiciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `com_requisiciones_departamento_id_foreign` (`departamento_id`);

--
-- Indices de la tabla `com_requisicion_detalles`
--
ALTER TABLE `com_requisicion_detalles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `com_requisicion_detalles_com_insumo_id_foreign` (`com_insumo_id`),
  ADD KEY `com_requisicion_detalles_com_req_id_foreign` (`com_req_id`);

--
-- Indices de la tabla `com_unidades`
--
ALTER TABLE `com_unidades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cont_asientos`
--
ALTER TABLE `cont_asientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cont_asientos_cont_configs_id_foreign` (`cont_configs_id`);

--
-- Indices de la tabla `cont_asiento_detalles`
--
ALTER TABLE `cont_asiento_detalles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cont_asiento_detalles_cont_asientos_id_foreign` (`cont_asientos_id`),
  ADD KEY `cont_asiento_detalles_cont__master_accounts_id_foreign` (`cont__master_accounts_id`);

--
-- Indices de la tabla `cont_auxiliares`
--
ALTER TABLE `cont_auxiliares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cont_auxiliares_cont_configs_id_foreign` (`cont_configs_id`),
  ADD KEY `cont_auxiliares_cont__master_accounts_id_foreign` (`cont__master_accounts_id`);

--
-- Indices de la tabla `cont_configs`
--
ALTER TABLE `cont_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cont__master_accounts`
--
ALTER TABLE `cont__master_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cont__master_accounts_cont_configs_id_foreign` (`cont_configs_id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sub_area`
--
ALTER TABLE `sub_area`
  ADD PRIMARY KEY (`id_sub_area`),
  ADD KEY `sub_area_area_id_foreign` (`area_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_rol_id_foreign` (`rol_id`),
  ADD KEY `users_departamento_id_foreign` (`departamento_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `id_acceso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `id_area` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `com_configs`
--
ALTER TABLE `com_configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `com_departamentos`
--
ALTER TABLE `com_departamentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `com_insumos`
--
ALTER TABLE `com_insumos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `com_ordenes`
--
ALTER TABLE `com_ordenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `com_ordenes_detalles`
--
ALTER TABLE `com_ordenes_detalles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `com_provees`
--
ALTER TABLE `com_provees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `com_requisiciones`
--
ALTER TABLE `com_requisiciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `com_requisicion_detalles`
--
ALTER TABLE `com_requisicion_detalles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `com_unidades`
--
ALTER TABLE `com_unidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cont_asientos`
--
ALTER TABLE `cont_asientos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cont_asiento_detalles`
--
ALTER TABLE `cont_asiento_detalles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cont_auxiliares`
--
ALTER TABLE `cont_auxiliares`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `cont_configs`
--
ALTER TABLE `cont_configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cont__master_accounts`
--
ALTER TABLE `cont__master_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_departamento` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `sub_area`
--
ALTER TABLE `sub_area`
  MODIFY `id_sub_area` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id_departamento`);

--
-- Filtros para la tabla `com_insumos`
--
ALTER TABLE `com_insumos`
  ADD CONSTRAINT `com_insumos_id_unidad_foreign` FOREIGN KEY (`id_unidad`) REFERENCES `com_unidades` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `com_ordenes_detalles`
--
ALTER TABLE `com_ordenes_detalles`
  ADD CONSTRAINT `com_ordenes_detalles_com_ordenes_id_foreign` FOREIGN KEY (`com_ordenes_id`) REFERENCES `com_ordenes` (`id`);

--
-- Filtros para la tabla `com_requisiciones`
--
ALTER TABLE `com_requisiciones`
  ADD CONSTRAINT `com_requisiciones_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `com_departamentos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `com_requisicion_detalles`
--
ALTER TABLE `com_requisicion_detalles`
  ADD CONSTRAINT `com_requisicion_detalles_com_insumo_id_foreign` FOREIGN KEY (`com_insumo_id`) REFERENCES `com_insumos` (`id`),
  ADD CONSTRAINT `com_requisicion_detalles_com_req_id_foreign` FOREIGN KEY (`com_req_id`) REFERENCES `com_requisiciones` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `cont_asientos`
--
ALTER TABLE `cont_asientos`
  ADD CONSTRAINT `cont_asientos_cont_configs_id_foreign` FOREIGN KEY (`cont_configs_id`) REFERENCES `cont_configs` (`id`);

--
-- Filtros para la tabla `cont_asiento_detalles`
--
ALTER TABLE `cont_asiento_detalles`
  ADD CONSTRAINT `cont_asiento_detalles_cont__master_accounts_id_foreign` FOREIGN KEY (`cont__master_accounts_id`) REFERENCES `cont__master_accounts` (`id`),
  ADD CONSTRAINT `cont_asiento_detalles_cont_asientos_id_foreign` FOREIGN KEY (`cont_asientos_id`) REFERENCES `cont_asientos` (`id`);

--
-- Filtros para la tabla `cont_auxiliares`
--
ALTER TABLE `cont_auxiliares`
  ADD CONSTRAINT `cont_auxiliares_cont__master_accounts_id_foreign` FOREIGN KEY (`cont__master_accounts_id`) REFERENCES `cont__master_accounts` (`id`),
  ADD CONSTRAINT `cont_auxiliares_cont_configs_id_foreign` FOREIGN KEY (`cont_configs_id`) REFERENCES `cont_configs` (`id`);

--
-- Filtros para la tabla `cont__master_accounts`
--
ALTER TABLE `cont__master_accounts`
  ADD CONSTRAINT `cont__master_accounts_cont_configs_id_foreign` FOREIGN KEY (`cont_configs_id`) REFERENCES `cont_configs` (`id`);

--
-- Filtros para la tabla `sub_area`
--
ALTER TABLE `sub_area`
  ADD CONSTRAINT `sub_area_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `area` (`id_area`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id_departamento`),
  ADD CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
