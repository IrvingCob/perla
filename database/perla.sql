-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-08-2021 a las 21:30:07
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `perla`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `anticipoEntrada` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` datetime NOT NULL,
  `proveedor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `anticipoEntrada`, `fecha`, `created_at`, `updated_at`, `proveedor_id`) VALUES
(1, '5000', '2021-08-24', '2021-08-24 15:20:16.000000', '2021-08-24 15:20:16', 1),
(2, '6000', '2021-08-24', '2021-08-24 15:29:46.000000', '2021-08-24 15:29:46', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `importe` double NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `fecha`, `producto_id`, `cantidad`, `precio`, `importe`, `proveedor_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, '2021-08-24', 2, 10, 100, 100, 1, 2, '2021-08-24 15:23:41.000000', '2021-08-24 20:23:41'),
(2, '2021-08-25', 2, 10, 100, 100, 1, 1, '2021-08-24 15:25:06.000000', '2021-08-24 20:25:06'),
(3, '2021-08-24', 2, 5, 500, 500, 2, 1, '2021-08-24 15:30:50.000000', '2021-08-24 20:30:50'),
(4, '2021-08-24', 3, 5, 50, 50, 2, 1, '2021-08-24 15:43:00.000000', '2021-08-24 20:43:00');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Pulpo', '2021-08-24 15:21:13.000000', '2021-08-24 20:21:13'),
(2, 'Pescado', '2021-08-24 15:21:22.000000', '2021-08-24 20:21:22'),
(3, 'Camaron', '2021-08-24 15:21:49.000000', '2021-08-24 20:21:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `embarcacion` varchar(45) NOT NULL,
  `referencia` varchar(45) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id`, `nombre`, `telefono`, `embarcacion`, `referencia`, `created_at`, `updated_at`) VALUES
(1, 'Irving', '9961089779', '001', 'Irving', '2021-08-24 15:19:25.000000', '2021-08-24 20:19:25'),
(2, 'Angel Javier', '9989997968', '002', 'Angel', '2021-08-24 15:27:54.000000', '2021-08-24 20:27:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(45) NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pendiente', '2021-08-24 15:20:52.000000', '2021-08-24 20:20:52'),
(2, 'Pagado', '2021-08-24 15:21:02.000000', '2021-08-24 20:21:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ing Irving Cob', 'irving_cob@hotmail.com', '$2y$10$/ZMiBPtFvBvqNRQJOlh.POrNXIUHz/jEGx9r1vKXCKddWXAUZyCfS', 'HCvwld7qQyRJIq2lqm2HssVK48m0jxavynoybAiNOAuvLvVm3c90oB3LXT2p', '2021-08-08 01:14:34', '2021-08-08 01:14:34'),
(3, 'hol', 'hola@hotmail.com', '$2y$10$BnRWh0TQya3ksuUU1Xn08u/VGkHT55jlWrbU0dPV5PeDwxitzSgi2', 'npP930Ok8DuY6alsdDtBfx6iU3dpIZelpsKiacvuDWJAMYHmeCNI9GL4wKMp', '2021-08-20 23:19:18', '2021-08-20 23:19:18'),
(4, 'nm', 'mn@mnm.com', '$2y$10$deOPs6Or1uoQsH20TaxlSeayUUxW6s2anYt/m9YvbuL7rTSlB/OAu', 'bmyQFW8SG1ofddTYqDCGbbUfcEKz02VI6uD7ykKoimVgifJYp6AauJFLvmEE', '2021-08-20 23:24:10', '2021-08-20 23:24:10'),
(5, 'hola', 'hola@hola.com', '$2y$10$S2Qerj/d9rTBPhZmCPbMVOEDKQUHcWmPAjyJI4dbdIEzlo7IGhwWy', 'zLhL8pFIsFBpCyXlARDvVcZbfuxJXlQLRs1tbd6LFueAmoyou6MludbPmtsL', '2021-08-21 00:29:58', '2021-08-21 00:29:58'),
(6, 'aketech', 'admin@admin.com', '$2y$10$fc3ke.0be9NSX3CitTALgOqNdHj4Kk52jIDHCH.XNgoxfuRMSnpNO', 'QS3lyDtEJVDn4W37ZtIKbx327xF4LKM8y2PWTLodVuiN6JD5NefvypZWNJMl', '2021-08-23 04:05:58', '2021-08-23 04:05:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viver`
--

CREATE TABLE `viver` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `cantidad` varchar(45) NOT NULL,
  `precio` decimal(50,0) NOT NULL,
  `importe` decimal(50,0) NOT NULL,
  `fecha` date NOT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `proveedor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `viver`
--

INSERT INTO `viver` (`id`, `nombre`, `cantidad`, `precio`, `importe`, `fecha`, `created_at`, `updated_at`, `proveedor_id`) VALUES
(1, 'Carnada', '2', '0', '0', '2021-08-24', '2021-08-24 15:25:43.000000', '2021-08-24 20:25:43', 1),
(2, 'Hielo', '2', '0', '0', '2021-08-24', '2021-08-24 15:27:11.000000', '2021-08-24 20:27:11', 1),
(3, 'Carnada', '20', '10', '20000', '2021-08-24', '2021-08-24 15:31:13.000000', '2021-08-24 22:07:43', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `viver`
--
ALTER TABLE `viver`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `viver`
--
ALTER TABLE `viver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
