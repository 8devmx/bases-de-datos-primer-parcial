-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2024 a las 01:37:02
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gastos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `creacion` datetime DEFAULT current_timestamp(),
  `modificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL,
  `color` varchar(7) DEFAULT '#FFFFFF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `creacion`, `modificacion`, `status`, `color`) VALUES
(1, 'comida', '0000-00-00 00:00:00', '2024-11-08 01:00:00', 1, '#FFFFFF'),
(2, 'entretenimiento', '0000-00-00 00:00:00', '2024-11-11 18:23:06', 1, '#FFFFFF'),
(3, 'bebida', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '#FFFFFF'),
(4, 'servicio', '0000-00-00 00:00:00', '2024-11-12 20:20:24', 1, '#3602f2'),
(7, 'mama', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '#FFFFFF'),
(15, 'vips', '2024-11-09 00:53:59', '2024-11-09 00:54:30', 0, '#FFFFFF'),
(17, 'prueba1', '2024-11-12 20:18:20', '2024-11-12 20:18:20', 1, '#662e2e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `id` int(11) UNSIGNED NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `creacion` datetime DEFAULT current_timestamp(),
  `modificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cantidad` float NOT NULL,
  `categoria` int(11) UNSIGNED NOT NULL,
  `tipo` int(11) UNSIGNED NOT NULL,
  `usuario` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `gastos`
--

INSERT INTO `gastos` (`id`, `descripcion`, `creacion`, `modificacion`, `cantidad`, `categoria`, `tipo`, `usuario`) VALUES
(1, 'comida vips', '2024-09-13 00:00:00', '2024-11-08 00:30:00', 270.3, 1, 1, 1),
(2, 'Pago comida ', '2024-09-13 00:00:00', '2024-11-08 00:33:00', 270.3, 1, 1, 1),
(3, 'Comida pollo pirata', '2024-09-14 00:00:00', '2024-11-08 00:59:00', 392, 1, 1, 1),
(4, 'Pago pollo', '2024-09-14 00:00:00', '2024-11-08 01:21:00', 392, 1, 2, 1),
(5, 'Pago tacos', '2024-09-14 00:00:00', '0000-00-00 00:00:00', 455, 1, 2, 1),
(6, 'Boleto concierto', '2024-09-15 00:00:00', '0000-00-00 00:00:00', 250, 2, 1, 1),
(7, 'Cerveza', '2024-09-15 00:00:00', '0000-00-00 00:00:00', 172.5, 3, 1, 1),
(8, 'Videojuego', '2024-09-17 00:00:00', '0000-00-00 00:00:00', 1299, 2, 1, 1),
(9, 'Pago gasolina', '2024-09-17 00:00:00', '0000-00-00 00:00:00', 400, 4, 2, 1),
(10, 'Comida Mcdonalds', '2024-09-18 00:00:00', '0000-00-00 00:00:00', 127, 2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `creacion` datetime DEFAULT current_timestamp(),
  `modificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `creacion`, `modificacion`, `status`) VALUES
