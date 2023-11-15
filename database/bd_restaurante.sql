-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2023 a las 16:15:42
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

drop database if exists restaurante;
create database restaurante;
use restaurante;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria_platos`
--

CREATE TABLE `categoria_platos` (
  `IdCategoriaPlatos` bigint(20) UNSIGNED NOT NULL,
  `NombreCategoriaPlato` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria_platos`
--

INSERT INTO `categoria_platos` (`IdCategoriaPlatos`, `NombreCategoriaPlato`, `created_at`, `updated_at`) VALUES
(1, 'Ceviches', NULL, NULL),
(2, 'Fondos', NULL, NULL),
(3, 'Duos', NULL, NULL),
(4, 'Trios', NULL, NULL),
(5, 'Bebidas', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IdCliente` bigint(20) UNSIGNED NOT NULL,
  `Dni` char(8) NOT NULL,
  `NombresCliente` varchar(191) NOT NULL,
  `ApellidosCliente` varchar(191) NOT NULL,
  `NroTelefono` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `Dni`, `NombresCliente`, `ApellidosCliente`, `NroTelefono`, `created_at`, `updated_at`) VALUES
(1, '75359962', 'Sthephanie Carolina', 'Cabrera Honorio', '974139283', NULL, NULL),
(2, '77493445', 'Keyco Clesehisy', 'Chavez Quintana', '970679846', NULL, NULL),
(3, '70492974', 'Angel Martin', 'Amaya Cruz', '920842645', NULL, NULL),
(4, '76341435', 'Willian Samuel', 'Miranda Huaman', '918661835', NULL, NULL),
(5, '75465390', 'Jorge Andres', 'Cotrina Oliva', '952569688', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ingresos`
--

CREATE TABLE `detalle_ingresos` (
  `IdDetalleIngreso` bigint(20) UNSIGNED NOT NULL,
  `IdIngreso` bigint(20) UNSIGNED NOT NULL,
  `IdProducto` bigint(20) UNSIGNED NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `CostoUnitario` double(8,2) NOT NULL,
  `CostoTotal` decimal(10,5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_ingresos`
--

INSERT INTO `detalle_ingresos` (`IdDetalleIngreso`, `IdIngreso`, `IdProducto`, `Cantidad`, `CostoUnitario`, `CostoTotal`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 50, 5.00, '250.00000', '2023-11-15 19:43:42', '2023-11-15 19:43:42'),
(2, 1, 2, 10, 11.50, '115.00000', '2023-11-15 19:43:42', '2023-11-15 19:43:42'),
(3, 1, 3, 2, 31.00, '62.00000', '2023-11-15 19:43:42', '2023-11-15 19:43:42'),
(4, 1, 4, 5, 10.90, '54.50000', '2023-11-15 19:43:42', '2023-11-15 19:43:42'),
(5, 1, 5, 10, 2.20, '22.00000', '2023-11-15 19:43:42', '2023-11-15 19:43:42'),
(6, 1, 6, 5, 4.00, '20.00000', '2023-11-15 19:43:42', '2023-11-15 19:43:42'),
(7, 1, 7, 2, 12.30, '24.60000', '2023-11-15 19:43:42', '2023-11-15 19:43:42'),
(8, 1, 8, 1, 24.90, '24.90000', '2023-11-15 19:43:42', '2023-11-15 19:43:42'),
(9, 1, 9, 5, 5.70, '28.50000', '2023-11-15 19:43:42', '2023-11-15 19:43:42'),
(10, 1, 10, 10, 2.10, '21.00000', '2023-11-15 19:43:42', '2023-11-15 19:43:42'),
(11, 1, 11, 1, 25.00, '25.00000', '2023-11-15 19:43:42', '2023-11-15 19:43:42'),
(12, 1, 12, 5, 2.50, '12.50000', '2023-11-15 19:43:42', '2023-11-15 19:43:42'),
(13, 1, 13, 1, 47.90, '47.90000', '2023-11-15 19:43:42', '2023-11-15 19:43:42'),
(14, 1, 14, 2, 4.80, '9.60000', '2023-11-15 19:43:42', '2023-11-15 19:43:42'),
(15, 1, 15, 10, 16.90, '169.00000', '2023-11-15 19:43:42', '2023-11-15 19:43:42'),
(16, 1, 16, 3, 3.60, '10.80000', '2023-11-15 19:43:42', '2023-11-15 19:43:42'),
(17, 2, 17, 5, 20.00, '100.00000', '2023-11-15 19:45:36', '2023-11-15 19:45:36'),
(18, 2, 18, 15, 6.90, '103.50000', '2023-11-15 19:45:36', '2023-11-15 19:45:36'),
(19, 2, 19, 3, 49.90, '149.70000', '2023-11-15 19:45:36', '2023-11-15 19:45:36'),
(20, 3, 20, 10, 2.30, '23.00000', '2023-11-15 19:47:50', '2023-11-15 19:47:50'),
(21, 3, 21, 10, 0.60, '6.00000', '2023-11-15 19:47:50', '2023-11-15 19:47:50'),
(22, 3, 22, 3, 6.00, '18.00000', '2023-11-15 19:47:50', '2023-11-15 19:47:50'),
(23, 3, 23, 10, 3.40, '34.00000', '2023-11-15 19:47:50', '2023-11-15 19:47:50'),
(24, 3, 24, 5, 10.70, '53.50000', '2023-11-15 19:47:50', '2023-11-15 19:47:50'),
(25, 3, 25, 4, 23.00, '92.00000', '2023-11-15 19:47:50', '2023-11-15 19:47:50'),
(26, 4, 26, 10, 31.90, '319.00000', '2023-11-15 20:01:47', '2023-11-15 20:01:47'),
(27, 4, 27, 10, 1.00, '10.00000', '2023-11-15 20:01:47', '2023-11-15 20:01:47'),
(28, 4, 28, 8, 10.90, '87.20000', '2023-11-15 20:01:47', '2023-11-15 20:01:47'),
(29, 4, 29, 5, 19.80, '99.00000', '2023-11-15 20:01:47', '2023-11-15 20:01:47'),
(30, 4, 30, 4, 9.10, '36.40000', '2023-11-15 20:01:47', '2023-11-15 20:01:47'),
(31, 4, 31, 8, 5.00, '40.00000', '2023-11-15 20:01:47', '2023-11-15 20:01:47'),
(32, 4, 32, 8, 5.00, '40.00000', '2023-11-15 20:01:47', '2023-11-15 20:01:47'),
(33, 4, 33, 5, 4.80, '24.00000', '2023-11-15 20:01:47', '2023-11-15 20:01:47'),
(34, 4, 34, 50, 5.30, '265.00000', '2023-11-15 20:01:47', '2023-11-15 20:01:47'),
(35, 5, 35, 5, 2.10, '10.50000', '2023-11-15 20:04:22', '2023-11-15 20:04:22'),
(36, 5, 36, 5, 2.00, '10.00000', '2023-11-15 20:04:22', '2023-11-15 20:04:22'),
(37, 5, 37, 5, 5.50, '27.50000', '2023-11-15 20:04:22', '2023-11-15 20:04:22'),
(38, 5, 38, 2, 11.10, '22.20000', '2023-11-15 20:04:22', '2023-11-15 20:04:22'),
(39, 5, 39, 5, 2.60, '13.00000', '2023-11-15 20:04:22', '2023-11-15 20:04:22'),
(40, 5, 40, 4, 15.00, '60.00000', '2023-11-15 20:04:22', '2023-11-15 20:04:22'),
(41, 5, 41, 2, 21.90, '43.80000', '2023-11-15 20:04:22', '2023-11-15 20:04:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ordens`
--

CREATE TABLE `detalle_ordens` (
  `IdDetalleOrdens` bigint(20) UNSIGNED NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `IdOrdens` bigint(20) UNSIGNED NOT NULL,
  `IdPlato` bigint(20) UNSIGNED NOT NULL,
  `IdMesa` bigint(20) UNSIGNED NOT NULL,
  `CostoTotal` decimal(10,5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_ordens`
--

INSERT INTO `detalle_ordens` (`IdDetalleOrdens`, `Cantidad`, `IdOrdens`, `IdPlato`, `IdMesa`, `CostoTotal`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 4, '50.00000', '2023-11-15 20:07:38', '2023-11-15 20:07:38'),
(2, 3, 1, 4, 4, '75.00000', '2023-11-15 20:07:38', '2023-11-15 20:07:38'),
(3, 1, 1, 6, 4, '25.00000', '2023-11-15 20:07:38', '2023-11-15 20:07:38'),
(4, 2, 1, 10, 4, '20.00000', '2023-11-15 20:07:38', '2023-11-15 20:07:38'),
(5, 2, 1, 11, 4, '24.00000', '2023-11-15 20:07:38', '2023-11-15 20:07:38'),
(6, 1, 1, 12, 4, '10.00000', '2023-11-15 20:07:38', '2023-11-15 20:07:38'),
(7, 1, 2, 3, 2, '30.00000', '2023-11-15 20:08:45', '2023-11-15 20:08:45'),
(8, 2, 2, 5, 2, '50.00000', '2023-11-15 20:08:45', '2023-11-15 20:08:45'),
(9, 1, 2, 8, 2, '25.00000', '2023-11-15 20:08:45', '2023-11-15 20:08:45'),
(10, 3, 2, 10, 2, '30.00000', '2023-11-15 20:08:45', '2023-11-15 20:08:45'),
(11, 2, 2, 11, 2, '24.00000', '2023-11-15 20:08:45', '2023-11-15 20:08:45'),
(12, 2, 3, 9, 9, '60.00000', '2023-11-15 20:11:22', '2023-11-15 20:11:22'),
(13, 3, 3, 6, 9, '75.00000', '2023-11-15 20:11:22', '2023-11-15 20:11:22'),
(14, 1, 3, 5, 9, '25.00000', '2023-11-15 20:11:22', '2023-11-15 20:11:22'),
(15, 3, 3, 10, 9, '30.00000', '2023-11-15 20:11:22', '2023-11-15 20:11:22'),
(16, 3, 3, 11, 9, '36.00000', '2023-11-15 20:11:22', '2023-11-15 20:11:22'),
(17, 2, 3, 12, 9, '20.00000', '2023-11-15 20:11:22', '2023-11-15 20:11:22'),
(18, 5, 4, 1, 10, '125.00000', '2023-11-15 20:14:21', '2023-11-15 20:14:21'),
(19, 3, 4, 4, 10, '75.00000', '2023-11-15 20:14:21', '2023-11-15 20:14:21'),
(20, 2, 4, 5, 10, '50.00000', '2023-11-15 20:14:21', '2023-11-15 20:14:21'),
(21, 1, 4, 7, 10, '30.00000', '2023-11-15 20:14:21', '2023-11-15 20:14:21'),
(22, 1, 4, 6, 10, '25.00000', '2023-11-15 20:14:21', '2023-11-15 20:14:21'),
(23, 2, 4, 8, 10, '50.00000', '2023-11-15 20:14:21', '2023-11-15 20:14:21'),
(24, 1, 4, 9, 10, '30.00000', '2023-11-15 20:14:21', '2023-11-15 20:14:21'),
(25, 10, 4, 10, 10, '100.00000', '2023-11-15 20:14:21', '2023-11-15 20:14:21'),
(26, 5, 4, 11, 10, '60.00000', '2023-11-15 20:14:21', '2023-11-15 20:14:21'),
(27, 5, 4, 12, 10, '50.00000', '2023-11-15 20:14:21', '2023-11-15 20:14:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_reservaciones`
--

CREATE TABLE `detalle_reservaciones` (
  `IdDetalleReservacion` bigint(20) UNSIGNED NOT NULL,
  `IdReservacion` bigint(20) UNSIGNED NOT NULL,
  `IdDetalleOrdens` bigint(20) UNSIGNED NOT NULL,
  `IdCliente` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_reservaciones`
--

INSERT INTO `detalle_reservaciones` (`IdDetalleReservacion`, `IdReservacion`, `IdDetalleOrdens`, `IdCliente`, `created_at`, `updated_at`) VALUES
(1, 1, 12, 3, '2023-11-15 20:11:22', '2023-11-15 20:11:22'),
(2, 1, 13, 3, '2023-11-15 20:11:22', '2023-11-15 20:11:22'),
(3, 1, 14, 3, '2023-11-15 20:11:22', '2023-11-15 20:11:22'),
(4, 1, 15, 3, '2023-11-15 20:11:22', '2023-11-15 20:11:22'),
(5, 1, 16, 3, '2023-11-15 20:11:22', '2023-11-15 20:11:22'),
(6, 1, 17, 3, '2023-11-15 20:11:22', '2023-11-15 20:11:22'),
(7, 2, 18, 1, '2023-11-15 20:14:21', '2023-11-15 20:14:21'),
(8, 2, 19, 1, '2023-11-15 20:14:21', '2023-11-15 20:14:21'),
(9, 2, 20, 1, '2023-11-15 20:14:21', '2023-11-15 20:14:21'),
(10, 2, 21, 1, '2023-11-15 20:14:21', '2023-11-15 20:14:21'),
(11, 2, 22, 1, '2023-11-15 20:14:21', '2023-11-15 20:14:21'),
(12, 2, 23, 1, '2023-11-15 20:14:21', '2023-11-15 20:14:21'),
(13, 2, 24, 1, '2023-11-15 20:14:21', '2023-11-15 20:14:21'),
(14, 2, 25, 1, '2023-11-15 20:14:21', '2023-11-15 20:14:21'),
(15, 2, 26, 1, '2023-11-15 20:14:21', '2023-11-15 20:14:21'),
(16, 2, 27, 1, '2023-11-15 20:14:21', '2023-11-15 20:14:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_mesas`
--

CREATE TABLE `estado_mesas` (
  `IdEstadoMesas` bigint(20) UNSIGNED NOT NULL,
  `DescripcionEstadoMesas` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estado_mesas`
--

INSERT INTO `estado_mesas` (`IdEstadoMesas`, `DescripcionEstadoMesas`, `created_at`, `updated_at`) VALUES
(1, 'Libre', NULL, NULL),
(2, 'Ocupada', NULL, NULL),
(3, 'Reservada', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_ordens`
--

CREATE TABLE `estado_ordens` (
  `IdEstadoOrdens` bigint(20) UNSIGNED NOT NULL,
  `DescripcionEstadoOrdens` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estado_ordens`
--

INSERT INTO `estado_ordens` (`IdEstadoOrdens`, `DescripcionEstadoOrdens`, `created_at`, `updated_at`) VALUES
(1, 'En Proceso', NULL, NULL),
(2, 'Atendida', NULL, NULL),
(3, 'Anulada', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_ventas`
--

CREATE TABLE `estado_ventas` (
  `IdEstadoVentas` bigint(20) UNSIGNED NOT NULL,
  `DescripcionEstadoVentas` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estado_ventas`
--

INSERT INTO `estado_ventas` (`IdEstadoVentas`, `DescripcionEstadoVentas`, `created_at`, `updated_at`) VALUES
(1, 'Pendiente', NULL, NULL),
(2, 'Realizada', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresos`
--

CREATE TABLE `ingresos` (
  `IdIngreso` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ingresos`
--

INSERT INTO `ingresos` (`IdIngreso`, `created_at`, `updated_at`) VALUES
(1, '2023-11-15 19:43:42', '2023-11-15 19:43:42'),
(2, '2023-11-15 19:45:36', '2023-11-15 19:45:36'),
(3, '2023-11-15 19:47:50', '2023-11-15 19:47:50'),
(4, '2023-11-15 20:01:47', '2023-11-15 20:01:47'),
(5, '2023-11-15 20:04:22', '2023-11-15 20:04:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `IdMesa` bigint(20) UNSIGNED NOT NULL,
  `IdEstadoMesas` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`IdMesa`, `IdEstadoMesas`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL),
(3, 1, NULL, NULL),
(4, 2, NULL, NULL),
(5, 1, NULL, NULL),
(6, 1, NULL, NULL),
(7, 1, NULL, NULL),
(8, 1, NULL, NULL),
(9, 3, NULL, NULL),
(10, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_05_21_100000_create_teams_table', 1),
(7, '2020_05_21_200000_create_team_user_table', 1),
(8, '2020_05_21_300000_create_team_invitations_table', 1),
(9, '2023_08_25_161538_create_sessions_table', 1),
(10, '2023_09_11_010731_ingresos', 1),
(11, '2023_09_11_010746_productos', 1),
(12, '2023_09_11_010854_detalle_ingresos', 1),
(13, '2023_09_11_010923_categoria_platos', 1),
(14, '2023_09_11_010933_platos', 1),
(15, '2023_09_11_011024_estado_mesas', 1),
(16, '2023_09_11_011035_mesas', 1),
(17, '2023_09_11_011049_estado_ordens', 1),
(18, '2023_09_11_011058_ordens', 1),
(19, '2023_09_11_011454_detalle_ordens', 1),
(20, '2023_09_11_011523_recibos', 1),
(21, '2023_09_11_011534_clientes', 1),
(22, '2023_09_11_011545_reservaciones', 1),
(23, '2023_09_11_011603_detalle_reservaciones', 1),
(24, '2023_09_11_035339_add_rol_to_users_table', 1),
(25, '2023_09_18_005953_create_permission_tables', 1),
(26, '2023_10_13_150742_presupuestos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(4, 'App\\Models\\User', 4),
(4, 'App\\Models\\User', 5),
(5, 'App\\Models\\User', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordens`
--

CREATE TABLE `ordens` (
  `IdOrdens` bigint(20) UNSIGNED NOT NULL,
  `IdMesa` bigint(20) UNSIGNED NOT NULL,
  `IdEstadoOrdens` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ordens`
--

INSERT INTO `ordens` (`IdOrdens`, `IdMesa`, `IdEstadoOrdens`, `created_at`, `updated_at`) VALUES
(1, 4, 1, '2023-11-15 20:07:38', '2023-11-15 20:07:38'),
(2, 2, 1, '2023-11-15 20:08:45', '2023-11-15 20:08:45'),
(3, 9, 1, '2023-11-15 20:11:22', '2023-11-15 20:11:22'),
(4, 10, 1, '2023-11-15 20:14:21', '2023-11-15 20:14:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'ver-rol', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(2, 'crear-rol', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(3, 'editar-rol', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(4, 'borrar-rol', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(5, 'ver-usuario', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(6, 'crear-usuario', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(7, 'editar-usuario', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(8, 'borrar-usuario', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(9, 'ver-producto', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(10, 'crear-producto', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(11, 'editar-producto', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(12, 'borrar-producto', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(13, 'ver-presupuesto', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(14, 'crear-presupuesto', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(15, 'editar-presupuesto', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(16, 'borrar-presupuesto', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(17, 'ver-ingreso', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(18, 'crear-ingreso', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(19, 'editar-ingreso', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(20, 'borrar-ingreso', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(21, 'ver-plato', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(22, 'crear-plato', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(23, 'editar-plato', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(24, 'borrar-plato', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(25, 'ver-mesa', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(26, 'crear-mesa', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(27, 'editar-mesa', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(28, 'borrar-mesa', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(29, 'ver-pedido', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(30, 'crear-pedido', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(31, 'editar-pedido', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(32, 'borrar-pedido', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(33, 'ver-cliente', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(34, 'crear-cliente', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(35, 'editar-cliente', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(36, 'borrar-cliente', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(37, 'ver-reservacion', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(38, 'crear-reservacion', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(39, 'editar-reservacion', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(40, 'borrar-reservacion', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(41, 'ver-venta', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(42, 'crear-venta', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(43, 'editar-venta', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(44, 'borrar-venta', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(45, 'ver-reporte', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(46, 'crear-reporte', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(47, 'editar-reporte', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59'),
(48, 'borrar-reporte', 'web', '2023-11-15 09:09:59', '2023-11-15 09:09:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `IdPlato` bigint(20) UNSIGNED NOT NULL,
  `NombrePlato` varchar(191) NOT NULL,
  `PrecioPlato` double(8,2) NOT NULL,
  `IdCategoriaPlatos` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`IdPlato`, `NombrePlato`, `PrecioPlato`, `IdCategoriaPlatos`, `created_at`, `updated_at`) VALUES
(1, 'Ceviche Mixto', 25.00, 1, NULL, NULL),
(2, 'Ceviche de Pota', 25.00, 1, NULL, NULL),
(3, 'Sudado de Tramboyo', 30.00, 2, NULL, NULL),
(4, 'Arroz con Mariscos', 25.00, 2, NULL, NULL),
(5, 'Chicharron', 25.00, 2, NULL, NULL),
(6, 'Malaya', 25.00, 2, NULL, NULL),
(7, 'Parihuela', 30.00, 2, NULL, NULL),
(8, 'Duo Marino (ceviche + chicharron)', 25.00, 3, NULL, NULL),
(9, 'Trio Marino (ceviche + chicharron + arroz con marisco)', 30.00, 4, NULL, NULL),
(10, 'Jugo de Maracuya', 10.00, 5, NULL, NULL),
(11, 'Jugo de Naranja', 12.00, 5, NULL, NULL),
(12, 'Cebada', 10.00, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presupuestos`
--

CREATE TABLE `presupuestos` (
  `IdPresupuesto` bigint(20) UNSIGNED NOT NULL,
  `IdPlato` bigint(20) UNSIGNED NOT NULL,
  `IdProducto` bigint(20) UNSIGNED NOT NULL,
  `Cantidad` decimal(10,5) NOT NULL,
  `CostoTotal` decimal(10,5) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `presupuestos`
--

INSERT INTO `presupuestos` (`IdPresupuesto`, `IdPlato`, `IdProducto`, `Cantidad`, `CostoTotal`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '0.01030', '0.11845', '2023-11-15 18:39:46', '2023-11-15 18:39:46'),
(2, 1, 4, '0.21000', '2.28900', '2023-11-15 18:39:46', '2023-11-15 18:39:46'),
(3, 1, 5, '0.01000', '0.02200', '2023-11-15 18:39:46', '2023-11-15 18:39:46'),
(4, 1, 6, '0.05000', '0.20000', '2023-11-15 18:39:46', '2023-11-15 18:39:46'),
(5, 1, 15, '1.25000', '21.12500', '2023-11-15 18:39:46', '2023-11-15 18:39:46'),
(6, 2, 2, '0.01030', '0.11845', '2023-11-15 18:41:46', '2023-11-15 18:41:46'),
(7, 2, 4, '0.21000', '2.28900', '2023-11-15 18:41:46', '2023-11-15 18:41:46'),
(8, 2, 5, '0.01000', '0.02200', '2023-11-15 18:41:46', '2023-11-15 18:41:46'),
(9, 2, 6, '0.05000', '0.20000', '2023-11-15 18:41:46', '2023-11-15 18:41:46'),
(10, 2, 25, '0.75000', '17.25000', '2023-11-15 18:41:46', '2023-11-15 18:41:46'),
(11, 3, 17, '1.00000', '20.00000', '2023-11-15 18:45:57', '2023-11-15 18:45:57'),
(12, 3, 20, '0.12500', '0.28750', '2023-11-15 18:45:57', '2023-11-15 18:45:57'),
(13, 3, 7, '0.01400', '0.17220', '2023-11-15 18:45:57', '2023-11-15 18:45:57'),
(14, 3, 22, '0.00038', '0.00225', '2023-11-15 18:45:57', '2023-11-15 18:45:57'),
(15, 3, 4, '0.21000', '2.28900', '2023-11-15 18:45:57', '2023-11-15 18:45:57'),
(16, 3, 9, '0.50000', '2.85000', '2023-11-15 18:45:57', '2023-11-15 18:45:57'),
(17, 3, 23, '0.13500', '0.45900', '2023-11-15 18:45:57', '2023-11-15 18:45:57'),
(18, 3, 5, '0.01000', '0.02200', '2023-11-15 18:45:57', '2023-11-15 18:45:57'),
(19, 3, 16, '0.01000', '0.03600', '2023-11-15 18:45:57', '2023-11-15 18:45:57'),
(20, 3, 6, '0.05000', '0.20000', '2023-11-15 18:45:57', '2023-11-15 18:45:57'),
(21, 3, 24, '0.07500', '0.80250', '2023-11-15 18:45:57', '2023-11-15 18:45:57'),
(22, 3, 27, '0.25000', '0.25000', '2023-11-15 18:45:57', '2023-11-15 18:45:57'),
(23, 4, 2, '0.01540', '0.17710', '2023-11-15 18:49:54', '2023-11-15 18:49:54'),
(24, 4, 6, '0.05000', '0.20000', '2023-11-15 18:49:54', '2023-11-15 18:49:54'),
(25, 4, 4, '0.21000', '2.28900', '2023-11-15 18:49:54', '2023-11-15 18:49:54'),
(26, 4, 7, '0.03000', '0.36900', '2023-11-15 18:49:54', '2023-11-15 18:49:54'),
(27, 4, 9, '0.50000', '2.85000', '2023-11-15 18:49:54', '2023-11-15 18:49:54'),
(28, 4, 10, '0.06250', '0.13125', '2023-11-15 18:49:54', '2023-11-15 18:49:54'),
(29, 4, 11, '0.00390', '0.09750', '2023-11-15 18:49:54', '2023-11-15 18:49:54'),
(30, 4, 12, '0.25000', '0.62500', '2023-11-15 18:49:54', '2023-11-15 18:49:54'),
(31, 4, 13, '0.12500', '5.98750', '2023-11-15 18:49:54', '2023-11-15 18:49:54'),
(32, 4, 15, '1.00000', '16.90000', '2023-11-15 18:49:54', '2023-11-15 18:49:54'),
(33, 4, 1, '0.25000', '1.25000', '2023-11-15 18:49:54', '2023-11-15 18:49:54'),
(34, 4, 20, '0.01250', '0.02875', '2023-11-15 18:49:54', '2023-11-15 18:49:54'),
(35, 4, 16, '0.01000', '0.03600', '2023-11-15 18:49:54', '2023-11-15 18:49:54'),
(36, 4, 5, '0.01000', '0.02200', '2023-11-15 18:49:54', '2023-11-15 18:49:54'),
(37, 5, 2, '0.01540', '0.17710', '2023-11-15 18:52:26', '2023-11-15 18:52:26'),
(38, 5, 6, '0.05000', '0.20000', '2023-11-15 18:52:26', '2023-11-15 18:52:26'),
(39, 5, 4, '0.21000', '2.28900', '2023-11-15 18:52:26', '2023-11-15 18:52:26'),
(40, 5, 20, '0.01250', '0.02875', '2023-11-15 18:52:26', '2023-11-15 18:52:26'),
(41, 5, 16, '0.01000', '0.03600', '2023-11-15 18:52:26', '2023-11-15 18:52:26'),
(42, 5, 5, '0.01000', '0.02200', '2023-11-15 18:52:26', '2023-11-15 18:52:26'),
(43, 5, 30, '0.06250', '0.56875', '2023-11-15 18:52:26', '2023-11-15 18:52:26'),
(44, 5, 18, '0.12500', '0.86250', '2023-11-15 18:52:26', '2023-11-15 18:52:26'),
(45, 6, 2, '0.01540', '0.17710', '2023-11-15 18:54:10', '2023-11-15 18:54:10'),
(46, 6, 8, '0.03100', '0.77190', '2023-11-15 18:54:10', '2023-11-15 18:54:10'),
(47, 6, 12, '0.25000', '0.62500', '2023-11-15 18:54:10', '2023-11-15 18:54:10'),
(48, 6, 16, '0.01000', '0.03600', '2023-11-15 18:54:10', '2023-11-15 18:54:10'),
(49, 6, 5, '0.01000', '0.02200', '2023-11-15 18:54:10', '2023-11-15 18:54:10'),
(50, 6, 14, '0.06250', '0.30000', '2023-11-15 18:54:10', '2023-11-15 18:54:10'),
(51, 6, 26, '0.75000', '23.92500', '2023-11-15 18:54:10', '2023-11-15 18:54:10'),
(52, 7, 19, '0.06250', '3.11875', '2023-11-15 18:58:11', '2023-11-15 18:58:11'),
(53, 7, 15, '1.25000', '21.12500', '2023-11-15 18:58:11', '2023-11-15 18:58:11'),
(54, 7, 28, '0.12500', '1.36250', '2023-11-15 18:58:11', '2023-11-15 18:58:11'),
(55, 7, 29, '0.08300', '1.64340', '2023-11-15 18:58:11', '2023-11-15 18:58:11'),
(56, 7, 6, '0.05000', '0.20000', '2023-11-15 18:58:11', '2023-11-15 18:58:11'),
(57, 7, 9, '0.50000', '2.85000', '2023-11-15 18:58:11', '2023-11-15 18:58:11'),
(58, 7, 7, '0.03000', '0.36900', '2023-11-15 18:58:11', '2023-11-15 18:58:11'),
(59, 7, 8, '0.03100', '0.77190', '2023-11-15 18:58:11', '2023-11-15 18:58:11'),
(60, 7, 13, '0.12500', '5.98750', '2023-11-15 18:58:11', '2023-11-15 18:58:11'),
(61, 7, 22, '0.00038', '0.00225', '2023-11-15 18:58:11', '2023-11-15 18:58:11'),
(62, 7, 24, '0.07500', '0.80250', '2023-11-15 18:58:11', '2023-11-15 18:58:11'),
(63, 7, 27, '0.25000', '0.25000', '2023-11-15 18:58:11', '2023-11-15 18:58:11'),
(64, 7, 3, '0.01540', '0.47740', '2023-11-15 18:58:11', '2023-11-15 18:58:11'),
(65, 7, 16, '0.01000', '0.03600', '2023-11-15 18:58:11', '2023-11-15 18:58:11'),
(66, 7, 5, '0.01000', '0.02200', '2023-11-15 18:58:11', '2023-11-15 18:58:11'),
(67, 7, 23, '0.13500', '0.45900', '2023-11-15 18:58:11', '2023-11-15 18:58:11'),
(68, 7, 21, '0.25000', '0.15000', '2023-11-15 18:58:11', '2023-11-15 18:58:11'),
(69, 8, 2, '0.01309', '0.15054', '2023-11-15 19:04:15', '2023-11-15 19:04:15'),
(70, 8, 6, '0.04250', '0.17000', '2023-11-15 19:04:15', '2023-11-15 19:04:15'),
(71, 8, 4, '0.17850', '1.94565', '2023-11-15 19:04:15', '2023-11-15 19:04:15'),
(72, 8, 20, '0.01063', '0.02444', '2023-11-15 19:04:15', '2023-11-15 19:04:15'),
(73, 8, 16, '0.00850', '0.03060', '2023-11-15 19:04:15', '2023-11-15 19:04:15'),
(74, 8, 5, '0.00850', '0.01870', '2023-11-15 19:04:15', '2023-11-15 19:04:15'),
(75, 8, 30, '0.05313', '0.48344', '2023-11-15 19:04:15', '2023-11-15 19:04:15'),
(76, 8, 18, '0.10625', '0.73313', '2023-11-15 19:04:15', '2023-11-15 19:04:15'),
(77, 8, 6, '0.04250', '0.17000', '2023-11-15 19:04:15', '2023-11-15 19:04:15'),
(78, 8, 15, '0.75000', '12.67500', '2023-11-15 19:04:15', '2023-11-15 19:04:15'),
(79, 9, 2, '0.23909', '2.74948', '2023-11-15 19:29:21', '2023-11-15 19:29:21'),
(80, 9, 6, '0.06750', '0.27000', '2023-11-15 19:29:21', '2023-11-15 19:29:21'),
(81, 9, 20, '0.01063', '0.02444', '2023-11-15 19:29:21', '2023-11-15 19:29:21'),
(82, 9, 16, '0.01350', '0.04860', '2023-11-15 19:29:21', '2023-11-15 19:29:21'),
(83, 9, 5, '0.01350', '0.02970', '2023-11-15 19:29:21', '2023-11-15 19:29:21'),
(84, 9, 30, '0.05313', '0.48344', '2023-11-15 19:29:21', '2023-11-15 19:29:21'),
(85, 9, 18, '0.10625', '0.73313', '2023-11-15 19:29:21', '2023-11-15 19:29:21'),
(86, 9, 15, '1.00000', '16.90000', '2023-11-15 19:29:21', '2023-11-15 19:29:21'),
(87, 9, 7, '0.01500', '0.18450', '2023-11-15 19:29:21', '2023-11-15 19:29:21'),
(88, 9, 9, '0.25000', '1.42500', '2023-11-15 19:29:21', '2023-11-15 19:29:21'),
(89, 9, 10, '0.03125', '0.06563', '2023-11-15 19:29:21', '2023-11-15 19:29:21'),
(90, 9, 11, '0.00195', '0.04875', '2023-11-15 19:29:21', '2023-11-15 19:29:21'),
(91, 9, 12, '0.12500', '0.31250', '2023-11-15 19:29:21', '2023-11-15 19:29:21'),
(92, 9, 13, '0.06250', '2.99375', '2023-11-15 19:29:21', '2023-11-15 19:29:21'),
(93, 9, 1, '0.12500', '0.62500', '2023-11-15 19:29:21', '2023-11-15 19:29:21'),
(94, 10, 31, '1.00000', '5.00000', '2023-11-15 19:30:02', '2023-11-15 19:30:02'),
(95, 10, 34, '0.25000', '1.32500', '2023-11-15 19:30:02', '2023-11-15 19:30:02'),
(96, 11, 32, '1.00000', '5.00000', '2023-11-15 19:30:27', '2023-11-15 19:30:27'),
(97, 11, 34, '0.25000', '1.32500', '2023-11-15 19:30:27', '2023-11-15 19:30:27'),
(98, 12, 33, '1.00000', '4.80000', '2023-11-15 19:31:00', '2023-11-15 19:31:00'),
(99, 12, 34, '0.25000', '1.32500', '2023-11-15 19:31:00', '2023-11-15 19:31:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `IdProducto` bigint(20) UNSIGNED NOT NULL,
  `NombreProducto` varchar(191) NOT NULL,
  `Stock` int(11) NOT NULL,
  `PrecioProducto` double(8,2) NOT NULL,
  `IdUnidadMedida` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IdProducto`, `NombreProducto`, `Stock`, `PrecioProducto`, `IdUnidadMedida`, `created_at`, `updated_at`) VALUES
(1, 'Arroz', 50, 5.00, 2, NULL, '2023-11-15 19:43:42'),
(2, 'Aceite', 10, 11.50, 3, NULL, '2023-11-15 19:43:42'),
(3, 'Aceite de Oliva', 2, 31.00, 3, NULL, '2023-11-15 19:43:42'),
(4, 'Ajo', 5, 10.90, 2, NULL, '2023-11-15 19:43:42'),
(5, 'Sal', 10, 2.20, 2, NULL, '2023-11-15 19:43:42'),
(6, 'Cebolla', 5, 4.00, 2, NULL, '2023-11-15 19:43:42'),
(7, 'Aji Amarillo', 2, 12.30, 2, NULL, '2023-11-15 19:43:42'),
(8, 'Aji Panca', 1, 24.90, 2, NULL, '2023-11-15 19:43:42'),
(9, 'Tomate', 5, 5.70, 2, NULL, '2023-11-15 19:43:42'),
(10, 'Oregano', 10, 2.10, 1, NULL, '2023-11-15 19:43:42'),
(11, 'Hoja de Laurel', 1, 25.00, 2, NULL, '2023-11-15 19:43:42'),
(12, 'Achiote', 5, 2.50, 2, NULL, '2023-11-15 19:43:42'),
(13, 'Vino Blanco', 1, 47.90, 1, NULL, '2023-11-15 19:43:42'),
(14, 'Vinagre Blanco', 2, 4.80, 3, NULL, '2023-11-15 19:43:42'),
(15, 'Mixtura de Mariscos', 10, 16.90, 2, NULL, '2023-11-15 19:43:42'),
(16, 'Pimienta', 3, 3.60, 2, NULL, '2023-11-15 19:43:42'),
(17, 'Pescado Tramboyo', 5, 20.00, 2, NULL, '2023-11-15 19:45:36'),
(18, 'Pescado Bonito', 15, 6.90, 2, NULL, '2023-11-15 19:45:36'),
(19, 'Pescado Corvina', 3, 49.90, 2, NULL, '2023-11-15 19:45:36'),
(20, 'Culantro', 10, 2.30, 1, NULL, '2023-11-15 19:47:50'),
(21, 'Perejil', 10, 0.60, 1, NULL, '2023-11-15 19:47:50'),
(22, 'Kion', 3, 6.00, 2, NULL, '2023-11-15 19:47:50'),
(23, 'Limon', 10, 3.40, 2, NULL, '2023-11-15 19:47:50'),
(24, 'Pimiento', 5, 10.70, 2, NULL, '2023-11-15 19:47:50'),
(25, 'Pota', 4, 23.00, 2, NULL, '2023-11-15 19:47:50'),
(26, 'Malaya', 10, 31.90, 2, NULL, '2023-11-15 20:01:47'),
(27, 'Rocoto', 10, 1.00, 1, NULL, '2023-11-15 20:01:47'),
(28, 'Mejillones', 8, 10.90, 2, NULL, '2023-11-15 20:01:47'),
(29, 'Vieiras', 5, 19.80, 2, NULL, '2023-11-15 20:01:47'),
(30, 'Harina', 4, 9.10, 2, NULL, '2023-11-15 20:01:47'),
(31, 'Maracuya', 8, 5.00, 2, NULL, '2023-11-15 20:01:47'),
(32, 'Naranja', 8, 5.00, 2, NULL, '2023-11-15 20:01:47'),
(33, 'Cebada', 5, 4.80, 2, NULL, '2023-11-15 20:01:47'),
(34, 'Azucar', 50, 5.30, 2, NULL, '2023-11-15 20:01:47'),
(35, 'Papa', 5, 2.10, 2, NULL, '2023-11-15 20:04:22'),
(36, 'Camote', 5, 2.00, 2, NULL, '2023-11-15 20:04:22'),
(37, 'Yuca', 5, 5.50, 2, NULL, '2023-11-15 20:04:22'),
(38, 'Chicha de Jora', 2, 11.10, 3, NULL, '2023-11-15 20:04:22'),
(39, 'Maicena', 5, 2.60, 2, NULL, '2023-11-15 20:04:22'),
(40, 'Huevos', 4, 15.00, 1, NULL, '2023-11-15 20:04:22'),
(41, 'Cerveza Negra', 2, 21.90, 1, NULL, '2023-11-15 20:04:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservaciones`
--

CREATE TABLE `reservaciones` (
  `IdReservacion` bigint(20) UNSIGNED NOT NULL,
  `IdCliente` bigint(20) UNSIGNED NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `NroPersonas` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reservaciones`
--

INSERT INTO `reservaciones` (`IdReservacion`, `IdCliente`, `Fecha`, `Hora`, `NroPersonas`, `created_at`, `updated_at`) VALUES
(1, 3, '2023-12-15', '12:30:00', 5, '2023-11-15 20:10:23', '2023-11-15 20:10:23'),
(2, 1, '2023-12-18', '16:30:00', 10, '2023-11-15 20:12:32', '2023-11-15 20:12:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `guard_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Gerente General', 'web', '2023-11-15 09:11:20', '2023-11-15 09:11:20'),
(2, 'Gerente de Ventas', 'web', '2023-11-15 09:12:31', '2023-11-15 09:12:31'),
(3, 'Chef', 'web', '2023-11-15 09:14:24', '2023-11-15 09:14:24'),
(4, 'Asistente de Cocina', 'web', '2023-11-15 09:15:26', '2023-11-15 09:15:26'),
(5, 'Mesero', 'web', '2023-11-15 09:16:32', '2023-11-15 09:16:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(7, 5),
(8, 1),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(13, 3),
(14, 1),
(14, 2),
(14, 3),
(15, 1),
(15, 2),
(15, 3),
(16, 1),
(16, 2),
(16, 3),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(20, 2),
(21, 1),
(21, 3),
(21, 4),
(21, 5),
(22, 1),
(22, 3),
(23, 1),
(23, 3),
(24, 1),
(24, 3),
(25, 1),
(25, 5),
(26, 1),
(26, 5),
(27, 1),
(27, 5),
(28, 1),
(28, 5),
(29, 1),
(29, 4),
(29, 5),
(30, 1),
(30, 2),
(30, 5),
(31, 1),
(31, 4),
(31, 5),
(32, 1),
(32, 5),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(37, 5),
(38, 1),
(38, 2),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(44, 2),
(45, 1),
(46, 1),
(47, 1),
(48, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(191) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Ioba7YgcVFWv1pVzjEWMdpILFZYOhofZTYBwwZwI', 1, '192.168.1.102', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidnRQa3lYTnQyWU1VdGtZOXVQcEpoSGdGbnpGUWJEQTVZZ1lJeXEycyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjM5OiJodHRwOi8vMTkyLjE2OC4xLjEwMjo4MDAwL3Jlc2VydmFjaW9uZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1700061282);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `personal_team` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_invitations`
--

CREATE TABLE `team_invitations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `role` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `team_user`
--

CREATE TABLE `team_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documentos`
--

CREATE TABLE `tipo_documentos` (
  `IdTipoDocumento` bigint(20) UNSIGNED NOT NULL,
  `DescripcionTipoDocumento` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_documentos`
--

INSERT INTO `tipo_documentos` (`IdTipoDocumento`, `DescripcionTipoDocumento`, `created_at`, `updated_at`) VALUES
(1, 'Boleta', NULL, NULL),
(2, 'Factura', NULL, NULL),
(3, 'Recibo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medidas`
--

CREATE TABLE `unidad_medidas` (
  `IdUnidadMedida` bigint(20) UNSIGNED NOT NULL,
  `DescripcionUM` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `unidad_medidas`
--

INSERT INTO `unidad_medidas` (`IdUnidadMedida`, `DescripcionUM`, `created_at`, `updated_at`) VALUES
(1, 'Unidades', NULL, NULL),
(2, 'Kg', NULL, NULL),
(3, 'Litros', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Jhosep', 'admin@gmail.com', NULL, '$2y$10$XbArIKHLP8euJJz10bnsDeA8WLAlA5Fg0/jXor8txE7G8opkIkerW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Jorge', 'gventas@gmail.com', NULL, '$2y$10$2H/jjp4Ec/FRLzruS3oDuufREYANDrDxPmPOHvbC/H1lrzJOtTnCS', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Jose', 'chef@gmail.com', NULL, '$2y$10$EAjX9yyjzOaTR0FoD0rjhuP0alRvRHXdB2Jpc5P8c5BC574RUOiAK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Julio', 'asistentecocina1@gmail.com', NULL, '$2y$10$taxaOtjr3LIyQ9lvT.CPE.vKLg0FIcMdo7wIPTCFVUYHtAZtNiceK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Joao', 'asistentecocina2@gmail.com', NULL, '$2y$10$mTpVdjCWcwsr57Gpuzb06.M8MHK5eVSALSpDRmIKcl5M.kNxP2x8G', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Juan', 'mesero@gmail.com', NULL, '$2y$10$YjgFy2UIbpoXgmealmZl4eATDoBl4CKDZj1GHnQSCrOer9aEhXmt6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `IdVenta` bigint(20) UNSIGNED NOT NULL,
  `IdEstadoVentas` bigint(20) UNSIGNED NOT NULL,
  `IdDetalleOrdens` bigint(20) UNSIGNED NOT NULL,
  `IdTipoDocumento` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria_platos`
--
ALTER TABLE `categoria_platos`
  ADD PRIMARY KEY (`IdCategoriaPlatos`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `detalle_ingresos`
--
ALTER TABLE `detalle_ingresos`
  ADD PRIMARY KEY (`IdDetalleIngreso`),
  ADD KEY `detalle_ingresos_idingreso_foreign` (`IdIngreso`),
  ADD KEY `detalle_ingresos_idproducto_foreign` (`IdProducto`);

--
-- Indices de la tabla `detalle_ordens`
--
ALTER TABLE `detalle_ordens`
  ADD PRIMARY KEY (`IdDetalleOrdens`),
  ADD KEY `detalle_ordens_idordens_foreign` (`IdOrdens`),
  ADD KEY `detalle_ordens_idplato_foreign` (`IdPlato`),
  ADD KEY `detalle_ordens_idmesa_foreign` (`IdMesa`);

--
-- Indices de la tabla `detalle_reservaciones`
--
ALTER TABLE `detalle_reservaciones`
  ADD PRIMARY KEY (`IdDetalleReservacion`),
  ADD KEY `detalle_reservaciones_idreservacion_foreign` (`IdReservacion`),
  ADD KEY `detalle_reservaciones_iddetalleordens_foreign` (`IdDetalleOrdens`),
  ADD KEY `detalle_reservaciones_idcliente_foreign` (`IdCliente`);

--
-- Indices de la tabla `estado_mesas`
--
ALTER TABLE `estado_mesas`
  ADD PRIMARY KEY (`IdEstadoMesas`);

--
-- Indices de la tabla `estado_ordens`
--
ALTER TABLE `estado_ordens`
  ADD PRIMARY KEY (`IdEstadoOrdens`);

--
-- Indices de la tabla `estado_ventas`
--
ALTER TABLE `estado_ventas`
  ADD PRIMARY KEY (`IdEstadoVentas`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  ADD PRIMARY KEY (`IdIngreso`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`IdMesa`),
  ADD KEY `mesas_idestadomesas_foreign` (`IdEstadoMesas`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `ordens`
--
ALTER TABLE `ordens`
  ADD PRIMARY KEY (`IdOrdens`),
  ADD KEY `ordens_idmesa_foreign` (`IdMesa`),
  ADD KEY `ordens_idestadoordens_foreign` (`IdEstadoOrdens`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`IdPlato`),
  ADD KEY `platos_idcategoriaplatos_foreign` (`IdCategoriaPlatos`);

--
-- Indices de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD PRIMARY KEY (`IdPresupuesto`),
  ADD KEY `presupuestos_idplato_foreign` (`IdPlato`),
  ADD KEY `presupuestos_idproducto_foreign` (`IdProducto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `productos_idunidadmedida_foreign` (`IdUnidadMedida`);

--
-- Indices de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD PRIMARY KEY (`IdReservacion`),
  ADD KEY `reservaciones_idcliente_foreign` (`IdCliente`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teams_user_id_index` (`user_id`);

--
-- Indices de la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_invitations_team_id_email_unique` (`team_id`,`email`);

--
-- Indices de la tabla `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `team_user_team_id_user_id_unique` (`team_id`,`user_id`);

--
-- Indices de la tabla `tipo_documentos`
--
ALTER TABLE `tipo_documentos`
  ADD PRIMARY KEY (`IdTipoDocumento`);

--
-- Indices de la tabla `unidad_medidas`
--
ALTER TABLE `unidad_medidas`
  ADD PRIMARY KEY (`IdUnidadMedida`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`IdVenta`),
  ADD KEY `ventas_idestadoventas_foreign` (`IdEstadoVentas`),
  ADD KEY `ventas_iddetalleordens_foreign` (`IdDetalleOrdens`),
  ADD KEY `ventas_idtipodocumento_foreign` (`IdTipoDocumento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria_platos`
--
ALTER TABLE `categoria_platos`
  MODIFY `IdCategoriaPlatos` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IdCliente` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_ingresos`
--
ALTER TABLE `detalle_ingresos`
  MODIFY `IdDetalleIngreso` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `detalle_ordens`
--
ALTER TABLE `detalle_ordens`
  MODIFY `IdDetalleOrdens` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `detalle_reservaciones`
--
ALTER TABLE `detalle_reservaciones`
  MODIFY `IdDetalleReservacion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `estado_mesas`
--
ALTER TABLE `estado_mesas`
  MODIFY `IdEstadoMesas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estado_ordens`
--
ALTER TABLE `estado_ordens`
  MODIFY `IdEstadoOrdens` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estado_ventas`
--
ALTER TABLE `estado_ventas`
  MODIFY `IdEstadoVentas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingresos`
--
ALTER TABLE `ingresos`
  MODIFY `IdIngreso` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `IdMesa` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `ordens`
--
ALTER TABLE `ordens`
  MODIFY `IdOrdens` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `IdPlato` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  MODIFY `IdPresupuesto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IdProducto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  MODIFY `IdReservacion` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `team_user`
--
ALTER TABLE `team_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_documentos`
--
ALTER TABLE `tipo_documentos`
  MODIFY `IdTipoDocumento` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `unidad_medidas`
--
ALTER TABLE `unidad_medidas`
  MODIFY `IdUnidadMedida` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `IdVenta` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_ingresos`
--
ALTER TABLE `detalle_ingresos`
  ADD CONSTRAINT `detalle_ingresos_idingreso_foreign` FOREIGN KEY (`IdIngreso`) REFERENCES `ingresos` (`IdIngreso`),
  ADD CONSTRAINT `detalle_ingresos_idproducto_foreign` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`IdProducto`);

--
-- Filtros para la tabla `detalle_ordens`
--
ALTER TABLE `detalle_ordens`
  ADD CONSTRAINT `detalle_ordens_idmesa_foreign` FOREIGN KEY (`IdMesa`) REFERENCES `ordens` (`IdMesa`),
  ADD CONSTRAINT `detalle_ordens_idordens_foreign` FOREIGN KEY (`IdOrdens`) REFERENCES `ordens` (`IdOrdens`),
  ADD CONSTRAINT `detalle_ordens_idplato_foreign` FOREIGN KEY (`IdPlato`) REFERENCES `platos` (`IdPlato`);

--
-- Filtros para la tabla `detalle_reservaciones`
--
ALTER TABLE `detalle_reservaciones`
  ADD CONSTRAINT `detalle_reservaciones_idcliente_foreign` FOREIGN KEY (`IdCliente`) REFERENCES `reservaciones` (`IdCliente`),
  ADD CONSTRAINT `detalle_reservaciones_iddetalleordens_foreign` FOREIGN KEY (`IdDetalleOrdens`) REFERENCES `detalle_ordens` (`IdDetalleOrdens`),
  ADD CONSTRAINT `detalle_reservaciones_idreservacion_foreign` FOREIGN KEY (`IdReservacion`) REFERENCES `reservaciones` (`IdReservacion`);

--
-- Filtros para la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD CONSTRAINT `mesas_idestadomesas_foreign` FOREIGN KEY (`IdEstadoMesas`) REFERENCES `estado_mesas` (`IdEstadoMesas`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ordens`
--
ALTER TABLE `ordens`
  ADD CONSTRAINT `ordens_idestadoordens_foreign` FOREIGN KEY (`IdEstadoOrdens`) REFERENCES `estado_ordens` (`IdEstadoOrdens`),
  ADD CONSTRAINT `ordens_idmesa_foreign` FOREIGN KEY (`IdMesa`) REFERENCES `mesas` (`IdMesa`);

--
-- Filtros para la tabla `platos`
--
ALTER TABLE `platos`
  ADD CONSTRAINT `platos_idcategoriaplatos_foreign` FOREIGN KEY (`IdCategoriaPlatos`) REFERENCES `categoria_platos` (`IdCategoriaPlatos`);

--
-- Filtros para la tabla `presupuestos`
--
ALTER TABLE `presupuestos`
  ADD CONSTRAINT `presupuestos_idplato_foreign` FOREIGN KEY (`IdPlato`) REFERENCES `platos` (`IdPlato`),
  ADD CONSTRAINT `presupuestos_idproducto_foreign` FOREIGN KEY (`IdProducto`) REFERENCES `productos` (`IdProducto`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_idunidadmedida_foreign` FOREIGN KEY (`IdUnidadMedida`) REFERENCES `unidad_medidas` (`IdUnidadMedida`);

--
-- Filtros para la tabla `reservaciones`
--
ALTER TABLE `reservaciones`
  ADD CONSTRAINT `reservaciones_idcliente_foreign` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`IdCliente`);

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `team_invitations`
--
ALTER TABLE `team_invitations`
  ADD CONSTRAINT `team_invitations_team_id_foreign` FOREIGN KEY (`team_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_iddetalleordens_foreign` FOREIGN KEY (`IdDetalleOrdens`) REFERENCES `detalle_ordens` (`IdDetalleOrdens`),
  ADD CONSTRAINT `ventas_idestadoventas_foreign` FOREIGN KEY (`IdEstadoVentas`) REFERENCES `estado_ventas` (`IdEstadoVentas`),
  ADD CONSTRAINT `ventas_idtipodocumento_foreign` FOREIGN KEY (`IdTipoDocumento`) REFERENCES `tipo_documentos` (`IdTipoDocumento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