(1, 'Administrador', '2024-11-08 03:55:09', '2024-11-08 03:55:09', 1),
(2, 'Usuario', '2024-11-08 03:55:09', '2024-11-07 23:41:09', 1),
(6, 'senior', '2024-11-07 23:38:00', '2024-11-07 23:58:00', 1),
(7, 'pepe', '2024-11-07 23:58:00', '2024-11-08 02:04:00', 0),
(9, 'seras', '2024-11-09 00:43:59', '2024-11-09 00:44:19', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `creacion` datetime DEFAULT current_timestamp(),
  `modificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL,
  `color` varchar(7) DEFAULT '#FFFFFF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `nombre`, `creacion`, `modificacion`, `status`, `color`) VALUES
(1, 'Gasto', '0000-00-00 00:00:00', '2024-11-12 21:24:52', 1, '#f20202'),
(2, 'Ingreso', '0000-00-00 00:00:00', '2024-11-12 21:24:46', 1, '#49f500'),
(6, 'wasa', '2024-11-08 23:31:01', '2024-11-08 23:31:00', 1, '#FFFFFF'),
(7, 'wasaaaaaa', '2024-11-08 01:12:00', '2024-11-08 01:12:00', 0, '#FFFFFF'),
(19, 'porfa', '0000-00-00 00:00:00', '2024-11-08 23:41:50', 1, '#FFFFFF'),
(29, 'siuu', '2024-11-09 00:48:32', '2024-11-12 21:24:30', 1, '#17f906'),
(30, 'dinero negro', '2024-11-12 21:25:30', '2024-11-12 21:25:30', 1, '#0d0d0d');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rol` int(11) UNSIGNED NOT NULL,
  `creacion` datetime DEFAULT current_timestamp(),
  `modificacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `telefono`, `correo`, `password`, `rol`, `creacion`, `modificacion`, `status`) VALUES
(1, 'Josue Plata', '9985222496', 'josueplata325@gmail.com', '12345678', 1, '0000-00-00 00:00:00', '2024-11-08 01:17:00', 1),
(2, 'some some', '454545', 'prueba325@gmail.com', '12345678', 1, '0000-00-00 00:00:00', '2024-11-08 01:39:00', 0),
(3, 'Pepe', '123123', '123123@gmail.com', '123123', 1, '0000-00-00 00:00:00', '2024-11-08 01:39:00', 0),
(7, 'Chucho', '123123', '12312355@gmail.com', 'asasdas', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(10, 'jose', '34324324', '21312312@gmail.com', 'asdasdasd', 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(13, 'juan', '123123', '567679870@gmail.com', '121515', 1, '2024-11-08 01:19:00', '2024-11-08 01:19:00', 1),
(14, 'pepepepe', '88888888', '696969696@gmail.com', '4145117', 1, '2024-11-09 00:50:47', '2024-11-09 00:50:56', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD UNIQUE KEY `nombre_2` (`nombre`),
  ADD UNIQUE KEY `nombre_3` (`nombre`),
  ADD UNIQUE KEY `nombre_4` (`nombre`),
  ADD UNIQUE KEY `nombre_5` (`nombre`),
  ADD UNIQUE KEY `nombre_6` (`nombre`),
  ADD UNIQUE KEY `nombre_7` (`nombre`),
  ADD UNIQUE KEY `nombre_8` (`nombre`),
  ADD UNIQUE KEY `nombre_9` (`nombre`),
  ADD UNIQUE KEY `nombre_10` (`nombre`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `descripcion` (`descripcion`),
  ADD UNIQUE KEY `descripcion_2` (`descripcion`),
  ADD UNIQUE KEY `descripcion_3` (`descripcion`),
  ADD UNIQUE KEY `descripcion_4` (`descripcion`),
  ADD UNIQUE KEY `descripcion_5` (`descripcion`),
  ADD UNIQUE KEY `descripcion_6` (`descripcion`),
  ADD UNIQUE KEY `descripcion_7` (`descripcion`),
  ADD UNIQUE KEY `descripcion_8` (`descripcion`),
  ADD UNIQUE KEY `descripcion_9` (`descripcion`),
  ADD UNIQUE KEY `descripcion_10` (`descripcion`),
  ADD UNIQUE KEY `descripcion_11` (`descripcion`),
  ADD UNIQUE KEY `descripcion_12` (`descripcion`),
  ADD UNIQUE KEY `descripcion_13` (`descripcion`),
  ADD UNIQUE KEY `descripcion_14` (`descripcion`),
  ADD UNIQUE KEY `descripcion_15` (`descripcion`),
  ADD UNIQUE KEY `descripcion_16` (`descripcion`),
  ADD UNIQUE KEY `descripcion_17` (`descripcion`),
  ADD UNIQUE KEY `descripcion_18` (`descripcion`),
  ADD UNIQUE KEY `descripcion_19` (`descripcion`),
  ADD UNIQUE KEY `descripcion_20` (`descripcion`),
  ADD UNIQUE KEY `descripcion_21` (`descripcion`),
  ADD UNIQUE KEY `descripcion_22` (`descripcion`),
  ADD UNIQUE KEY `descripcion_23` (`descripcion`),
  ADD UNIQUE KEY `descripcion_24` (`descripcion`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`),
  ADD UNIQUE KEY `nombre_2` (`nombre`),
  ADD UNIQUE KEY `nombre_3` (`nombre`),
  ADD UNIQUE KEY `nombre_4` (`nombre`),
  ADD UNIQUE KEY `nombre_5` (`nombre`),
  ADD UNIQUE KEY `nombre_6` (`nombre`),
  ADD UNIQUE KEY `nombre_7` (`nombre`),
  ADD UNIQUE KEY `nombre_8` (`nombre`),
  ADD UNIQUE KEY `nombre_9` (`nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `correo_2` (`correo`),
  ADD UNIQUE KEY `correo_3` (`correo`),
  ADD UNIQUE KEY `correo_4` (`correo`),
  ADD UNIQUE KEY `correo_5` (`correo`),
  ADD UNIQUE KEY `correo_6` (`correo`),
  ADD UNIQUE KEY `correo_7` (`correo`),
  ADD UNIQUE KEY `correo_8` (`correo`),
  ADD UNIQUE KEY `correo_9` (`correo`),
  ADD UNIQUE KEY `correo_10` (`correo`),
  ADD UNIQUE KEY `correo_11` (`correo`),
  ADD UNIQUE KEY `correo_12` (`correo`),
  ADD UNIQUE KEY `correo_13` (`correo`),
  ADD UNIQUE KEY `correo_14` (`correo`),
  ADD UNIQUE KEY `correo_15` (`correo`),
  ADD UNIQUE KEY `correo_16` (`correo`),
  ADD UNIQUE KEY `correo_17` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
